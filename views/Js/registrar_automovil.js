document.addEventListener("DOMContentLoaded", function () {
  const selectMarca = document.getElementById("marca");
  const selectTipoVehiculo = document.getElementById("tipoVehiculo");
  const selectModelo = document.getElementById("modelo");

  // Obtener marcas
  fetch("../cruds/obtener_marcas.php")
    .then((response) => response.json())
    .then((marcas) => {
      selectMarca.innerHTML = '<option value="">Seleccione marca</option>';
      marcas.forEach((marca) => {
        const option = document.createElement("option");
        option.value = marca.id;
        option.textContent = marca.nombre;
        selectMarca.appendChild(option);
      });
    })
    .catch((error) => console.error("Error al obtener las marcas:", error));

  // Obtener tipos de vehículos
  fetch("../cruds/obtener_tipos.php")
    .then((response) => response.json())
    .then((tipos) => {
      selectTipoVehiculo.innerHTML = '<option value="">Seleccione tipo</option>';
      tipos.forEach((tipo) => {
        const option = document.createElement("option");
        option.value = tipo.id;
        option.textContent = tipo.nombre;
        selectTipoVehiculo.appendChild(option);
      });
    })
    .catch((error) => console.error("Error al obtener los tipos de vehículo:", error));

  // Obtener modelos al cambiar el tipo de vehículo o la marca
  const obtenerModelos = () => {
    const marcaId = selectMarca.value;
    const tipoVehiculoId = selectTipoVehiculo.value;

    if (marcaId && tipoVehiculoId) {
      fetch(`../cruds/obtener_modelos.php?marca_id=${marcaId}&tipo_vehiculo_id=${tipoVehiculoId}`)
        .then((response) => response.json())
        .then((modelos) => {
          selectModelo.innerHTML = '<option value="">Seleccione modelo</option>';

          modelos.forEach((modelo) => {
            const option = document.createElement("option");
            option.value = modelo.id;
            option.textContent = modelo.nombre;
            selectModelo.appendChild(option);
          });
        })
        .catch((error) => console.error("Error al obtener los modelos:", error));
    } else {
      selectModelo.innerHTML = '<option value="">Seleccione modelo</option>';
    }
  };

  selectMarca.addEventListener("change", obtenerModelos);
  selectTipoVehiculo.addEventListener("change", obtenerModelos);
});
