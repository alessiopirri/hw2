fetch(BASE_PATH + "getcarrello").then(onResponse).then(onJsonCarrello);

function onResponse(response) {
    return response.json();
}

function onJsonCarrello(json) {
    const sezione = document.querySelector("#carrello");
    sezione.innerHTML = "";
    //if (json)
    for (let prodotto of json) {
        const div = document.createElement("div");
        const divinterno = document.createElement("div");
        const immagine = document.createElement("img");
        const titolo = document.createElement("p");
        const quantita = document.createElement("select");
        const rimuovi = document.createElement("img");
        immagine.src = prodotto.img != "" ? prodotto.img : "img/immagine-non-disponibile.png";
        immagine.classList.add("img");
        titolo.textContent = prodotto.marca + " " + prodotto.modello;
        titolo.dataset.codice = prodotto.type + "/" + prodotto.id;
        titolo.classList.add("titoloprodotto");
        titolo.addEventListener("click", apriProdotto);

        rimuovi.src = "img/rimuovi.svg";
        rimuovi.classList.add("rimuovi");
        rimuovi.addEventListener("click", (event) => rimuoviCarrello(event, prodotto.id));

        quantita.dataset.codice = prodotto.id;

        divinterno.classList.add("nomequantita");

        div.appendChild(immagine);
        divinterno.appendChild(titolo);
        divinterno.appendChild(quantita);
        div.appendChild(divinterno);
        div.appendChild(rimuovi);
        div.classList.add("item");

        sezione.appendChild(div);
        riempiSelect(prodotto.quantita, prodotto.id);
    }
    //SE IL CARRELLO NON E' VUOTO MOSTRO IL PULSANTE PER EFFETTUARE L'ORDINE
    if (json.length) {
        const aggiungi = document.createElement("p");
        aggiungi.id = "aggiungiOrdine";
        aggiungi.addEventListener("click", aggiungiOrdine);
        aggiungi.textContent = "Effettua l'ordine";
        sezione.appendChild(aggiungi);
    }

}

function aggiungiOrdine(event) {
    console.log("cliccato");
    fetch(BASE_PATH + "inserisciordine").then(onResponse).then(onJsonOrdine);
    //fetch("getcarrello.php").then(onResponse).then(onJsonCarrello);
}

function onJsonOrdine(json) {
    if (json) {
        console.log(json);
        window.alert(json);
    } else {
        window.location.assign("profilo");
    }
}


function rimuoviCarrello(event, id) {
    fetch(BASE_PATH + "rimuovicarrello/" + id).then(onResponse).then(onJsonRimuovi);
    fetch(BASE_PATH + "getcarrello").then(onResponse).then(onJsonCarrello);
}

function onJsonRimuovi(json) {
    if (json)
        fetch(BASE_PATH + "getcarrello").then(onResponse).then(onJsonCarrello);
}

function onJsonDisponibilita(json, quantita, code) {

    const select = document.querySelector("#carrello select[data-codice='" + code + "']");
    for (let i = 0; i <= json.QuantitaEcommerce; i++) {
        //console.log(i);
        const option = document.createElement("option");
        option.textContent = i;
        option.value = i;
        option.selected = i == quantita ? true : false;
        select.appendChild(option);
    }
    select.addEventListener("change", (event) => aggiornaCarrello(event, code))
}

function aggiornaCarrello(event, code) {
    /*const messaggio = document.querySelector(".messaggio");
    messaggio.textContent = "";*/
    const q = event.currentTarget.value;
    if (q > 0) {
        fetch(BASE_PATH + "inseriscicarrello/" + code + "/" + q) //.then(onResponse).then(onJsonCarrello);
    } else {
        fetch(BASE_PATH + "rimuovicarrello/" + code).then(onResponse).then(onJsonRimuovi);
    }
}

function riempiSelect(quantita, code) {
    fetch(BASE_PATH + "disponibilita/" + code).then(onResponse).then((json) => onJsonDisponibilita(json, quantita, code));
}

function apriProdotto(event) {
    //console.log(event.currentTarget);
    window.location.assign(BASE_PATH + "paginaprodotto/" + event.currentTarget.dataset["codice"]);
}