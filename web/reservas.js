let listaMa = document.querySelectorAll(".btoMa");
let listaMe = document.querySelectorAll(".btoMe");
let listaCant = document.querySelectorAll(".cantidad");

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