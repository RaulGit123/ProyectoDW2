var SumaoResta; 
var num = parseFloat(document.getElementById("cantidad").innerHTML);
function Suma(){
    SumaoResta = document.getElementById("btoMa");
if(num<0){
    console.log(num);
    document.getElementById("cantidad").innerHTML = 0;
}
num += 1;
document.getElementById("cantidad").innerHTML = num;
}
function Resta(){
    if(num===0){
num = 0;
    } else{
    num -= 1;
    document.getElementById("cantidad").innerHTML = num;
    }
    }