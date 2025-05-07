"use client"

import { useEffect, useState } from "react"
const MapDraggableContent = () => {
  const [zonaInfo, setZonaInfo] = useState(null)
  const apiUrl = "{{ env('API_URL') }}"


  useEffect(() => {
    const fetchMapInfo = async () => {
      try {
        const response = await fetch(`${apiUrl}/mapInfo`)
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`)
        }
        const data = await response.json()
        setZonaInfo(data)
      } catch (error) {
        console.error("Error fetching map info:", error)
      }
    }

    fetchMapInfo()
  }, [apiUrl])

  if (!zonaInfo) {
    return <div>Loading...</div>
  }

  return (
    <div id="Mapa-content">
      <pre style={{ fontSize: "0.8em", lineHeight: "1.2" }}>
        {`
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
        `}
      </pre>
    </div>
  )
}

export default MapDraggableContent

