"use client"

import { useState, useEffect, useCallback } from "react"

const ConsoleDraggableContent = ({ apiUrl, onOpenMap, onOpenHelp, onOpenChat, onOpenInventario, onMapUpdate }) => {
  const [input, setInput] = useState("")
  const [nombre, setNombre] = useState("user@PC:~$")
  const [error, setError] = useState("")

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(`${apiUrl}/info`)
        const data = await response.json()
        setNombre(data.nombre || "user@PC:~$")
      } catch (error) {
        console.error("Error fetching data:", error)
      }
    }

    fetchData()
  }, [apiUrl])

  const handleSubmit = useCallback(
    async (e) => {
      e.preventDefault()
      setError("")

      if (input.toLowerCase() === "mapa") {
        onOpenMap()
        setInput("")
      } else if (input.toLowerCase() === "ayuda") {
        onOpenHelp()
        setInput("")
      } else if (input.toLowerCase() === "chat") {
        onOpenChat()
        setInput("")
      } else if (input.toLowerCase() === "inventario") {
        onOpenInventario()
        setInput("")
      } else if (["derecha", "izquierda", "arriba", "abajo"].includes(input.toLowerCase())) {
        try {
          const response = await fetch(`${apiUrl}/input`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ input: input.toLowerCase() }),
          })

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`)
          }

          const data = await response.json()
          console.log("Movimiento exitoso:", data)
          setInput("")
          onMapUpdate() // Usar onMapUpdate en lugar de updateZonaInfo
        } catch (error) {
          console.error("Error moving:", error)
          setError("Error al mover. Por favor, intenta de nuevo.")
        }
      } else if (input.toLowerCase().startsWith("tomar")) {
        try {
          // const objeto  todo sin la palabra tomar y el primer espacio (contar que el nombre puede contener espacios)
          const objeto = input.substring(6).trim()
          const response = await fetch(`${apiUrl}/input`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ input: "tomar", objeto: objeto }),
          })

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`)
          }

          const data = await response.json()
          console.log("Objeto tomado:", data)
          // si data es null, no se ha podido tomar el objeto
          if (data === null) throw new Error("No se ha podido tomar el objeto")
          setInput("")
          onMapUpdate() // Usar onMapUpdate en lugar de updateZonaInfo
        } catch (error) {
          console.error("Error tomando objeto:", error)
          setError("Error al tomar el objeto. Por favor, intenta de nuevo.")
        }
      }else if (input.toLowerCase().startsWith("usar")){
        try {
          // const objeto  todo sin la palabra usar y el primer espacio (contar que el nombre puede contener espacios)
          const objeto = input.substring(5).trim()
          const response = await fetch(`${apiUrl}/input`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ input: "usar", objeto: objeto }),
          })

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`)
          }

          const data = await response.json()
          console.log("Objeto usado:", data)
          setInput("")
          onMapUpdate() // Usar onMapUpdate en lugar de updateZonaInfo
        } catch (error) {
          console.error("Error usando objeto:", error)
          setError("Error al usar el objeto. Por favor, intenta de nuevo.")
        }
      } 
      else {
        setError("Comando no reconocido. Usa 'ayuda' para ver los comandos disponibles.")
      }
    },
    [input, onOpenMap, onOpenHelp, onOpenChat, onOpenInventario, onMapUpdate, apiUrl],
  )

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
      {error && <p style={{ color: "red", marginTop: "10px" }}>{error}</p>}
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
