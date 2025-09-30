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
    1. Lägg till attributet milliseconds i GameData och tilldela den värdet 1000.
    
    2. Instansiera ett objekt ur klassen GameData och namnge det oGameData.
    
    2. Lägg till lyssnare för load
    2.1. Lägg till lyssnare för keydown b eller B
    2.1.1. Lägg till en timer.
    2.1.2. Skapa ett img-element
    2.1.3. Ändra Top, left, alt, src för img-elementet.
    2.1.4. Ändra witdh, height, position för img-elementet.
    2.1.5. Lägg till img-elementet till DOM:en.
    2.1.6. Lägg till lyssnare på click på img-elementet

    2.2. Lägg till lyssnare för keydown e eller E.
    2.2.1. Avsluta spelet.
    2.2.2. Visa information för spelaren.
    2.2.3. Förbered för nytt spel.
*/

