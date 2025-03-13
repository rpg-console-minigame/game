import { useState, useEffect, useRef } from "react";
import axios from "axios";

const ChatDraggableContent = () => {
  const [messages, setMessages] = useState([]);
  const [newMessage, setNewMessage] = useState("");
  const lastMessageId = useRef(0);
  const messagesEndRef = useRef(null);
  const fetchTimeoutRef = useRef(null);

  useEffect(() => {
    fetchMessages(); // Cargar mensajes al inicio
  }, []);

  const fetchMessages = async () => {
    try {
      const response = await axios.get(`/messages?lastMessageId=${lastMessageId.current}`);

      if (response.data.length > 0) {
        setMessages((prevMessages) => {
          // Filtrar mensajes nuevos que no estén ya en el estado
          const newMessages = response.data.filter(
            (msg) => !prevMessages.some((prevMsg) => prevMsg.id === msg.id)
          );

          return [...prevMessages, ...newMessages];
        });

        // Actualizar lastMessageId solo si hay nuevos mensajes
        lastMessageId.current = response.data[response.data.length - 1].id;
      }
    } catch (error) {
      console.error("Error fetching messages:", error);
    }

    fetchTimeoutRef.current = setTimeout(fetchMessages, 1000); // Recargar cada 1s
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!newMessage.trim()) return;

    try {
      const response = await axios.post("/messages", { content: newMessage });

      setMessages((prevMessages) => [...prevMessages, response.data]); // Agregar solo el nuevo mensaje
      lastMessageId.current = response.data.id; // Actualizar referencia del último mensaje
      setNewMessage(""); // Limpiar input
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  useEffect(() => {
    return () => clearTimeout(fetchTimeoutRef.current);
  }, []);

  return (
    <div className="chat-container" style={{ height: "300px", overflow: "hidden", display: "flex", flexDirection: "column" }}>
      <div className="messages-container" style={{ flex: 1, display: "flex", flexDirection: "column-reverse", overflow: "auto" }}>
        {messages.slice().reverse().map((message) => (
          <div key={message.id} className="message">
            <strong>{message.user.name}:</strong> {message.content}
          </div>
        ))}
        <div ref={messagesEndRef} />
      </div>
      <form onSubmit={handleSubmit}>
        <div className="form-group" style={{ display: "flex", alignItems: "center", marginTop: "10px" }}>
          <input
            type="text"
            className="chat-input"
            value={newMessage}
            onChange={(e) => setNewMessage(e.target.value)}
            placeholder="Type your message..."
            style={{ flex: 1, padding: "8px", backgroundColor: "#333", color: "#fff", borderRadius: "4px" }}
          />
          <button
            type="submit"
            style={{ marginLeft: "10px", padding: "8px 16px", backgroundColor: "#007bff", color: "#fff", border: "none", borderRadius: "4px", cursor: "pointer" }}
          >
            Send
          </button>
        </div>
      </form>
    </div>
  );
};

export default ChatDraggableContent;
