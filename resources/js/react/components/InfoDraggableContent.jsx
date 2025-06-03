"use client"

import { useState, useEffect } from "react"

const InfoDraggableContent = ({ apiUrl, mapUpdateTrigger }) => {
  const [playerInfo, setPlayerInfo] = useState(null)

  useEffect(() => {
    const fetchPlayerInfo = async () => {
      try {
        const response = await fetch(`${apiUrl}/info`)
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`)
        }
        const data = await response.json()
        setPlayerInfo(data)
      } catch (error) {
        console.error("Error fetching player info:", error)
      }
    }

    fetchPlayerInfo()
  }, [apiUrl, mapUpdateTrigger])

  if (!playerInfo) return <div>Cargando...</div>

  const currentHP = playerInfo.HP || 0
  const maxHP = playerInfo.Max_HP || 100
  const hpPercentage = Math.max(0, Math.min(100, (currentHP / maxHP) * 100))

  return (
    <div style={{ maxHeight: "70vh", overflowY: "auto", padding: "16px" }}>
      <h2 style={{ textAlign: "center", marginBottom: "20px" }}>Información del Personaje</h2>

      <div style={{ display: "flex", flexDirection: "column", gap: "16px" }}>
        {/* Nombre */}
        <div style={{ borderLeft: "4px solid #198754", paddingLeft: "12px" }}>
          <div style={{ marginBottom: "4px" }}>Nombre</div>
          <div style={{ fontWeight: "bold" }}>{playerInfo.nombre || "Desconocido"}</div>
        </div>

        {/* Dinero */}
        <div style={{ borderLeft: "4px solid #ffc107", paddingLeft: "12px" }}>
          <div style={{ marginBottom: "4px" }}>Dinero</div>
          <div style={{ fontWeight: "bold" }}>💰 {playerInfo.dinero || 0} monedas</div>
        </div>

        {/* HP */}
        <div style={{ borderLeft: "4px solid #dc3545", paddingLeft: "12px" }}>
          <div style={{ marginBottom: "8px" }}>HP</div>
          <div style={{ display: "flex", alignItems: "center", gap: "8px" }}>
            <div
              style={{
                flex: 1,
                height: "10px",
                backgroundColor: "#dc3545",
                borderRadius: "5px",
                overflow: "hidden",
              }}
            >
              <div
                style={{
                  width: `${hpPercentage}%`,
                  height: "100%",
                  backgroundColor: "#198754",
                  transition: "width 0.3s ease",
                }}
              ></div>
            </div>
            <div style={{ fontWeight: "bold" }}>{currentHP} / {maxHP}</div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default InfoDraggableContent
