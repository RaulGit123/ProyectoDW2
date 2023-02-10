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
    if (!tipos.includes(ele.Tipo)) {
        tipos.push(ele.Tipo);
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
        if (plato.Tipo == tipo) {
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
let listaCantBase = document.querySelectorAll(".cantidad");
let listaCant = [];
listaCantBase.forEach(ele => {
    let id = ele.parentElement.id;
    listaCant[id] = ele;
});

listaMa.forEach(ele => {
    let id = ele.parentElement.id;
    // console.log(id);
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id].innerHTML);
        listaCant[id].innerHTML = cant+1;
        if (cant == 0) {
            document.querySelector("#c"+id).classList.remove("d-none");
        }
        actualizarCant(id, cant+1);
    });
});

listaMe.forEach(ele => {
    let id = ele.parentElement.id;
    ele.addEventListener("click", function(){
        let cant = parseInt(listaCant[id].innerHTML);
        if (cant>0) {
            listaCant[id].innerHTML = cant-1;
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

    // console.log(ele);
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

let total = 0;

function actualizarTotal() {
    total = 0;
    totalCarrito.forEach(precio => {
        if (precio !== null) {
            total+=precio;
        }
    });
    // console.log(total);
    document.querySelector("#precioFinal").innerHTML = numeroAEuros(total);
}

//idUsuario, PrecioFinal, fechaPedido
let pedido = {
    idUsuario: 0, precioFinal: 0, fechaPedido: "0", direccion: "", telefono: "", metodoPago: ""
};
//idComida, cantidad
let registroPedido = [];

document.querySelector("#fin").addEventListener("click",function(){
    let ready = true;
    if (metodoEscogido == "cc") {
        document.querySelectorAll("#datosb input").forEach(ele => {
            if (!ele.checkValidity()) {
                ready = false;
            }
        });
    } else if (metodoEscogido == "pp" && ready) {
        document.querySelectorAll("#datosp input").forEach(ele => {
            if (!ele.checkValidity()) {
                ready = false;
            }
        });
    } else ready = false;

    if (ready && document.getElementById("dire").checkValidity() && document.getElementById("phone").checkValidity()) {
        pedido.idUsuario = parseInt(document.querySelector("#idUsu").innerHTML);
        pedido.precioFinal = total;
        pedido.fechaPedido = new Date().toLocaleString('es-ES');
        pedido.direccion = document.getElementById("dire").value;
        pedido.telefono = document.getElementById("phone").value;
        if (document.querySelector(".seleccion").classList.contains("pp")) {
            pedido.metodoPago = "PayPal";
        } else pedido.metodoPago = "Credit Card";

        //recorrer cada uno de los platos seleccionados
        document.querySelectorAll(".elemento:not(.d-none)").forEach(ele => {
            let registro = {
                idComida: parseInt(ele.id.substring(1)),
                cantidad: parseInt(ele.children[0].children[0].innerHTML.slice(0,-1))
            }
            registroPedido.push(registro);
        });
        document.querySelector("#precioReal").innerHTML = pedido.precioFinal;

        let regPedJSON = JSON.stringify(registroPedido);
        $.ajax({
            method: "POST",
            url: "../modelo/GuardaPedido.php",
            data: {precioFinal: pedido.precioFinal,
                fechaPedido: pedido.fechaPedido,
                regPedJSON: regPedJSON,
                direccion: pedido.direccion,
                telefono: pedido.telefono,
                metodoPago: pedido.metodoPago
            }
        });
        window.location.href = "PedidosYReserva.php";
    }
});

let metodos = document.querySelector("#metodos").children;

Array.prototype.forEach.call(metodos, img => {
    img.addEventListener("click",function(){
        let seleccionado = document.querySelector(".seleccion");
        if (seleccionado !== null) {
            seleccionado.classList.remove("seleccion");
        }
        img.classList.toggle("seleccion");
        mostrarMetodo();
    });
});

let metodoEscogido = "";
function mostrarMetodo() {
    let cc = document.getElementById("cc");
    let pp = document.getElementById("pp");

    // MÉTODO Credit Card
    if (document.querySelector(".seleccion").classList.contains("cc")){
        metodoEscogido = "cc";
        cc.classList.remove("d-none");
        pp.classList.add("d-none");
    } else { //MÉTODO PayPal
        metodoEscogido = "pp";
        pp.classList.remove("d-none");
        cc.classList.add("d-none");
    }
}

document.querySelector("#fafin").addEventListener("click", function(){
    if (total!=0) {
        document.querySelector("#pago").classList.remove("d-none");
    }
});

document.querySelector(".close-btn").addEventListener("click", function(){
    document.querySelector("#pago").classList.add("d-none");
});