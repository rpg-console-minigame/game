import { useState, useEffect } from "react"
import { useDraggable } from "@dnd-kit/core"
import "bootstrap/dist/css/bootstrap.min.css"

const DraggableFrame = ({ id, children, initialPosition }) => {
    const [position, setPosition] = useState(initialPosition)
    const { attributes, listeners, setNodeRef, transform } = useDraggable({ id })

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
        boxShadow: "3px 3px 0px #777"
    }

    const titleBarStyle = {
        background: "#aaa",
        color: "black",
        padding: "4px 8px",
        display: "flex",
        alignItems: "center",
        justifyContent: "space-between",
        fontWeight: "bold"
    }

    return (
        <div ref={setNodeRef} className="container-fluid p-0" style={style} {...listeners} {...attributes}>
            <div className="d-flex justify-content-between align-items-center" style={titleBarStyle}>
                <span>
                    {id}
                </span>
                <div>
                    <button className="btn btn-success mx-1" style={{ width: 30, height: 30 }}></button>
                    <button className="btn btn-warning mx-1" style={{ width: 30, height: 30 }}></button>
                    <button className="btn btn-danger mx-1" style={{ width: 30, height: 30 }}></button>
                </div>
            </div>
            <div className="p-2 bg-dark" style={{ minHeight: "100px" }}>{children}</div>
        </div>
    )
}

export default DraggableFrame
