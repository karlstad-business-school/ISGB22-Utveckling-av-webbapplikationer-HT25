<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo("Hej index.php");
        echo("<p class='test-name'> Alexander </p>");
        echo("<p class=\"test-name\"> Alexander </p>");
        echo('<p class="test-name"> Alexander </p>');

        define("LANGUAGE", "PHP");
        echo(LANGUAGE);

        $number = 12345;
        settype($number, "string");
        if($number === "12345"){
            echo("<p>Number är en sträng och har värdet 12345</p>");
        }

        if(is_numeric($number)){
            echo("<p>Number är nu en nummer</p>");
        }

        for($i = 1; $i < 7; $i++){
            //echo("<h" . $i . ">Heading</h" . $i . ">");
            echo("<h$i>Heading</h$i>");
        }

        echo("<br>");
        echo("<br>");
        echo("<br>");
        echo("<br>");
        echo("<br>");
        echo("<br>");
        $arr = array(1, 2, 3, 4, 5);

        echo("<pre>");
        print_r($arr);
        echo("</pre>");

        for($i = 0; $i < count($arr); $i++){
            $aCoolNumber = $arr[$i];
            echo("<p>$aCoolNumber</p>");
        }

        foreach($arr as $aCoolNumber){
            echo("<p>$aCoolNumber</p>");
        }

        $arr = array();
        for($i = 0; $i < 10; $i++){
            $r = rand(0, 10);
            array_push($arr, $r);
        }

        echo("<pre>");
        print_r($arr);
        echo("</pre>");

    ?>

    <form method="post">
        <input type="text" name="theCoolestUsername"/>
        <input type="password" name="password"/>

        <input type="submit" name="aCoolLoginBtn" value="Login"/>
    </form>


    <?php
        //http://localhost:8080/ISGB22-HT25/F6Startkod/?theCoolestUsername=abc&password=123&aCoolLoginBtn=Login
        
        if(isset($_POST["aCoolLoginBtn"])){
             $u = $_POST['theCoolestUsername'];
             $p = $_POST['password'];
             if($u == "admin" && $p == "123"){
                echo("Du är inloggad!");
                echo("<p>Length på användarnamnet är: " . strlen($u) . " tecken!</p>");
             }else{
                echo("Fel användarnamn eller lösenord");
             }
           
        }
       
    ?>
</body>
</html>