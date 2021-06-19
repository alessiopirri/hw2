const op1 = document.querySelector("#operazione1 button");
const op2 = document.querySelector("#operazione2 button");
const op3 = document.querySelector("#operazione3 button");
const op4 = document.querySelector("#operazione4 button");


op1.addEventListener("click", operzione1);
op2.addEventListener("click", operzione2);
op3.addEventListener("click", operzione3);
op4.addEventListener("click", operzione4);


function onResponse(response) {
    return response.json();
}

function operzione1(event) {
    const parametro = document.querySelector("#operazione1 input[name=\"num\"]");
    if (parametro.value) {
        fetch(BASE_PATH + "operazioni/1/" + parametro.value).then(onResponse).then(onJsonOp);
    }
}

function operzione2(event) {
    const parametro = document.querySelector("#operazione2 input[name=\"str\"]");
    if (parametro.value) {
        fetch(BASE_PATH + "operazioni/2/" + parametro.value).then(onResponse).then(onJsonOp);
    }
}

function operzione3(event) {
    const nome = document.querySelector("#operazione3 input[name=\"nome\"]");
    const cognome = document.querySelector("#operazione3 input[name=\"cognome\"]");
    const cf = document.querySelector("#operazione3 input[name=\"cf\"]");
    const datanascita = document.querySelector("#operazione3 input[name=\"datanascita\"]");
    if (nome.value && cognome.value && cf.value && datanascita.value) {
        fetch(BASE_PATH + "operazioni/3/" + cf.value + "/" + nome.value + "/" + cognome.value + "/" + datanascita.value).then(onResponse).then(onJsonOp);
    }
}

function operzione4(event) {
    fetch(BASE_PATH + "operazioni/4").then(onResponse).then(onJsonOp);

}



function onJsonOp(json) {
    console.log(json);
    const risposta = document.querySelector("#arearisultato");
    risposta.value = JSON.stringify(json);
}