<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Workshop: Bilracet</title>


</head>

<body>

    <main>
        <!--
            HTML
            1. Skapa ett HTML-formulär med metoden POST.
            2: Lägg till en <input> för att skriva in hur många bilar som ska tävla.
            3. Lägg till knapp för att skicka formuläret.
        -->

        <form method="post">
            <label for="num_cars">Hur många bilar ska tävla? (2-6)</label><br>
            <input type="number" id="num_cars" name="num_cars" min="2" max="6" required <?php if (isset($_POST['num_cars'])) {echo 'value="' . $_POST['num_cars'] . '"';} ?> /> 
            <input type="submit" name="start" value="Starta racet" />
        </form>

        <?php

        /* 
            PHP
            1. Använd isset()-metoden för att kolla om formuläret har skickats. Om det har skickats:
            2. Hämta värdet som finns i input-fältet med namnet num_cars
            3. Skapa en tom vektor med namnet resultat.  
            4. Skapa en for-loop som itererar lika många gånger som värdet på num_cars. I loopen:
                a. Skapa variabeln bilNamn och tilldela den varje bil från vektorn bilar
                b. Ska du slumpa fram ett tal mellan 55 och 280 och spara det i variabeln fart.
                 c. Lägg till bilens namn och fart i resultat-vektorn med metoden array_push()
               5. Sortera resultat vektorn efter fart genom att kalla på metoden bubbleSortByFart().
               6. Skapa en <h2> rubrik och lägg till text om vilken bil som vann. Skapa även en <h3> rubrik där det ska stå "Resultat:".
               7. Skapa en foreach-loop som itererar över varje element i $resultat-vektorn. I loopen:
                   a. Öppna upp en <div>-tagg för varje bil och lägg på margin-bottom: 10px
                   b. Skriv ut placering, bilens namn och vilken hastighet den hade. Om en av bilarna var snabbast lägg till en trofé-emoji 🏆 för den.
               8. Stäng <div>-elementet.        

              ** Extrauppgift **
                Om du är klar tidigare, kan du försöka blanda ihop PHP med HTML. 
                - Varje gång användaren trycker på submit-knappen ska input-fältet (num_cars) ha det värde som användaren valde.
                - Alltså om användaren väljer 3 bilar ska det värde stå kvar i input-fältet när sidan laddas om.           
        */

        //Vektor som innehåller de bilar som ska delta i racet.
        $bilar = ["Volvo", "BMW", "Tesla", "Kia", "Ford", "Toyota"];


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

        
        //Kollar om användaren har skickat formuläret (POST-metod)
        if (isset($_POST["start"])) {

            //Hämtar värdet från inputfältet "num_cars" som användaren skickade via POST
            $num_cars = $_POST["num_cars"];
            
            $resultat = []; // Samma som $resultat = array(); 

            //Loopen startar på 0 och körs så länge $i är mindre än antalet bilar ($num_cars)
            for ($i = 0; $i < $num_cars; $i++) {

                $bilNamn = $bilar[$i];

                //Slumpar fram hastighet för bilen (integer mellan 55 och 280)
                $fart = rand(55, 280);

                //Lägger till (pushar) en associativ array/objekt in i arrayen $resultat
                //Associativ array/objektet innehåller två värden: bilens namn och bilens slumpade hastighet. Nycklarna är "bil" och "fart", värdena bilNamn och fart.
                array_push($resultat, [
                    "bil" => $bilNamn,
                    "fart" => $fart
                ]);

            //$resultat blir  en matris, alltså en lista med flera små arrayer.
            //Varje "inre" array är en associativ array likt objekt i javascript. 

            }

            //Skickar in $resultat som sorteras från högst till lägst, tar sedan emot den uppdaterade listan och lägger in det i $resultat. 
            $resultat = bubbleSortByFart($resultat);

            //felsökning
            /*
            echo "<pre>";
            print_r($resultat);
            echo "</pre>";
            */

            // Visa vinnaren (första bilen efter sortering). Går till första platsen i matrisen och hämtar värdet för nyckeln "bil", samma med fart t.ex: Index 0 -> ["bil" => "Volvo", "fart" => 120].
            echo "<h2>Vinnare: Snabbaste bilen var " . $resultat[0]['bil'] . " med " . $resultat[0]['fart'] . " km/h!</h2>";
            echo "<h3>Resultat:</h3>";

            //Loopen går igenom varje element i $resultat, $placering är indexet i arrayen (0, 1, 2 …). $value är själva värdet på elementet, dvs den associativa arrayen med nycklarna "bil" och "fart"
            foreach ($resultat as $placering => $value) {
                echo "<div style='margin-bottom:10px;'> <p><strong>" . $placering + 1 . ". " . $value['bil'] . "</strong> - " . $value['fart'] . " km/h ";
                // Lägg till trofé-emoji för vinnaren (första bilen)
                if ($placering === 0) {
                    echo " 🏆";
                }

                echo "</p></div>";
            }

        }

        ?>



    </main>

</body>

</html>