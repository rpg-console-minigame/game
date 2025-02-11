const DescripcionDraggableContent = ({ cuadro }) => {
  return <div id={cuadro + "-content"} style={{
    // maxima altura 50% de la pantalla
    maxHeight: "70vh",
    overflowY: "auto",
  }}>
    <h1 style={{ textAlign: "center" }}>El Bosque Encantado</h1>
    <p style={{ textAlign: "center" }}>
      -----------,@@@@@@,---------------<br />
      ---,,,.---,@@@@@@/@@,--.oo8888o.--<br />
      ,&%%&%&&%,@@@@@/@@@@@@,8888\88/8o-<br />
      ,%&\%&&%&&%,@@@\@@@/@@@88\88888/88-<br />
      %&&%&%&/%&&%@\@@/ /@@@88888\88888-<br />
      %&&%/ %&%%&&@@\ V /@@' `88\8 `/88'-<br />
      `&%\ ` /%&'----|.|--------\ '|8'--<br />
      ----|o|--------| |---------| |----<br />
      ----|.|--------| |---------| |----<br />
      --\//_/__/--,\_//__\__/--\_//__/--<br />
      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^</p>


    <p style={{ textAlign: "center" }}>
      Bosque denso y misterioso donde los árboles parecen susurrar secretos antiguos con cada soplo de viento. El suelo está cubierto de musgo brillante que resplandece bajo la luz de las luciérnagas que bailan en la penumbra. Los senderos serpentean entre los árboles centenarios, cuyas ramas se entrelazan formando arcos naturales que parecen portales hacia otro mundo.<br />
      Aquí y allá, flores luminosas y de colores brillantes iluminan la oscuridad, emitiendo un suave resplandor que guía a los viajeros perdidos. Criaturas mágicas como hadas risueñas, elfos silenciosos y centauros majestuosos acechan entre las sombras, observando con curiosidad a aquellos que se aventuran en su reino.
    </p>
  </div>
}

export default DescripcionDraggableContent

