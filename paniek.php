<?php 
    $array=[];
    $error=[];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nonEmpty=0;
        foreach($_POST as $name => $y){
            if($name != "submit"){
                if(!empty($y)){
                    $array[$name] = checkInput($y);
                    $nonEmpty++;
                }else{
                    $error[$name] = "vul hier iets in";
                }
            }
            if($nonEmpty == 7){
                $submit = true;
            }
        }
    }else{
        $submit = false;
    }

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE HTML>
<html lang="EN">
    <head>
        <meta charset="UTF-8">
        <title>B3W2O1</title>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
    </head>
        <body>
            <div id="container">
                <header>
                    <h1>Mad Libs</h1>
                </header>

                <nav>
                    <ul>
                        <li><a href="paniek.php">Er heerst paniek...</a></li>
                        <li><a href="onkunde.php">Onkunde</a></li>
                    </ul>
                </nav>            
                <div id="containerWhite">
                    <h2>Er heerst paniek...</h2>
                    <?php 
                        if($submit == false){
                    ?>
                    <form action="<?php echo htmlspecialchars($_SELF["PHP_SELF"]) ?>" method="POST">
                            <ul>
                                <li>
                                    <div>
                                        <span>Welk dier zou je nooit als huisdier willen hebben?</span>
                                        <span class="n"><?php echo $error["huisdier"]; ?></span>
                                    </div>
                                    <input type="text" name="huisdier" value='<?php echo $array["huisdier"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wie is de belangrijkste persoon in je leven?</span>
                                        <span class="n"><?php echo $error["persoon"]; ?></span>
                                    </div>
                                    <input type="text" name="persoon" value='<?php echo $array["persoon"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>In welk land zou je graag willen wonen?</span>
                                        <span class="n"><?php echo $error["land"]; ?></span>
                                    </div>
                                    <input type="text" name="land" value='<?php echo $array["land"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wat doe je als je je verveelt?</span>
                                        <span class="n"><?php echo $error["verveelt"]; ?></span>
                                    </div>
                                    <input type="text" name="verveelt" value='<?php $array["verveelt"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Met welk speelgoed speelde je als kind het meest mee?</span>
                                        <span class="n"><?php echo $error["speelgoed"]; ?></span>
                                    </div>
                                    <input type="text" name="speelgoed" value='<?php echo $array["speelgoed"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Bij welk docent spijbel je het liefst?</span>
                                        <span class="n"><?php echo $error["docent"]; ?></span>
                                    </div>
                                    <input type="text" name="docent" value='<?php echo $array["docent"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Als je $100.000,- had, wat zou je dan kopen?</span>
                                        <span class="n"><?php echo $error["kopen"]; ?></span>
                                    </div>
                                    <input type="text" name="kopen" value='<?php echo $array["kopen"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wat is je favoriete bezigheid?</span>
                                        <span class="n"><?php echo $error["bezigheid"]; ?></span>
                                    </div>
                                    <input type="text" name="bezigheid" value='<?php echo $array["bezigheid"]; ?>'>
                                </li>
                                <li>
                                    <input type="submit" name="submit" id="submit" value="submit">
                                </li>
                            </ul>
                    </form>
                    <?php 
                        }else{
                    ?>
                    <section id="text">
                            <p>
                            Er heerst paniek in het koninkrijk <?php echo $array["land"]; ?>. Koning <?php echo $array["docent"]; ?> is ten einde raad en 
                            als koning <?php echo $array["docent"]; ?> ten einde raad is, dan roept hij zijn ten-einde-raadsheer <?php echo $array["persoon"]; ?>.</p>
                            <p>
                                "<?php echo $array["persoon"]; ?>, het is een ramp! Het is een schande!"
                            </p>
                            <p>
                                "Sire, Majesteit, Uwe luidruchtigheid, wat is er aan de hand?"
                            </p>
                            <p>
                                "Mijn <?php echo $array["huisdier"]; ?> is verdwenen! Zo maar, zonder waarschuwing. En ik had net <?php echo $array["speelgoed"]; ?>
                                voor hem gekocht!"
                            </p>                            
                            <p>
                                "Majesteit, uw <?php echo $array["huisdier"]; ?> komt vast vanzelf weer terug?"
                            </p>
                            <p>
                                "Ja, da's leuk en aardig, maar hoe moet ik in de tussentijd <?php echo $array["bezigheid"]; ?> leren?"
                            </p>
                            <p>
                                "Maar sire, daar kunt u toch uw <?php echo $array["kopen"]; ?> voor gebruiken."
                            </p>
                            <p>
                                "<?php echo $array["persoon"]; ?>, je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had."
                            </p>
                            <p>
                                "<?php echo $array["verveelt"]; ?>, Sire."
                            </p>
                    </section>
                    <?php
                        }
                    ?>
                </div>
                <footer>© Dylano Brouwer, 2021</footer>
            </div>
        </body>
</html>