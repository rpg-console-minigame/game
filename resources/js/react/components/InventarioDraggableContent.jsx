"use client";

import { useState, useEffect } from "react";

const InventarioDraggableContent = ({ apiUrl, mapUpdateTrigger }) => {
  const [inventarioInfo, setInventarioInfo] = useState(null);

  useEffect(() => {
    const fetchInventarioInfo = async () => {
      try {
        const response = await fetch(`${apiUrl}/mapInfo`);
        if (!response.ok) {
          throw new Error(`¡Error HTTP! Estado: ${response.status}`);
        }
        const data = await response.json();
        setInventarioInfo(data);
        console.log("Inventario Info:", data.inventario);
      } catch (error) {
        console.error("Error al obtener la información del inventario:", error);
      }
    };

    fetchInventarioInfo();
  }, [apiUrl, mapUpdateTrigger]);

  if (!inventarioInfo) {
    return <div>Cargando...</div>;
  }

  return (
    <div
      id="Inventario-content"
      style={{
        maxHeight: "70vh",
        overflowY: "auto",
      }}
    >
      <h1 style={{ textAlign: "center" }}>Inventario</h1>

      {inventarioInfo.inventario && inventarioInfo.inventario.length > 0 ? (
        <div>
          <ul style={{ listStyleType: "none", padding: 0 }}>
            {inventarioInfo.inventario.map((objeto, index) => (
              <li
                key={index}
                style={{
                  margin: "15px 0",
                  padding: "10px",
                  border: "1px solid #444",
                  borderRadius: "5px",
                }}
              >
                <h3 style={{ marginTop: 0 }}>{objeto.nombre || "Objeto desconocido"}</h3>
                <p>{objeto.descripcion || "Sin descripción"}</p>
                <div
                  style={{
                    display: "flex",
                    justifyContent: "space-between",
                    fontSize: "0.8em",
                    color: "#aaa",
                  }}
                >
                </div>
                <div style={{ marginTop: "0.5em", fontSize: "0.8em", color: "#aaa" }}>
                  <span>Valor: {objeto.coste || "Sin valor"}</span>
                </div>
                <div style={{ marginTop: "0.5em", fontSize: "0.8em", color: "#aaa" }}>
                  <span>Durabilidad: {objeto.durabilidad || "Sin durabilidad"}</span>
                </div>
                <div style={{ marginTop: "0.5em", fontSize: "0.8em", color: "#aaa" }}>
                  <span>Creado el: {new Date(objeto.created_at).toLocaleDateString() || "Fecha desconocida"}</span>
                </div>
              </li>
            ))}
          </ul>
        </div>
      ) : (
        <p style={{ textAlign: "center" }}>No tienes objetos en tu inventario.</p>
      )}
    </div>
  );
};

export default InventarioDraggableContent;
