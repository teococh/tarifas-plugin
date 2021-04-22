var tipoBloque;
var numMoviles;
var tipoMovil;
window.onload = function() {

  console.log("script-tarifas.js iniciado")

  var myModal = new bootstrap.Modal(document.getElementById("myModal"), {});
  document.onreadystatechange = function () {
    myModal.show();
  };

  tipoMovil = document.getElementById("tipoMovil");
  tipoBloque = document.getElementById("tipoBloque");
  numMoviles = document.getElementById("numMoviles");
  tipoMovil.addEventListener("change", moviles);
  tipoBloque.addEventListener("change", TipoBloque);
  numMoviles.addEventListener("blur", moviles);

  document.getElementById("send").addEventListener("click", post);

  // Ajax promise para enviar los datos del formulario a script php que los guarda en la base de datos

}

function TipoBloque() {

  let fibra = document.getElementById("fibra");
  let movil = document.getElementById("movil");

  if (tipoBloque.value == "fibra") {
    fibra.classList.remove("d-none");
    movil.classList.add("d-none");
    console.log("Fibra")
  }else {
    fibra.classList.add("d-none")
    movil.classList.remove("d-none");
    console.log("Movil");
  }

}

  function moviles() {
    
    var contMoviles = document.getElementById("contMoviles");

    console.log(numMoviles.value)
    contMoviles.innerHTML = "";


    if (tipoMovil.value == "sencillo") {
      for (let i = 0; i < numMoviles.value; i++) {
        var nombre = document.createTextNode("Movil " + (i+1));
        var gigas = document.createElement("input");
        var minutos = document.createElement("input");
        
    
        minutos.setAttribute("type", "number");
        minutos.setAttribute("placeholder", "minutos")
        gigas.setAttribute("type", "number");
        gigas.setAttribute("placeholder", "gigas")
    
        contMoviles.appendChild(nombre)
        contMoviles.innerHTML += "<br>";
        contMoviles.appendChild(gigas)
        contMoviles.innerHTML += "<br>";
        contMoviles.appendChild(minutos);
        contMoviles.innerHTML += "<br>"; 
      }
    }else if (tipoMovil.value == "compartido") {
      for (let i = 0; i < numMoviles.value; i++) {
        var nombre = document.createTextNode("Movil " + (i+1));
        var gigas = document.createElement("input");
              
    
        gigas.setAttribute("type", "number");
        gigas.setAttribute("placeholder", "gigas")
    
        contMoviles.appendChild(nombre)
        contMoviles.innerHTML += "<br>";
        contMoviles.appendChild(gigas)
        contMoviles.innerHTML += "<br>";
      }
    }

  }


function post() {
  console.log("!")
}