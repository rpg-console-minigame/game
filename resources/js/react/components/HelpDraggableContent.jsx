const HelpDraggableContent = () => {
  return (
    <div id="Mapa-content">
      <pre style={{ fontSize: "0.8em", lineHeight: "1.2" }}>
        {`
        -"ayuda" : muestra el listado de comandos
        -"mapa" : muestra el mapa
        -"chat" : muestra el chat              
        -"arriba/abajo/izquierda/derecha" : mueve al personaje
        `}
      </pre>
    </div>
  )
}

export default HelpDraggableContent

