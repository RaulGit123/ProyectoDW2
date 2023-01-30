let listaMa = document.querySelectorAll(".btoMa");
let listaMe = document.querySelectorAll(".btoMe");
let listaCant = document.querySelectorAll(".cantidad");
let listaFecha = document.querySelectorAll(".fecha");
let ReservaPersonas = document.querySelectorAll(".centrado");
let d_nested = document.getElementById("resp");
let d_nested2 = document.getElementById("respf");
let d_nested3 = document.getElementById("resph");
let listaHoras = document.querySelectorAll(".item");

let horaseleccionada = "hola";

listaMa.forEach(ele => {
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[0].innerHTML);
        if(cant<8){
        listaCant[0].innerHTML = cant+1;
    }
    });
});

listaMe.forEach(ele => {
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[0].innerHTML);
        if (cant>0) {
            listaCant[0].innerHTML = cant-1;
        }
    });
});

//Para seleccionar la hora 
let CuandoClick = function(){
    // console.log(this.innerHTML);
    for (var i=0; i<listaHoras.length; i++){ 
        listaHoras[i].style.backgroundColor="rgba(255, 255, 255, 0.7)";
}
    this.style.backgroundColor = "#4B4B4B";
}
listaHoras.forEach(boton =>{
    boton.addEventListener("click",CuandoClick);
});

//Soltará mensajes de error si hace mal la reserva
ReservaPersonas.forEach(Com =>{
    Com.addEventListener("click",function(){
      if(listaCant[0].innerHTML<2){
        d_nested.classList.remove("d-none");
      }else{
        d_nested.classList.add("d-none");
      }
      if(listaFecha[0].value==""){
        d_nested2.classList.remove("d-none");
      }else{
        d_nested2.classList.add("d-none");
      }
      
      if(horaseleccionada == "hola"){
      for (var i=0; i<listaHoras.length; i++){ 
        if(listaHoras[i].style.backgroundColor==="rgb(75, 75, 75)"){
            d_nested3.classList.add("d-none");
            horaseleccionada = "adios";
            break;
        }
}
      }
      if(horaseleccionada == "hola"){
        d_nested3.classList.remove("d-none");
    }

      console.log(listaCant[0].innerHTML);
      console.log(listaFecha[0].value);
        //   window.location.href = "../vista/paginaUsuario.php";
      
    });
});





function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}