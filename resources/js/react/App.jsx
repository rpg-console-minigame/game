"use client"

import { useState } from "react"
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
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 700, y: 250 }
          break
        default:
          savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 0, y: 0 }
          break
      }
    })
    return savedPositions
  })

  const handleDragEnd = (event) => {
    const { active, delta } = event
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

  return (
    <DndContext onDragEnd={handleDragEnd}>
      <div className="position-relative vh-100 vw-100">
        {cuadros.map((cuadro, index) => {
          const Componente = componentes[index] // Obtiene el componente correcto
          return (
            <DraggableFrame key={cuadro} id={cuadro} initialPosition={positions[cuadro]}>
              <Componente /> {/* Renderiza el componente JSX */}
            </DraggableFrame>
          )
        })}
      </div>
    </DndContext>
  )
}

export default App
