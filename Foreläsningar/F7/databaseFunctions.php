<?php

    /*
        GRANT ALL ON bilar.* To 'bilanv'@'localhost' IDENTIFIED BY 'bilpass';
        FLUSH PRIVILEGES;

    */

    function debugPrintRequest() {}
    function debugPrintSelectFromDatabase($inResultFromSelect) {}
    function connectToDatabase() {}
    function listCarsAsForms($dbh) {

        /*
            Tänk på att metoden är $_POST[]!
            <div style='background-color: #8000ff'>
                <form action='bilar.php' method='post'>
            
                    <p>Fabrikat: Audi</p>
                    <p>Modell: A8</p>
                    <input type='hidden' name='hidId' value='4'>
                    <input type='submit' name='btnEdit' value='Edit'>
                    <input type='submit' name='btnDelete' value='Delete'>

                </form>
            </div>
        */

    }
    function listCarsAsLinks($dbh) {
        /*
            Tänk på att metoden är $_GET[]!
             <div style='background-color: #8000ff'>
                
                <p>Fabrikat: Audi</p>
                <p>Modell: A8</p>
                <a href='bilar.php?edit=true&value=4'>Edit</a>
                <a href='bilar.php?delete=true&value=4'>Edit</a>

            </div>
        */
    }
    function deleteCar($dbh, $id) {}
    function updateCar($dbh, $id, $fabrikat, $modell, $regnr, $farg, $mil) {}    
    function insertCar($dbh, $fabrikat, $modell, $regnr, $farg, $mil) {}
    function selectCar($dbh, $id) {}

    function createForm($row = null) {

        $id ="";
        $fabrikat = "";
        $modell = "";
        $regnr = "";
        $mil = "";
        $farg = "#00ff00";

        if($row !== null) {
            $id = $row["id"];
            $fabrikat = $row["fabrikat"];
            $modell = $row["modell"];
            $regnr = $row["regnr"];
            $mil = $row["mil"];
            $farg = $row["farg"];
        }

        echo("<div><form action='" . $_SERVER["PHP_SELF"]  . "' method='post'>" . PHP_EOL);
        
        if($row !== null) {
            ?>
            <input type='hidden' name='hidId' value='<?php echo($id); ?>'>
            <span style='padding-right: 10px; border: 1px solid black;'>Id: <?php echo($id); ?></span>
            <?php
        }
        
        ?>
        <input type='text' name='txtFabrikat' value='<?php echo($fabrikat); ?>' placeholder='Fabrikat'>
        <input type='text' name='txtModell' value='<?php echo($modell) ?>' placeholder='Modell'>
        <input type='text' name='txtRegnr' value='<?php echo($regnr) ?>' placeholder='Regnr'>
        <input type='number' name='nbrMil' value='<?php echo($mil) ?>' min='0' placeholder='Mil'>
        <input type='color' name='nbrFarg' value='<?php echo($farg) ?>'>
        <input type='submit' name='btnSave' value='Save'>
        <input type='submit' name='btnRensa' value='Reset'>

        </form></div>
        <?php

    }

