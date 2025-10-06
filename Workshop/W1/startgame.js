'use strict';

class GameData {

    timerId = 0;
    antalSpoken = 0;
    antalKlickadSpoken = 0;
    imgAlt = 'Detta är en bild på ett spöke!';
    imgSrc = 'https://openclipart.org/image/400px/svg_to_png/83359/fantomme.png';
    GameBegin = 0;
    GameEnd = 0;

    imgWidth = 400;
    imgHeight = 211;

    calculateGhostLeft() {
        return Math.round( Math.random() * (screen.availWidth - this.imgWidth)) + 1;
    }

    calculateGhostTop() {
        return Math.round( Math.random() * (screen.availHeight - this.imgHeight)) + 1;
    }

    removeGhosts() {
        let imgRefs = document.querySelectorAll('#gameField img');

        for(let i = 0; i < imgRefs.length; i++) {
            imgRefs.item(i).remove();
        }
    }

    prepareForNewGame() {
        this.timerId = 0;
        this.antalKlickadSpoken = 0;
        this.antalSpoken = 0;
        this.GameEnd = 0;
        this.GameBegin = 0;
    }

}

/*

1. Lägg till attributet miliseconds i GameData och instansiera sedan (globalt) ett objekt ur GameData oGameData.
2. Lägg till en lyssnare för load.
    a. Lägg till en Lyssnare för keydown med b eller B.
    b. Avsluta timern om det finns en.
    c. Skapa en timer med en anonym funktion som exekverar antal millisekunder som attributet milliseconds.
    d. I den anonyma funktionen skapa ett nytt img-element (se klassen GameData för stöd) och placera i gameField-elementet. Positionen för det nya img-elementet ska slumpas fram. Kom också ihåg att öka attributet antalSpoken.
    e. Lägg till en lyssnare för click på det nya img-elementet. Om händelsen inträffar öka attributet antalKlickadeSpoken med ett och ta sedan bort aktuellt img-element från
    f. Utöka keydown lyssnaren med att kontrollera för e eller E.
        a. Om denna kontroll är true:
            1. avsluta timern (om det finns någon).
            2. För användaren på lämpligt sätt (t ex alert()) visa hur många spöken det totalt har funnits på spelplanen och hur många användaren har fångat (klickat på).
            3. Anropa metoderna prepareForNewGame() och removeGhosts().
    3. Om tid finnes laborera med bildernas storlek och antalet millisekunder det skall gå mellan att varje nytt img-element skapas

*/



