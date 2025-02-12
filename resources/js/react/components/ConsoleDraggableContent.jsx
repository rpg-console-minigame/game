import React from 'react';

const ConsoleDraggableContent = ({ cuadro }) => {
  return (
    <div id={`${cuadro}-content`} className="console-container">
      <form action="">
        <div className="form-group" style={{ display: 'flex', alignItems: 'center' }}>
          <label htmlFor="console-input" className="console-label" style={{ marginRight: '10px' }}>
            user@PC:~$
          </label>
          <input
            type="text"
            className="console-input"
            id="console-input"
            autoComplete="off"
            autoFocus
            style={{
              flex: 1, // Hace que el input ocupe el espacio restante
              padding: '8px', // Espacio interno para que se vea bien
              backgroundColor: '#222', // Fondo oscuro como la consola
              color: '#fff', // Texto blanco
              borderRadius: '4px', // Bordes redondeados para suavizar el estilo
            }}
          />
        </div>
      </form>
      <p style={{
        color: '#ccc', 
        fontSize: '0.85em', 
        marginTop: '10px' // Espacio entre el input y el texto de ayuda
      }}>
        Escribe un comando y presiona Enter para ejecutarlo. Usa 'help' para más información.
      </p>
    </div>
  );
};

export default ConsoleDraggableContent;
