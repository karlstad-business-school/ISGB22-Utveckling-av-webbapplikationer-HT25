<?php

    $antal = 0;
    $summa = 0;
    $stringToEcho = "";

    if( isset( $_POST["skicka"] ) ) {

        if(isset($_COOKIE["antal"])){
         $antal = $_COOKIE["antal"];
        }

        if(isset($_COOKIE["summa"])){
         $summa = $_COOKIE["summa"];
        }

        //
        define("IMG", "<img src='http://localhost:3000/server/ISGB22-Utveckling-av-webbapplikationer-HT25/Foreläsningar/F8/slutkod/bilder/");
            for($i=1; $i<=6;$i++){
            $slumptal = rand(1,6);
            $stringToEcho = $stringToEcho . IMG . $slumptal . ".png' alt='" . $slumptal . "' />";
            $summa = $summa + $slumptal;
        }

        $antal = $antal + 1;
        setcookie("summa", $summa, time() + 3600);
        setcookie("antal", $antal, time() + 3600);

        if($summa >= 100) {
            $stringToEcho = $stringToEcho . "<h2>Grattis! Du nådde 100 på " . $antal . " omgångar!</h2>";
        } else {
            $stringToEcho = $stringToEcho . "<h2>Din summa är " . $summa . " efter " . $antal . " omgångar.</h2>";
        }

    }
    
  
    if(isset($_POST["rensa"])) {
    
    }
?>  
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F8 - kakor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style> 
            img {
                width: 15%;
                height: 15%;
                padding-right: 5px;
                padding-bottom: 10px;
            }
        </style>
    </head>

    <body class="container p-2">
        <header class="jumbotron text-center">
            <h1>PHP F8 - Räkna antalet klick på knappen "Skicka"!</h1>
        </header>

        <main>    

            <?php echo($stringToEcho); ?>

            <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="submit" name="skicka" value="Skicka" />
                <input type="submit" name="rensa" value="Rensa" />
            </form>

        </main>

    </body>

</html>