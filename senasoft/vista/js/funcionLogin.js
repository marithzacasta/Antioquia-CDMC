let divLog = document.getElementById("login"); 
let divSign = document.getElementById("registro");

document.getElementById("change-login").addEventListener("click", mostrarLog);
document.getElementById("change-signUp").addEventListener("click", mostrarReg);

function mostrarLog(){
    divSign.style.visibility="hidden";
    divLog.style.visibility="visible";
}

function mostrarReg(){
    divSign.style.visibility="visible";
    divLog.style.visibility="hidden";
}