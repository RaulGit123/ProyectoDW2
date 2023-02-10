//LISTA DE PLATOS
let lista = [];
console.log("a");

//Recogemos y recorremos comida.json
const response = await fetch('../config/comida.json')
    .then((response) => response.json())
    .then((json) => recorrer(json));

async function recorrer(data) {
    data.forEach(ele => {
        lista[ele.IdComida] = ele;
    });
}

//Recogemos lista de tipos
let tipos = [];

lista.forEach(ele => {
    if (!tipos.includes(ele.Tipo)) {
        tipos.push(ele.Tipo);
    }
});

//Creación de elemento DOM a partir de texto
function createElementFromHTML(htmlString) {
    var div = document.createElement('div');
    div.innerHTML = htmlString.trim();
    return div.firstChild;
}

//Pasar por ejemplo 9.9 (precio en formato float para operar) a "9,90€" (precio más visual para el cliente)
function numeroAEuros(num) {
    return num.replace(".",",")+"€";
}

//Quitar la extensión al nombre de un archivo (nigiri.png -> nigiri)
function quitarExtension(str) {
    str = str.split(".");
    return str[0];
}

//Construcción e implementación de la carta
tipos.forEach(tipo => {
    let div1 = createElementFromHTML('<div class="seccion-carta"></div>');
    let h1 = createElementFromHTML('<h1 class=" text-center text-uppercase">'+tipo+'</h1>');
    lista.forEach(plato => {
        if (plato.Tipo == tipo) {
            let div2 = createElementFromHTML('<div class="card" style="width: 18rem;"></div>');
            let img = createElementFromHTML('<img class="card-img-top" src="img/platos/'+plato.Imagen+'" alt="'+quitarExtension(plato.Imagen)+'">');
            let div3 = createElementFromHTML('<div class="card-body"></div>');
            let h5 = createElementFromHTML('<h5 class="card-title font-weight-bold">'+plato.Nombre+'</h5>');
            let p = createElementFromHTML('<p class="card-text">'+plato.Descripcion+'</p>');
            let hr = createElementFromHTML('<hr style="border-top: 1px solid white;">');
            let h3 = createElementFromHTML('<h3 class="text-align-right">'+numeroAEuros(plato.Precio)+'</h3>');

            div2.appendChild(img);
            div3.appendChild(h5);
            div3.appendChild(p);
            div3.appendChild(hr);
            div3.appendChild(h3);
            div2.appendChild(div3);
            div1.appendChild(div2);
        }
    });
    document.querySelector("#carta").appendChild(h1);
    document.querySelector("#carta").appendChild(div1);
});