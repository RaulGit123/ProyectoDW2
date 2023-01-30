 /*Para limpiar cookies?*/
 //document.cookie.split(";").forEach(function(c) {
  //  document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
   //});

//LISTA DE PLATOS
let lista = [];
let totalCarrito = [];

//Recogemos y recorremos comida.json
const response = await fetch('../config/comida.json')
    .then((response) => response.json())
    .then((json) => recorrer(json));

async function recorrer(data) {
    data.forEach(ele => {
        lista[ele.IdComida] = ele;
        totalCarrito[ele.IdComida] = 0;
    });
}

//Recogemos lista de tipos
let tipos = [];

lista.forEach(ele => {
    if (!tipos.includes(ele.tipo)) {
        tipos.push(ele.tipo);
    }
});

//COSITAS DE DOM
function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}

function numeroAEuros(num) {
    num = parseFloat(num).toFixed(2);
    return num.toString().replace(".",",")+"€";
}

function quitarExtension(str) {
    str = str.split(".");
    return str[0];
}

tipos.forEach(tipo => {
    let div1 = createElementFromHTML('<div class="px-0 container"></div>');
    let txtDiv2 = '<div class="masthead-subheading font-italic text-uppercase">'+tipo+'</div>';
    let div2 = createElementFromHTML(txtDiv2);
    // div1.appendChild(div2);
    lista.forEach(plato => {
        if (plato.tipo == tipo) {
            let div3 = createElementFromHTML('<div class="grid"></div>');
            let item1 = createElementFromHTML('<div class="item item-1"><img class="img" src="img/platos/'+plato.Imagen+'" alt="'+quitarExtension(plato.Imagen)+'"/></div>');
            let item2 = createElementFromHTML('<div class="item item-2">'+plato.Nombre+'</div>');
            let item3 = createElementFromHTML('<div class="item item-3">'+numeroAEuros(plato.Precio)+'</div>');
            let item4 = createElementFromHTML('<div class="item item-4" id="'+plato.IdComida+'"><button class="btoMa" name="button">+</button><div class="cantidad">0</div><button class="btoMe" name="button">-</button></div>');
            div3.appendChild(item1);
            div3.appendChild(item2);
            div3.appendChild(item3);
            div3.appendChild(item4);
            div1.appendChild(div3);
        }
    });
    document.querySelector("header").appendChild(div2);
    document.querySelector("header").appendChild(div1);
});

//BOTONES + Y -

let listaMa = document.querySelectorAll(".btoMa");
let listaMe = document.querySelectorAll(".btoMe");
let listaCant = document.querySelectorAll(".cantidad");

listaMa.forEach(ele => {
    let id = ele.parentElement.id;
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id-1].innerHTML);
        listaCant[id-1].innerHTML = cant+1;
        if (cant == 0) {
            document.querySelector("#c"+id).classList.remove("d-none");
        }
        actualizarCant(id, cant+1);
    });
});

listaMe.forEach(ele => {
    let id = ele.parentElement.id;
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id-1].innerHTML);
        if (cant>0) {
            listaCant[id-1].innerHTML = cant-1;
            actualizarCant(id, cant-1);
            if (cant-1 == 0) {
                document.querySelector("#c"+id).classList.add("d-none");
            }
        }
    });
});

lista.forEach(ele => {
    let divEle = createElementFromHTML('<div class="elemento d-none" id="c'+ele.IdComida+'"></div>');
    let div1 = createElementFromHTML('<div><span></span> '+ele.Nombre+'</div>');
    let div2 = createElementFromHTML('<div class="importe">'+numeroAEuros(ele.Precio)+'</div>');
    let btnX = createElementFromHTML('<button class="btn-danger">x</button>');
    btnX.addEventListener("click", function(){
        eliminarCant(ele.IdComida);
    });
    divEle.appendChild(div1);
    divEle.appendChild(div2);
    divEle.appendChild(btnX);
    document.querySelector("#carrito").appendChild(divEle);

    console.log(ele);
});

function actualizarCant(id,x) { //x = cant
    let elemento = document.querySelector('#c'+id);
    elemento.children[0].children[0].innerHTML = x+"x";
    elemento.children[1].innerHTML = numeroAEuros(lista[id].Precio*x);
    totalCarrito[id] = lista[id].Precio*x;
    actualizarTotal();
}

function eliminarCant(id) {
    document.getElementById(id).children[1].innerHTML = 0;
    document.querySelector("#c"+id).classList.add("d-none");
    totalCarrito[id] = 0;
    actualizarTotal();
}

function actualizarTotal() {
    let total = 0;
    totalCarrito.forEach(precio => {
        if (precio !== null) {
            total+=precio;
        }
    });
    console.log(total);
    document.querySelector("#precioFinal").innerHTML = numeroAEuros(total);
}