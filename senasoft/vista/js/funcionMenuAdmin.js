// Se definen los contenedores de las ventanas emergentes
let contCreateMun = document.querySelector(".create-mun");
let contEditMun = document.querySelector(".edit-mun");
let contDeleteMun = document.querySelector(".delete-mun");
let contCreateUsuario = document.querySelector(".create-usuario");
let contEditUsuario = document.querySelector(".edit-usuario");
let contDeleteUsuario = document.querySelector(".delete-usuario");
let contCreateSer = document.querySelector(".create-ser");
let contEditSer = document.querySelector(".edit-ser");
let contDeleteSer = document.querySelector(".delete-ser");
let contCreateCat = document.querySelector(".create-cat");
let contEditCat = document.querySelector(".edit-cat");
let contDeleteCat = document.querySelector(".delete-cat");
let contCreateEst = document.querySelector(".create-est");
let contEditEst = document.querySelector(".edit-est");
let contDeleteEst = document.querySelector(".delete-est");
let contCreateManz = document.querySelector(".create-manz");
let contEditManz = document.querySelector(".edit-manz");
let contDeleteManz = document.querySelector(".delete-manz");
let contEdit2Mun = document.querySelector(".edit2-mun");
let contEdit2Usuario = document.querySelector(".edit2-usuario");
let contEdit2Ser = document.querySelector(".edit2-ser");
let contEdit2Cat = document.querySelector(".edit2-cat");
let contEdit2Est = document.querySelector(".edit2-est");
let contEdit2Manz = document.querySelector(".edit2-manz");

// Se le indica la función a las botones
document.getElementById("btn-create-mun").addEventListener("click", createMun);
document.getElementById("btn-edit-mun").addEventListener("click", editMun);
document.getElementById("btn-delete-mun").addEventListener("click", deleteMun);
document.getElementById("btn-create-cat").addEventListener("click", createCat);
document.getElementById("btn-edit-cat").addEventListener("click", editCat);
document.getElementById("btn-delete-cat").addEventListener("click", deleteCat);
document.getElementById("btn-create-ser").addEventListener("click", createSer);
document.getElementById("btn-edit-ser").addEventListener("click", editSer);
document.getElementById("btn-delete-ser").addEventListener("click", deleteSer);
document.getElementById("btn-create-usuario").addEventListener("click", createUsuario);
document.getElementById("btn-edit-usuario").addEventListener("click", editUsuario);
document.getElementById("btn-delete-usuario").addEventListener("click", deleteUsuario);
document.getElementById("btn-create-manz").addEventListener("click", createManz);
document.getElementById("btn-edit-manz").addEventListener("click", editManz);
document.getElementById("btn-delete-manz").addEventListener("click", deleteManz);
document.getElementById("btn-create-est").addEventListener("click", createEst);
document.getElementById("btn-edit-est").addEventListener("click", editEst);
document.getElementById("btn-delete-est").addEventListener("click", deleteEst);
document.getElementById("btn-edit2-mun").addEventListener("click", edit2Mun);
document.getElementById("btn-edit2-usuario").addEventListener("click", edit2Usuario);
document.getElementById("btn-edit2-ser").addEventListener("click", edit2Ser);
document.getElementById("btn-edit2-cat").addEventListener("click", edit2Cat);
document.getElementById("btn-edit2-manz").addEventListener("click", edit2Manz);
document.getElementById("btn-edit2-est").addEventListener("click", edit2Est);

// Se crean las funciones para cambiar el estilo
function createMun() {
    esconder();
    contCreateMun.style.visibility = "visible";
}

function editMun() {
    esconder();
    contEditMun.style.visibility = "visible";
}

function deleteMun() {
    esconder();
    contDeleteMun.style.visibility = "visible";
}

function createUsuario() {
    esconder();
    contCreateUsuario.style.visibility = "visible";
}

function editUsuario() {
    esconder();
    contEditUsuario.style.visibility = "visible";
}

function deleteUsuario() {
    esconder();
    contDeleteUsuario.style.visibility = "visible";
}

function createSer() {
    esconder();
    contCreateSer.style.visibility = "visible";
}

function editSer() {
    esconder();
    contEditSer.style.visibility = "visible";
}

function deleteSer() {
    esconder();
    contDeleteSer.style.visibility = "visible";
}

function createCat() {
    esconder();
    contCreateCat.style.visibility = "visible";
}

function editCat() {
    esconder();
    contEditCat.style.visibility = "visible";
}

function deleteCat() {
    esconder();
    contDeleteCat.style.visibility = "visible";
}

function createEst() {
    esconder();
    contCreateEst.style.visibility = "visible";
}

function editEst() {
    esconder();
    contEditEst.style.visibility = "visible";
}

function deleteEst() {
    esconder();
    contDeleteEst.style.visibility = "visible";
}

function createManz() {
    esconder();
    contCreateManz.style.visibility = "visible";
}

function editManz() {
    esconder();
    contEditManz.style.visibility = "visible";
}

function deleteManz() {
    esconder();
    contDeleteManz.style.visibility = "visible";
}

function edit2Mun() {
    esconder();
    contEdit2Mun.style.visibility = "visible";
}

function edit2Ser() {
    esconder();
    contEdit2Ser.style.visibility = "visible";
}

function edit2Usuario() {
    esconder();
    contEdit2Usuario.style.visibility = "visible";
}

function edit2Cat() {
    esconder();
    contEdit2Cat.style.visibility = "visible";
}

function edit2Est() {
    esconder();
    contEdit2Est.style.visibility = "visible";
}

function edit2Manz() {
    esconder();
    contEdit2Manz.style.visibility = "visible";
}

function esconder() {
    contCreateMun.style.visibility = "hidden";
    contEditMun.style.visibility = "hidden";
    contDeleteMun.style.visibility = "hidden";
    contCreateUsuario.style.visibility = "hidden";
    contEditUsuario.style.visibility = "hidden";
    contDeleteUsuario.style.visibility = "hidden";
    contCreateSer.style.visibility = "hidden";
    contEditSer.style.visibility = "hidden";
    contDeleteSer.style.visibility = "hidden";
    contCreateCat.style.visibility = "hidden";
    contEditCat.style.visibility = "hidden";
    contDeleteCat.style.visibility = "hidden";
    contCreateEst.style.visibility = "hidden";
    contEditEst.style.visibility = "hidden";
    contDeleteEst.style.visibility = "hidden";
    contCreateManz.style.visibility = "hidden";
    contEditManz.style.visibility = "hidden";
    contDeleteManz.style.visibility = "hidden";
    contEdit2Mun.style.visibility = "hidden";
    contEdit2Usuario.style.visibility = "hidden";
    contEdit2Ser.style.visibility = "hidden";
    contEdit2Cat.style.visibility = "hidden";
    contEdit2Est.style.visibility = "hidden";
    contEdit2Manz.style.visibility = "hidden";
}