let activoExiste = document.querySelector('.activo') !== null;

window.onscroll = function () { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.querySelector("nav").classList.add("navbar-shrink");
    } else {
        document.querySelector("nav").classList.remove("navbar-shrink");
    }
}

if (activoExiste) {
    document.querySelector('.activo').addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}


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

console.log("JS Común")