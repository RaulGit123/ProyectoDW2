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
//Para indicar el error si hay una misma reserva con la misma hora, fecha y mesa
let MismoTodo = document.getElementById("respt");
//Para usarlo como un booleano
let horaseleccionada = "hola";
//Variable para guardar la fecha
let fechaguardada;
//Variable para guardar la hora
let horaguardada;
//Sacar el dia que es en ese momento
let fecha = new Date();
let añoActual = fecha.getFullYear();
let hoy = fecha.getDate();
let mesActual = fecha.getMonth() + 1; 

//Evento que se activa cuando hace click en sumar personas
listaMa.forEach(ele => {
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[0].innerHTML);
        if(cant<8){
        listaCant[0].innerHTML = cant+1;
    }
    });
});
//Evento que se activa cuando hace click en restar personas
listaMe.forEach(ele => {
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[0].innerHTML);
        if (cant>0) {
            listaCant[0].innerHTML = cant-1;
        }
    });
});

//Para seleccionar la hora 
//Cuando seleccione una hora cambia a un color más oscuro, y todas las demás vuelven al color inicial(debido a que no puedes seleccionar 2 horas a la vez)
let CuandoClick = function(){
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
      

//Si las personas son inferiores a 2 mostrara el error 
      if(listaCant[0].innerHTML<2){
        d_nested.classList.remove("d-none");
        MismoTodo.classList.add("d-none");
      }else{
        d_nested.classList.add("d-none");
      }
      //Esta comprobación esta hecha debido a que al sacar la fecha actual, los digitos inferiores a 10, los saca separados y no acompañados de 0, por lo tanto produciria errores de comparación
      if(hoy<10 && mesActual>=10){
        fechaguardada = añoActual+"-"+mesActual+"-0"+hoy;
     }
     if(mesActual<10 && hoy>=10){
      fechaguardada = añoActual+"-0"+mesActual+"-"+hoy;
    }
    if(hoy<10 && mesActual<10){
      fechaguardada = añoActual+"-0"+mesActual+"-0"+hoy;
    }if(hoy>=10 && mesActual>=10){
      fechaguardada = añoActual+"-"+mesActual+"-"+hoy;
     }
//Comprobación para que la fecha seleccionada por el usuario sea igual o superior a la actual
//Si no se cumple mostrá el error
      if(listaFecha[0].value=="" || listaFecha[0].value<fechaguardada){
        d_nested2.classList.remove("d-none");
        MismoTodo.classList.add("d-none");
      }else{
        d_nested2.classList.add("d-none");
      }
//Para detectar cual es la hora que ha elegido el usuario, en caso de que no seleccione ninguna mostrá el error
      if(horaseleccionada == "hola"){
      for (let i=0; i<listaHoras.length; i++){ 
        if(listaHoras[i].style.backgroundColor==="rgb(75, 75, 75)"){
          let BorrarHorita = document.querySelector("#horita");
          if(BorrarHorita != null){
            BorrarHorita.removeAttribute("id");
          }
          HoraBaseDatos[i].setAttribute("id","horita");
          horaguardada=HoraBaseDatos[i];
            d_nested3.classList.add("d-none");
            horaseleccionada = "adios";
            break;
        }
}
      }
      if(horaseleccionada == "hola"){
        d_nested3.classList.remove("d-none");
        MismoTodo.classList.add("d-none");
    }
      //Si se cumplen todas las comprobaciones, se enviara por ajax a GuardaReserva, y te podrá redirijir a PedidosYReserva.php para poder visualizar la reserva
    if(listaCant[0].innerHTML>=2 && listaFecha[0].value!="" && listaFecha[0].value>=fechaguardada && horaseleccionada == "adios"){
      horaseleccionada = "hola";
    var NumeroPersonas = listaCant[0].innerHTML;
    var Fecha = listaFecha[0].value;
    var Hora = horaguardada.innerHTML;
    console.log(NumeroPersonas);
    console.log(Fecha);
    console.log(Hora);
    //Enviamos por ajax los datos introducidos por usuario
    $.ajax({
      method: "POST",
      url: "../modelo/GuardaReserva.php",
      data: {text: $("div.cantidad").text(),
             text2: $("#fechita").val(),
             text3: $("#horita").text()
    },
    success:(data)=>{
      //Si recibe datos de GuardaReserva quiere decir que puede reservar, sino mostrá un error
      if(parseInt(data.trim())!=0){
      window.location.href = "PedidosYReserva.php";
    }else{
      MismoTodo.classList.remove("d-none");
    }}
    });
    }
    
    });
});