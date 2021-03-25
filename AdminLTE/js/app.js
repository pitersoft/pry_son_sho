
const buscar = document.querySelector("#registrar");

const btnCerrar = document.querySelector("#iniciarsesion");
const btnBuscar = document.querySelector("#registrarse");

function Cerrar() {
	buscar.style.display = "none";
	buscar.style.transition = "all 1s";
}
function Abrir() {
	buscar.style.display = "block";
	buscar.style.transition = "all 0.5s";
}


btnCerrar.addEventListener('click', function(){
	Cerrar();
})
btnBuscar.addEventListener('click', function(){
	Abrir();
})
