//Para los botones de + y -
let listaMa = document.querySelectorAll(".btoMa");
let listaMe = document.querySelectorAll(".btoMe");
//Para el campo del numero de personas
let listaCant = document.querySelectorAll(".cantidad");
//Para el campo fecha
let listaFecha = document.querySelectorAll(".fecha");
//Para el boton de acabar la reserva
let ReservaPersonas = document.querySelectorAll(".centrado");
//Para indicar el error del campo personas
let d_nested = document.getElementById("resp");
//Para indicar el error del campo fecha
let d_nested2 = document.getElementById("respf");
//Para indicar el error en la selecciona de las horas
let d_nested3 = document.getElementById("resph");
//Las horas
let listaHoras = document.querySelectorAll(".item");
//Para guardar las horas en la base de datos
let HoraBaseDatos = document.querySelectorAll(".horas");

let horaseleccionada = "hola";
let fechaguardada;
let horaguardada;
//Sacar el dia que es en ese momento
let fecha = new Date();
let añoActual = fecha.getFullYear();
// console.log(añoActual);
let hoy = fecha.getDate();
// console.log(hoy);
let mesActual = fecha.getMonth() + 1; 
// console.log(mesActual);


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
    console.log(this.innerHTML);
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

      if(hoy<10){
        fechaguardada = añoActual+"-"+mesActual+"-"+hoy;
        // console.log(fechaguardada);
     }else{
      fechaguardada = añoActual+"-0"+mesActual+"-"+hoy;
      //  console.log(fechaguardada);
     }

      if(listaFecha[0].value=="" || listaFecha[0].value<fechaguardada){
        d_nested2.classList.remove("d-none");
      }else{
        d_nested2.classList.add("d-none");
      }

      if(horaseleccionada == "hola"){
      for (let i=0; i<listaHoras.length; i++){ 
        if(listaHoras[i].style.backgroundColor==="rgb(75, 75, 75)"){
          horaguardada=HoraBaseDatos[i];
            d_nested3.classList.add("d-none");
            horaseleccionada = "adios";
            break;
        }
}
      }
      if(horaseleccionada == "hola"){
        d_nested3.classList.remove("d-none");
    }

      // console.log(listaCant[0].innerHTML);
      // console.log(listaFecha[0].value);
      // console.log(fechaguardada);
      // console.log(horaseleccionada);
      // console.log(añoActual);
      // console.log(hoy);
      // console.log(mesActual);
      
    if(listaCant[0].innerHTML>=2 && listaFecha[0].value!="" && listaFecha[0].value>fechaguardada && horaseleccionada == "adios"){
          //  window.location.href = "../vista/paginaUsuario.php";
    var NumeroPersonas = listaCant[0].innerHTML;
    var Fecha = listaFecha[0].value;
    var Hora = horaguardada.innerHTML;
    console.log(NumeroPersonas);
    console.log(Fecha);
    console.log(Hora);
    }
      
    });
});





function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}