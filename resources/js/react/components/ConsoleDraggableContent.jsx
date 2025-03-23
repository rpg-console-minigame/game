"use client"

import { useState, useEffect, useCallback } from "react"

const ConsoleDraggableContent = ({  onOpenMap, onOpenHelp, onOpenChat, onMapUpdate }) => {
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
      } else if (["derecha", "izquierda", "arriba", "abajo"].includes(input.toLowerCase())) {
        try {
          const response = await fetch(`${apiUrl}/input`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ direccion: input.toLowerCase() }),
          })

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`)
          }

          const data = await response.json()
          console.log("Movimiento exitoso:", data)
          setInput("")
          updateZonaInfo()
        } catch (error) {
          console.error("Error moving:", error)
          setError("Error al mover. Por favor, intenta de nuevo.")
        }
      } else {
        setError("Comando no reconocido. Usa 'ayuda' para ver los comandos disponibles.")
      }
    },
    [input, onOpenMap, onOpenHelp, onOpenChat, onMapUpdate, apiUrl],
  )
  const updateZonaInfo = async () => {
    try {
      const response = await fetch(`${apiUrl}/mapInfo`)
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`)
      }
      const zonaInfo = await response.json()
      // actualizar la descripción de la zona
      const descripcion = document.querySelector("#Descripcion-content")
      descripcion.querySelector("h1").innerText = zonaInfo.nombre
      descripcion.querySelector("#Descripcion-content_text").innerText = zonaInfo.descripcion
      //Coordenadas: [{zonaInfo.coord_x}, {zonaInfo.coord_y}]
      descripcion.querySelector("p:last-child").innerHTML = "coordenadas: [" + zonaInfo.coord_x + ", " + zonaInfo.coord_y + "]"
      // actualizar el pre de la descripción
    const pre = document.querySelector("#Mapa-content pre")
    if (pre) {
      pre.innerHTML = `
                                 ${zonaInfo.up_door ? "╔══════════════════════╗" : "                      "} 
                                 ${zonaInfo.up_door ? "║" : ""}                      ${zonaInfo.up_door ? "║" : ""}                      
                                 ${zonaInfo.up_door ? "║" : ""}                      ${zonaInfo.up_door ? "║" : ""}                      
                                 ${zonaInfo.up_door ? "║" : ""}                      ${zonaInfo.up_door ? "║" : ""}                      
                                 ${zonaInfo.up_door ? "║" : ""}                      ${zonaInfo.up_door ? "║" : ""}                      
                                 ${zonaInfo.up_door ? "║" : ""}                      ${zonaInfo.up_door ? "║" : ""}                      
          ${zonaInfo.left_door ? "╔══════════════════════" : "                       "}${zonaInfo.left_door && zonaInfo.up_door ? "╬" : zonaInfo.left_door ? "╦" : zonaInfo.up_door ? "╠" : "╔"}═════════${zonaInfo.up_door ? "  " : "══"}═══════════${zonaInfo.right_door && zonaInfo.up_door ? "╬" : zonaInfo.right_door ? "╦" : zonaInfo.up_door ? "╣" : "╗"}${zonaInfo.right_door ? "══════════════════════╗" : "                       "}
          ${zonaInfo.left_door ? "║" : " "}                      ║                      ║                      ${zonaInfo.right_door ? "║" : " "}
          ${zonaInfo.left_door ? "║" : " "}                      ║                      ║                      ${zonaInfo.right_door ? "║" : " "}
          ${zonaInfo.left_door ? "║" : " "}                      ${zonaInfo.left_door ? " " : "║"}         ◯           ${zonaInfo.right_door ? " " : "║"}                      ${zonaInfo.right_door ? "║" : " "}
          ${zonaInfo.left_door ? "║" : " "}                      ║                      ║                      ${zonaInfo.right_door ? "║" : " "}
          ${zonaInfo.left_door ? "║" : " "}                      ║                      ║                      ${zonaInfo.right_door ? "║" : " "}
          ${zonaInfo.left_door ? "╚══════════════════════" : "                       "}${zonaInfo.left_door && zonaInfo.down_door ? "╬" : zonaInfo.left_door ? "╩" : zonaInfo.down_door ? "╠" : "╚"}═════════${zonaInfo.down_door ? "  " : "══"}═══════════${zonaInfo.right_door && zonaInfo.down_door ? "╬" : zonaInfo.right_door ? "╩" : zonaInfo.down_door ? "╣" : "╝"}${zonaInfo.right_door ? "══════════════════════╝" : "                       "}
                                 ${zonaInfo.down_door ? "║" : ""}                      ${zonaInfo.down_door ? "║" : ""} 
                                 ${zonaInfo.down_door ? "║" : ""}                      ${zonaInfo.down_door ? "║" : ""} 
                                 ${zonaInfo.down_door ? "║" : ""}                      ${zonaInfo.down_door ? "║" : ""}  
                                 ${zonaInfo.down_door ? "║" : ""}                      ${zonaInfo.down_door ? "║" : ""}  
                                 ${zonaInfo.down_door ? "║" : ""}                      ${zonaInfo.down_door ? "║" : ""}  
                                 ${zonaInfo.down_door ? "╚══════════════════════╝" : "                      "}
          `
    }
    } catch (error) {
      console.error("Error fetching map info:", error)
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

