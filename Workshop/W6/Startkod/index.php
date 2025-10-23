<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Workshop: Bilracet</title>

    <!-- Css här. -->
    <style>

    </style>

</head>

<body>

    <main>
        <!--
            HTML

            1. Skapa ett HTML-formulär med metoden POST.
            2. En label med texten ”Hur många bilar ska tävla? (2–6).
            3. Lägg till en <input> för att skriva in hur många bilar som ska tävla.
            4. Lägg till knapp för att skicka formuläret.
        
        -->

        <?php

        /* PHP */

        //Vektor som innehåller de bilar som ska delta i racet.
        $bilar = ["Volvo", "BMW", "Tesla", "kia", "Ford", "Toyota"];


        //Bubble sortering som sorterar fart från högst till lägst    
        function bubbleSortByFart($array)
        {
            $n = count($array);

            for ($i = 0; $i < $n - 1; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if ($array[$j]['fart'] < $array[$j + 1]['fart']) {
                        // Byter plats på elementen
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }

            return $array;
        }


        /* 


               1. Använd isset()-metoden för att kolla om formuläret har skickats. Om det har skickats: 
               2. Hämta värdet som finns i input-fältet med namnet num_cars
               3. Skapa en tom vektor med namnet resultat.  
               4. Skapa en for-loop som itererar lika många gånger som värdet på num_cars. I loopen:
                   a. Skapa variabeln bilNamn och tilldela den bilar från vektorn bilar
                   b. Slumpa fram ett tal mellan 55 och 280 och spara det i variabeln fart.
                   c. Lägg till bilens namn och fart i resultat-vektorn med metoden array_push()
               5. Sortera resultat vektorn efter fart genom att kalla på metoden bubbleSortByFart().
               6. Skapa en <h2> rubrik och lägg till text om vilken bil som vann. Skapa även en <h3> rubrik där det ska stå "Resultat:".
               7. Skapa en foreach-loop som itererar över varje element i $resultat-vektorn. I loopen:
                   a. Öppna upp en <div>-tagg och lägg på margin-bottom: 10px
                   b. Skriv ut placering, bilens namn och vilken hastighet den hade. Om en av bilarna var snabbast lägg till en trofé-emoji 🏆 för den.
               8. Stäng <div>-elementet.        

              ** Extrauppgift **
                Om du är klar tidigare, kan du försöka blanda ihop PHP med HTML. 
                - Varje gång användaren trycker på submit-knappen ska input-fältet (num_cars) ha det värde som användaren valde.
                - Alltså om användaren väljer 3 bilar ska det värde stå kvar i input-fältet när sidan laddas om.           


           */




        ?>

    </main>

</body>

</html>