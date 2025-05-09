"use client"

import { useState, useCallback } from "react"
import { DndContext } from "@dnd-kit/core"
import DraggableFrame from "./components/DraggableFrame"
import DescripcionDraggableContent from "./components/DescripcionDraggableContent"
import MapDraggableContent from "./components/MapDraggableContent"
import ConsoleDraggableContent from "./components/ConsoleDraggableContent"
import HelpDraggableContent from "./components/HelpDraggableContent"
import ChatDraggableContent from "./components/ChatDraggableContent"
import InventarioDraggableContent from "./components/InventarioDraggableContent"
import "bootstrap/dist/css/bootstrap.min.css"


const App = () => {
  const cuadros = ["Descripcion", "Mapa", "Consola", "Ayuda", "Chat", "Inventario"]
  const componentes = [
    DescripcionDraggableContent,
    MapDraggableContent,
    ConsoleDraggableContent,
    HelpDraggableContent,
    ChatDraggableContent,
    InventarioDraggableContent,
  ]

  const [positions, setPositions] = useState(() => {
    const savedPositions = {}
    cuadros.forEach((cuadro) => {
      const saved = localStorage.getItem(cuadro)
      switch (cuadro) {
        case "Descripcion":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 20, y: 20 }
          break
        case "Consola":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 20, y: 400 }
          break
        case "Mapa":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 650, y: 20 }
          break
        case "Ayuda":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 650, y: 400 }
          break
        case "Chat":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 335, y: 20 }
          break
        case "Inventario":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 335, y: 400 }
          break
        default:
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 0, y: 0 }
          break
      }
    })
    return savedPositions
  })

  const [activeStates, setActiveStates] = useState(() => {
    const savedStates = {}
    cuadros.forEach((cuadro) => {
      const saved = localStorage.getItem(`${cuadro}-active`)
      if (cuadro === "Ayuda" || cuadro === "Chat" || cuadro === "Inventario") {
        savedStates[cuadro] = localStorage.getItem(`${cuadro}-active`) == "true" ? true : false
        if (!localStorage.getItem(`${cuadro}-active`)) localStorage.setItem(`${cuadro}-active`, JSON.stringify(false))
      } else {
        savedStates[cuadro] = saved ? JSON.parse(saved) : true
      }
    })
    return savedStates
  })

  const [order, setOrder] = useState(() => {
    return cuadros.reduce((acc, cuadro, index) => {
      acc[cuadro] = index
      return acc
    }, {})
  })

  const handleDragEnd = (event) => {
    const { active, delta } = event
    if (active && active.data.current && active.data.current.isActive) {
      setPositions((prev) => {
        const newPositions = {
          ...prev,
          [active.id]: {
            x: prev[active.id].x + delta.x,
            y: prev[active.id].y + delta.y,
          },
        }
        localStorage.setItem(active.id, JSON.stringify(newPositions[active.id]))
        return newPositions
      })
    }
  }

  const handleToggleActive = useCallback((id) => {
    if (id === "Mapa" || id === "Ayuda" || id === "Chat" || id === "Inventario") {
      setActiveStates((prev) => {
        const newState = {
          ...prev,
          [id]: !prev[id],
        }
        localStorage.setItem(`${id}-active`, JSON.stringify(newState[id]))
        return newState
      })
    }
  }, [])

  // Función para poner una ventana por encima de las demás
  const bringToFront = useCallback((id) => {
    setOrder((prevOrder) => {
      const newOrder = { ...prevOrder }
      const maxOrder = Math.max(...Object.values(newOrder))
      newOrder[id] = maxOrder + 1
      return newOrder
    })
  }, [])

  const handleOpenMap = useCallback(() => {
    // Si ya está abierta, solo la ponemos por encima
    if (activeStates["Mapa"]) {
      bringToFront("Mapa")
      return
    }

    // Si no está abierta, la abrimos y la ponemos por encima
    setActiveStates((prev) => ({
      ...prev,
      Mapa: true,
    }))
    localStorage.setItem("Mapa-active", JSON.stringify(true))
    bringToFront("Mapa")
  }, [activeStates, bringToFront])

  const handleOpenHelp = useCallback(() => {
    // Si ya está abierta, solo la ponemos por encima
    if (activeStates["Ayuda"]) {
      bringToFront("Ayuda")
      return
    }

    // Si no está abierta, la abrimos y la ponemos por encima
    setActiveStates((prev) => ({
      ...prev,
      Ayuda: true,
    }))
    localStorage.setItem("Ayuda-active", JSON.stringify(true))
    bringToFront("Ayuda")
  }, [activeStates, bringToFront])

  const handleOpenChat = useCallback(() => {
    // Si ya está abierta, solo la ponemos por encima
    if (activeStates["Chat"]) {
      bringToFront("Chat")
      return
    }

    // Si no está abierta, la abrimos y la ponemos por encima
    setActiveStates((prev) => ({
      ...prev,
      Chat: true,
    }))
    localStorage.setItem("Chat-active", JSON.stringify(true))
    bringToFront("Chat")
  }, [activeStates, bringToFront])

  const handleOpenInventario = useCallback(() => {
    // Si ya está abierta, solo la ponemos por encima
    if (activeStates["Inventario"]) {
      bringToFront("Inventario")
      return
    }

    // Si no está abierta, la abrimos y la ponemos por encima
    setActiveStates((prev) => ({
      ...prev,
      Inventario: true,
    }))
    localStorage.setItem("Inventario-active", JSON.stringify(true))
    bringToFront("Inventario")
  }, [activeStates, bringToFront])

  const handleFrameClick = useCallback(
    (id) => {
      bringToFront(id)
    },
    [bringToFront],
  )

  const [mapUpdateTrigger, setMapUpdateTrigger] = useState(0)

  const handleMapUpdate = useCallback(() => {
    setMapUpdateTrigger((prev) => prev + 1)
  }, [])

  return (
    <DndContext onDragEnd={handleDragEnd}>
      <div className="position-relative vh-100 vw-100">
        {cuadros.map((cuadro, index) => {
          const Componente = componentes[index]
          return (
            <DraggableFrame
              key={cuadro}
              id={cuadro}
              initialPosition={positions[cuadro]}
              onToggleActive={handleToggleActive}
              isActive={activeStates[cuadro]}
              canClose={cuadro === "Mapa" || cuadro === "Ayuda" || cuadro === "Chat" || cuadro === "Inventario"}
              onFrameClick={handleFrameClick}
              zIndex={order[cuadro]}
            >
              {cuadro === "Consola" ? (
                <ConsoleDraggableContent
                  apiUrl={apiUrl}
                  onOpenMap={handleOpenMap}
                  onOpenHelp={handleOpenHelp}
                  onOpenChat={handleOpenChat}
                  onOpenInventario={handleOpenInventario}
                  onMapUpdate={handleMapUpdate}
                />
              ) : cuadro === "Mapa" ? (
                <MapDraggableContent apiUrl={apiUrl} mapUpdateTrigger={mapUpdateTrigger} />
              ) : cuadro === "Descripcion" ? (
                <DescripcionDraggableContent apiUrl={apiUrl} mapUpdateTrigger={mapUpdateTrigger} />
              ) : cuadro === "Inventario" ? (
                <InventarioDraggableContent apiUrl={apiUrl} mapUpdateTrigger={mapUpdateTrigger} />
              ) : (
                <Componente />
              )}
            </DraggableFrame>
          )
        })}
      </div>
    </DndContext>
  )
}

export default App
