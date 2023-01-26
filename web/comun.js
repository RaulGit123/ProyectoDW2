window.onscroll = function () { scrollFunction() };
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.querySelector("nav").classList.add("navbar-shrink");
    } else {
        document.querySelector("nav").classList.remove("navbar-shrink");
    }
}
document.querySelector('.activo').addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});