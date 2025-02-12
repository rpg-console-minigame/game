"use client"

import { useState, useEffect } from "react"
import { useDraggable } from "@dnd-kit/core"
import "bootstrap/dist/css/bootstrap.min.css"

const DraggableFrame = ({
  id,
  children,
  initialPosition,
  onToggleActive,
  isActive,
  canClose,
  onFrameClick,
  zIndex,
}) => {
  const [position, setPosition] = useState(initialPosition)
  const { attributes, listeners, setNodeRef, transform } = useDraggable({
    id,
    data: {
      isActive,
    },
  })

  useEffect(() => {
    setPosition(initialPosition)
  }, [initialPosition])

  const style = {
    transform: `translate3d(${position.x + (transform ? transform.x : 0)}px, ${position.y + (transform ? transform.y : 0)}px, 0)`,
    position: "absolute",
    maxWidth: "90%",
    width: "600px",
    background: "#222",
    border: "2px solid #aaa",
    color: "#ddd",
    fontFamily: "monospace",
    boxShadow: "3px 3px 0px #777",
    display: isActive ? "block" : "none",
    zIndex: zIndex,
  }

  const titleBarStyle = {
    background: "#aaa",
    color: "black",
    padding: "4px 8px",
    display: "flex",
    alignItems: "center",
    justifyContent: "space-between",
    fontWeight: "bold",
  }

  const handleToggleActive = () => {
    if (canClose) {
      onToggleActive(id)
    }
  }

  return (
    <div className="container-fluid p-0" style={style} onClick={() => onFrameClick(id)}>
      <div className="d-flex justify-content-between align-items-center" style={titleBarStyle}>
        <div
          ref={setNodeRef}
          {...listeners}
          {...attributes}
          style={{
            flex: 1,
            cursor: "grab",
            padding: "4px",
            marginRight: "8px",
          }}
        >
          <span>{id}</span>
        </div>
        <div>
          <button className="btn btn-success mx-1" style={{ width: 30, height: 30 }}></button>
          <button className="btn btn-warning mx-1" style={{ width: 30, height: 30 }}></button>
          <button
            className={`btn mx-1 ${canClose ? "btn-danger" : "btn-secondary"}`}
            style={{ width: 30, height: 30 }}
            onClick={handleToggleActive}
            disabled={!canClose}
          ></button>
        </div>
      </div>
      <div className="p-2 bg-dark" style={{ minHeight: "100px" }}>
        {children}
      </div>
    </div>
  )
}

export default DraggableFrame

