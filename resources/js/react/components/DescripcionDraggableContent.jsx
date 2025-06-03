"use client"

import { useState, useEffect } from "react"
const DescripcionDraggableContent = ({ apiUrl, mapUpdateTrigger }) => {
  const [zonaInfo, setZonaInfo] = useState(null)

  useEffect(() => {
    const fetchZonaInfo = async () => {
      try {
        const response = await fetch(`${apiUrl}/mapInfo`)
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`)
        }
        const data = await response.json()
        setZonaInfo(data)
      } catch (error) {
        console.error("Error fetching zona info:", error)
      }
    }

    fetchZonaInfo()
  }, [apiUrl, mapUpdateTrigger])

  if (!zonaInfo) {
    return <div>Loading...</div>
  }
  return (
    <div
      id="Descripcion-content"
      style={{
        maxHeight: "70vh",
        overflowY: "auto",
      }}
    >
      <h1 style={{ textAlign: "center" }}>{zonaInfo.nombre || "Loading..."}</h1>
      <pre id="Descripcion-content_img" style={{ fontSize: "0.8em", lineHeight: "1.2"}}>
      {zonaInfo.imagen ||
          `Loading...`}
      </pre>

      <p id="Descripcion-content_text" style={{ textAlign: "center" }}>
        {zonaInfo.descripcion ||
          `Loading...`}
      </p>
      <p style={{ textAlign: "center", fontSize: "0.8em", color: "#aaa" }} id="Coord-content_text">
        Coordenadas: [{zonaInfo.coord_x}, {zonaInfo.coord_y}]
      </p>
      <h2 style={{ textAlign: "center" }}>Objetos en la zona</h2>
      <ul style={{ listStyleType: "none", padding: 0, textAlign: "center" }}>
        {zonaInfo.objetos && zonaInfo.objetos.length > 0 ? (
          zonaInfo.objetos.map((objeto, index) => (
            <li key={index} style={{ margin: "5px 0" }}>
              {objeto.nombre || `Loading...`}
            </li>
          ))
        ) : (
          <li>No hay objetos en esta zona.</li>
        )}
      </ul>
      <h2 style={{ textAlign: "center" }}>Personajes en la zona</h2>
      <ul style={{ listStyleType: "none", padding: 0, textAlign: "center" }}>
        {zonaInfo.personajes && zonaInfo.personajes.length > 0 ? (
          zonaInfo.personajes.map((personaje, index) => (
            <li key={index} style={{ margin: "5px 0" }}>
              {personaje.nombre || `Loading...`}
            </li>
          ))
        ) : (
          <li>No hay personajes en esta zona.</li>
        )}
      </ul>
      <h2 style={{ textAlign: "center" }}>Enemigos en la zona</h2>
      <ul style={{ listStyleType: "none", padding: 0, textAlign: "center" }}>
        {/* si hay enemigos mostrar mensaje en rojo con un aviso */}
        {zonaInfo.enemigos && zonaInfo.enemigos.length > 0 ? (
          <p style={{ color: "red", textAlign: "center" }}>
            ¡Cuidado! Al salir de esta zona, recibiras el ataque de los enemigos.
          </p>
        ) : (
          <p style={{ color: "green", textAlign: "center" }}>
            Zona segura, no hay enemigos.
          </p>
        )}
        {zonaInfo.enemigos && zonaInfo.enemigos.length > 0 ? (
          zonaInfo.enemigos.map((enemigo, index) => (
            <li key={index} style={{ margin: "5px 0" }}>
              {enemigo.nombre || `Loading...`}
              {enemigo.ataque ? ` - Ataque: ${enemigo.ataque}` : ""}
              {enemigo.descripcion ? (
                <div style={{ fontSize: "0.8em", color: "#666" }}>
                  {enemigo.descripcion}
                </div>
              ) : (
                <div style={{ fontSize: "0.8em", color: "#666" }}>
                  Descripción no disponible.
                </div>
              )}
            </li>
          ))
        ) : (
          <li></li>
        )}
      </ul>
    </div>
  )
}

export default DescripcionDraggableContent

