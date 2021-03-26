
const buscarre = document.querySelector("#registrarse");

const btnCerrar = document.querySelector("#registrarse");
const btnBuscar = document.querySelector("#iniciarsesion");

function Cerrar() {
	buscarre.style.display = "none";
}
function Abrir() {
	buscarre.style.display = "block";
}


btnCerrar.addEventListener('click', function(){
	Cerrar();
})
btnBuscar.addEventListener('click', function(){
	Abrir();
})