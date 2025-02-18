"use client"

import { useState, useEffect } from "react"

const ConsoleDraggableContent = ({ onOpenMap, onOpenHelp , onOpenChat}) => {
  const [input, setInput] = useState("")
  const [nombre, setNombre] = useState("user@PC:~$")

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(apiUrl + "/info")
        const data = await response.json()
        setNombre(data.nombre || "user@PC:~$")
        console.log(data)
      } catch (error) {
        console.error("Error fetching data:", error)
      }
    }

    fetchData()
  }, [])

  const handleSubmit = (e) => {
    e.preventDefault()
    if (input.toLowerCase() === "mapa") {
      onOpenMap()
      setInput("")
    } else if (input.toLowerCase() === "ayuda") {
      onOpenHelp()
      setInput("")
    }
    else if (input.toLowerCase() === "chat") {
      onOpenChat()
      setInput("")
    }
  }

  return (
    <div id="Consola-content" className="console-container">
      <form onSubmit={handleSubmit}>
        <div className="form-group" style={{ display: "flex", alignItems: "center" }}>
          <label htmlFor="console-input" className="console-label" style={{ marginRight: "10px" }}>
            {nombre}@PC:~$
          </label>
          <input
            type="text"
            className="console-input"
            id="console-input"
            value={input}
            onChange={(e) => setInput(e.target.value)}
            autoComplete="off"
            autoFocus
            style={{
              flex: 1,
              padding: "8px",
              backgroundColor: "#222",
              color: "#fff",
              borderRadius: "4px",
            }}
          />
        </div>
      </form>
      <p
        style={{
          color: "#ccc",
          fontSize: "0.85em",
          marginTop: "10px",
        }}
      >
        Escribe un comando y presiona Enter para ejecutarlo. Usa 'ayuda' para ver el listado de comandos disponibles.
      </p>
    </div>
  )
}

export default ConsoleDraggableContent