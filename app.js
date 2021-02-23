
const buscar = document.querySelector("#buscar");

const btnCerrar = document.querySelector("#cerrar");
const btnBuscar = document.querySelector("#abrirb");

function Cerrar() {
	buscar.style.display = "none";
	buscar.style.transition = "all 1s";
}
function Abrir() {
	buscar.style.display = "flex";
	buscar.style.transition = "all 0.5s";
}


btnCerrar.addEventListener('click', function(){
	Cerrar();
})
btnBuscar.addEventListener('click', function(){
	Abrir();
})