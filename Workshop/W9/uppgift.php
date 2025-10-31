<?php

/* 1. "Spara som" och döp filen till uppgift.php
   2. Skapa DB med namn F9, tabell med namn tbllkund, id, personnummer, epost och losen. 
*/

    function dbConnect() {
        try {
            $dns = "mysql:dbname=F9;host=localhost";
            $user = "root";
            $password = "";
            $options = array( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db = new PDO($dns, $user, $password, $options);
            return $db;
        } catch( PDOException $e ) {
            throw $e;
        }
    }

?>  
<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8">
        <title>PHP F9 - Kryptering</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style> 
            * {
                box-sizing: border-box;
            }
            img {
                width: 15%;
                height: 15%;
                padding-right: 5px;
                padding-bottom: 10px;
            }
            main {
                width: 25%;
                min-width:400px;
                max-width:100%;
                border: solid 1px gray;
                padding: 15px;
                margin: 0 auto;

            }

            input {
                margin: 5px;
                width: 100%;
            }
        </style>
    </head>

    <body class="container p-2">
        <header class="jumbotron text-center">
            <h1>Skapa användare</h1>
        </header>

        <main>    

        <?php
            if( isset( $_POST["skicka"] ) ) {

                //Vettig validering... lämnas till workshop
                // 0.) Kontrollera epost
                // 1.) Kontrollera dublett av epost i databas      
                // 2.) Kontrollera antal tecken + siffra + specialtecken i lösenord
                // 3.) Kontrollera samma i båda rutor
        
                /*
                $password = "Mitt123Lösen!@";

                // Kontrollera totalt antal tecken
                $antalTecken = strlen($password);

                // Kontrollera antal siffror
                preg_match_all('/[0-9]/', $password, $matches);
                $antalSiffror = count($matches[0]);

                // Kontrollera antal specialtecken
                preg_match_all('/[^a-zA-Z0-9åäöÅÄÖ]/', $password, $matches);
                $antalSpecialtecken = count($matches[0]);

                // Visa resultat
                echo "Totalt antal tecken: " . $antalTecken . "\n";
                echo "Antal siffror: " . $antalSiffror . "\n";
                echo "Antal specialtecken: " . $antalSpecialtecken . "\n";

                */

		
                //Koppla upp och spara till databas
                try {

                    if(!filter_var($_POST['epost'], FILTER_VALIDATE_EMAIL)) {
                        throw new Exception("Ogiltig epost");
                    }

                    $dbh = dbConnect();

                    $sql = "SELECT * FROM tblkund WHERE epost=:epost";

                    $stmt=$dbh->prepare($sql);
                    $stmt->bindValue(":epost", $_POST["epost"]);
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if(count($data)>0) {
                        throw new Exception("Diun adress finns redan i DB");
                    }

                    //Kontrollera personnummer
                    $persnr = $_POST["persnr"];
                    if(strlen($persnr)!=13) {
                        //Kasta fel
                    }

                    //Kolla sista 4 tecken
                    $persnr_sista = substr($persnr,-4);
                    if(!is_numeric($persnr_sista)) {
                        //Kasta fel
                    }









                    //$dbh =  dbConnect();

                    $sql = "INSERT INTO tblkund(personnummer, epost, losen) VALUES(:personnummer, :epost, :losen);";

                    $losen = $_POST["losen1"];
                    $hashat_losen = hash("SHA256", $losen);

                    $persnr = $_POST["persnr"];
                    $nyckel = "valfristrang1234";

                    $krypterat_persnr = openssl_encrypt($persnr, "AES-128-ECB", $nyckel);


                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(":personnummer", $krypterat_persnr);
                    $stmt->bindValue(":epost", $_POST["epost"]);
                    $stmt->bindValue(":losen", $hashat_losen);

                    $stmt->execute();
                    session_start();
                    $_SESSION["id"] = $dbh->lastInsertId();
                    $_SESSION["inloggad"] = "mört";
                 
                }
                catch(Exception $ex) {
                   echo($ex->getMessage());
                }
                finally{
                    $stmt = null;
                    $dbh = null;
                    $data = null;

                }

        
            }
            
            //kontrollera om inloggad
            if(isset($_SESSION["inloggad"])) {
                //Är inloggad visa "hemlig sida"
                ?>
                    <h1>Grattis, du får visa hemliga sidan!</h1>

                <?php
            }
            else {
                //Inte inloggad visa registering
                ?>
                    <form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="epost">Ange epost</label><br>
                            <input type="email" id="epost" name="epost" required>
                        </div>
						<div class="form-group">
                            <label for="epost">Ange personnummer (YYYYMMDD-XXXX)</label><br>
                            <input type="text" id="persnr" name="persnr" required>
                        </div>
                        <div class="form-group">
                            <label for="losen1">Välj lösenord (upprepa två gånger)</label><br>
                            <input type="password" id="losen1" name="losen1" required><br>
                            <input type="password" id="losen2" name="losen2" required>
                        </div>
                        <input type="submit" name="skicka" value="Skicka" class="btn btn-danger" />                  
                    </form>

                <?php
            }
            


        ?>
            


        </main>

    </body>

</html>