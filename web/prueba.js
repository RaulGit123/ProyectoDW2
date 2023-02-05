let Imagen = document.querySelector(".imagen");

let images = Imagen.querySelectorAll(".images");

let index = 1;

setInterval(function(){
    let percentage = index*-100;
    Imagen.style.transform = 
    "translateX("+percentage+"%)";
    index++;
    if(index>(images.length)-1){
        index = 0;
    }
},1000);
// window.onload = function () {
//     // Variables
//     const IMAGENES = [
//         'img/sakura.jpg',
//         'img/tori.jpg',
//         'img/restaurante.jpg'
//     ];
//     const TIEMPO_INTERVALO_MILESIMAS_SEG = 3000;
//     let posicionActual = 0;
//     let $imagen = document.querySelector('#imagen');
//     let intervalo;
//     console.log($imagen);
//     function pasarFoto() {
//         if(posicionActual >= IMAGENES.length - 1) {
//             posicionActual = 0;
//         } else {
//             posicionActual++;
//         }
//         renderizarImagen();
//     }

//     function renderizarImagen () {
//         $imagen.style.backgroundImage = `url(${IMAGENES[posicionActual]})`;
//     }

//     function playIntervalo() {
//         intervalo = setInterval(pasarFoto, TIEMPO_INTERVALO_MILESIMAS_SEG);

//     }

//     // Iniciar
//     renderizarImagen();
//     playIntervalo();
// } 