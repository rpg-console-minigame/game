"use client"

import { useState, useCallback } from "react"
import { DndContext } from "@dnd-kit/core"
import DraggableFrame from "./components/DraggableFrame"
import DescripcionDraggableContent from "./components/DescripcionDraggableContent"
import MapDraggableContent from "./components/MapDraggableContent"
import ConsoleDraggableContent from "./components/ConsoleDraggableContent"
import "bootstrap/dist/css/bootstrap.min.css"

const App = () => {
  const cuadros = ["Descripcion", "Mapa", "Consola"]
  const componentes = [DescripcionDraggableContent, MapDraggableContent, ConsoleDraggableContent]

  const [positions, setPositions] = useState(() => {
    const savedPositions = {}
    cuadros.forEach((cuadro) => {
      const saved = localStorage.getItem(cuadro)
      switch (cuadro) {
        case "Descripcion":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 33, y: 35 }
          break
        case "Consola":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 700, y: 35 }
          break
        case "Mapa":
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 700, y: 210 }
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
      switch (cuadro) {
        case "Mapa":
          savedStates[cuadro] = saved ? JSON.parse(saved) : false
          break
        default:
          savedStates[cuadro] = saved ? JSON.parse(saved) : true
          break
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
    if (id === "Mapa") {
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

  const handleOpenMap = useCallback(() => {
    setActiveStates((prev) => ({
      ...prev,
      Mapa: true,
    }))
    localStorage.setItem("Mapa-active", JSON.stringify(true))
  }, [])

  const handleFrameClick = useCallback((id) => {
    setOrder((prevOrder) => {
      const newOrder = { ...prevOrder }
      const maxOrder = Math.max(...Object.values(newOrder))
      newOrder[id] = maxOrder + 1
      return newOrder
    })
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
              canClose={cuadro === "Mapa"}
              onFrameClick={handleFrameClick}
              zIndex={order[cuadro]}
            >
              {cuadro === "Consola" ? <ConsoleDraggableContent onOpenMap={handleOpenMap} /> : <Componente />}
            </DraggableFrame>
          )
        })}
      </div>
    </DndContext>
  )
}

export default App

