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
      <p style={{ textAlign: "center", fontSize: "0.8em", color: "#aaa" }}>
        Coordenadas: [{zonaInfo.coord_x}, {zonaInfo.coord_y}]
      </p>
    </div>
  )
}

export default DescripcionDraggableContent

