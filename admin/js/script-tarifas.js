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

    fetch('https://cablemovil.es/tarifas/').then(function (response) {
      // The API call was successful!
      return response.text();
    }).then(function (html) {
    
      // Convert the HTML string into a document object
      var parser = new DOMParser();
      var doc = parser.parseFromString(html, 'text/html');
      console.log(doc)
    
    }).catch(function (err) {
      // There was an error
      console.warn('Something went wrong.', err);
    });


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

      var gigas = document.createElement("input");
      gigas.setAttribute("type", "number");
      gigas.setAttribute("placeholder", "gigas")
      contMoviles.appendChild(gigas)
      contMoviles.innerHTML += "<br>";
      
    }

  }


function post() {
  
}