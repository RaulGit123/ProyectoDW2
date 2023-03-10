// EN ESTE ARCHIVO ESTÁN TODAS LAS FUNCIONALIDADES COMUNES PARA TODA LA PÁGINA

//Función para comprimir el nav al scrollear
window.onscroll = function () { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.querySelector("nav").classList.add("navbar-shrink");
    } else {
        document.querySelector("nav").classList.remove("navbar-shrink");
    }
}

//Al pulsar la opción activa del nav, se scrollea con una transición hasta arriba de la página
let activoExiste = document.querySelector('.activo') !== null;

if (activoExiste) {
    document.querySelector('.activo').addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

//Hace que parpadee un botón al pulsar el elemento del nav en principal.php
let aquiExiste = document.querySelector(".aqui") !== null;
if (aquiExiste) {
    let boton = document.querySelector(".btn-xl");
    let navs = document.querySelectorAll(".aqui");
    navs.forEach(ele => {
        ele.addEventListener("click", function () {
            boton.classList.add("blink_me");
            setTimeout(function () {
                boton.classList.remove("blink_me");
            }, 1000);
        });
    });
}

//Creación e implementación del footer
function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}
let div1 = createElementFromHTML(`<footer class="bg-dark text-center text-white">
<div class="container p-4">
    <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"><i
                class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button"><i
                class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"><i
                class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/" role="button"><i
                class="fab fa-linkedin"></i></a>
    </section>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        Contact us at: <a class="text-light" href="mailto:nigirijapan@gmail.com">nigirivalencia@gmail.com</a> | <a
            class="text-light" href="tel:+34963123456">963 12 34 56</a> | <a class="text-light"
            href="https://goo.gl/maps/x7VUrEzaKU3dV3cV8">C/D'Alberic 18, 46008 València</a>
    </div>
</footer>`);

//En caso de haber div de id griddy, poner el footer dentro. Si no, en el body.
if (document.querySelector("#griddy") !== null) {
    document.querySelector("#griddy").appendChild(div1);
} else document.querySelector("body").appendChild(div1);
