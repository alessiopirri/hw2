fetch(BASE_PATH + "trovapneumatici").then(onResponse).then(onJson);


function onJson(json) {
    const container = document.querySelector("#container"); //Seleziono il container dove andranno gli elementi
    for (let pneumatico of json) {
        const div = document.createElement("div"); //Creo il contenitore e i vari pezzi dell'elemento
        const div1 = document.createElement("div");
        const titolo = document.createElement("h1");
        const image = document.createElement("img");
        const descShow = document.createElement("p");
        const prezzo = document.createElement("p");
        const desc = document.createElement("p");
        titolo.textContent = pneumatico.marca + " " + pneumatico.modello; //Concateno marca e modello nella stringa titolo
        image.src = pneumatico.immagine != "" ? pneumatico.immagine : "img/immagine-non-disponibile.png";
        image.classList.add("immagine");
        prezzo.textContent = "€" + pneumatico.prezzo;
        div1.classList.add("titolo");
        descShow.textContent = "Clicca per mostrare la descrizione";
        descShow.addEventListener("click", mostraDesc);
        desc.textContent = pneumatico.descrizione != "" ? pneumatico.descrizione : "Descrizione non disponibile";
        desc.classList.add("hidden");
        desc.classList.add("descrizione");
        div1.appendChild(titolo);

        div.appendChild(div1);
        div.appendChild(image);
        div.appendChild(prezzo);
        div.appendChild(descShow);
        div.appendChild(desc);
        div.classList.add("item");
        div.dataset.codice = pneumatico.codice;
        div.addEventListener("click", apriProdotto);
        container.appendChild(div);
    }
    if (json.length == 0) {
        const na = document.createElement("p");
        na.textContent = "Non ci sono prodotti corrispondenti alla tua ricerca";
        na.id = "noproduct";
        document.querySelector("#container").appendChild(na);
    }

}

function mostraDesc(event) {
    event.stopPropagation();
    const pulsante = event.currentTarget;
    const descrizione = pulsante.parentNode.querySelector(".descrizione");
    descrizione.classList.remove("hidden");
    pulsante.textContent = "Nascondi descrizione";
    pulsante.removeEventListener("click", mostraDesc);
    pulsante.addEventListener("click", nascondiDesc);
}

function nascondiDesc(event) {
    event.stopPropagation();
    const pulsante = event.currentTarget;
    const descrizione = pulsante.parentNode.querySelector(".descrizione");
    descrizione.classList.add("hidden");
    pulsante.textContent = "Clicca per mostrare la descrizione";
    pulsante.removeEventListener("click", nascondiDesc);
    pulsante.addEventListener("click", mostraDesc);
}

function apriProdotto(event) {
    console.log(event.currentTarget);
    window.location.assign(BASE_PATH + "paginaprodotto/p/" + event.currentTarget.dataset["codice"]);
}