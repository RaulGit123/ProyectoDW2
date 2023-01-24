let listaMa = document.querySelectorAll(".btoMa");
let listaMe = document.querySelectorAll(".btoMe");
let listaCant = document.querySelectorAll(".cantidad");

listaMa.forEach(ele => {
    let id = ele.parentElement.id;
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id-1].innerHTML);
        listaCant[id-1].innerHTML = cant+1;
    });
});

listaMe.forEach(ele => {
    let id = ele.parentElement.id;
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id-1].innerHTML);
        if (cant>0) {
            listaCant[id-1].innerHTML = cant-1;
        }
    });
});

