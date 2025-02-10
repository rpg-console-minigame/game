"use client"

import { useState } from "react"
import { DndContext } from "@dnd-kit/core"
import DraggableFrame from "./components/DraggableFrame"
import DraggableContent from "./components/DraggableContent"
import "bootstrap/dist/css/bootstrap.min.css"

const App = () => {
  const colors = ["danger", "primary", "success", "warning"]
  const [positions, setPositions] = useState(() => {
    const savedPositions = {}
    colors.forEach((color) => {
      const saved = localStorage.getItem(color)
      savedPositions[color] = saved ? JSON.parse(saved) : { x: 0, y: 0 }
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
        {colors.map((color) => (
          <DraggableFrame key={color} id={color} initialPosition={positions[color]}>
            <DraggableContent color={color} />
          </DraggableFrame>
        ))}
      </div>
    </DndContext>
  )
}

export default App

