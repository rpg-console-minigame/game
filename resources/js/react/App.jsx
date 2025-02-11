"use client"

import { useState } from "react"
import { DndContext } from "@dnd-kit/core"
import DraggableFrame from "./components/DraggableFrame"
import DescripcionDraggableContent from "./components/DescripcionDraggableContent"
import MapDraggableContent from "./components/MapDraggableContent"
import "bootstrap/dist/css/bootstrap.min.css"

const App = () => {
  const cuadros = ["descripcion","mapa"]
  const componentes = [DescripcionDraggableContent,MapDraggableContent]

  const [positions, setPositions] = useState(() => {
    const savedPositions = {}
    cuadros.forEach((cuadro) => {
      const saved = localStorage.getItem(cuadro)
      savedPositions[cuadro] = saved ? JSON.parse(saved) : { x: 0, y: 0 }
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
      <div className="position-relative vh-100 vw-100 bg-light">
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
