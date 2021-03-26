
const buscarin = document.querySelector("#iniciarsesion");

const btnCerrar = document.querySelector("#registrarse");
const btnBuscar = document.querySelector("#iniciarsesion");

function Cerrar() {
	buscarin.style.display = "block";
	buscar.style.transition = "all 0.5s";
}
function Abrir() {
	buscarin.style.display = "none";
	buscar.style.transition = "all 0.5s";
}


btnCerrar.addEventListener('click', function(){
	Cerrar();
})
btnBuscar.addEventListener('click', function(){
	Abrir();
})