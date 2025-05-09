const HelpDraggableContent = () => {
  return (
    <div id="Mapa-content">
      <pre style={{ fontSize: "0.8em", lineHeight: "1.2" }}>
        {`
        -"ayuda" : muestra el listado de comandos
        -"mapa" : muestra el mapa
        -"chat" : muestra el chat              
        -"arriba/abajo/izquierda/derecha" : mueve al personaje
        -"tomar (item)" : toma el item del mapa y lo agrega al inventario
        -"inventario" : muestra los objetos que tienes en tu inventario
        `}
      </pre>
    </div>
  )
}

export default HelpDraggableContent
