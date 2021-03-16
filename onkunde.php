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
                    <h2>Onkunde</h2>
                    <?php 
                        if($submit == false){
                    ?>
                    <form action="<?php echo htmlspecialchars($_SELF["PHP_SELF"]) ?>" method="POST">
                            <ul>
                                <li>
                                    <div>
                                        <span>Wat zou je graag willen kunnen?</span>
                                        <span class="n"><?php echo $error["kunnen"]; ?></span>
                                    </div>
                                    <input type="text" name="kunnen" value='<?php echo $array["kunnen"] ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Met welke persoon kun je goed opschieten?</span>
                                        <span class="n"><?php echo $error["persoon"]; ?></span>
                                    </div>
                                    <input type="text" name="persoon" value="<?php echo $array["persoon"]; ?>">
                                </li>
                                <li>
                                    <div>
                                        <span>Wat is je favoriete getal?</span>
                                        <span class="n"><?php echo $error["getal"]; ?></span>
                                    </div>
                                    <input type="text" name="getal" value='<?php echo $array["getal"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wat heb je altijd bij als je op vakantie gaat?</span>
                                        <span class="n"><?php echo $error["vakantie"]; ?></span>
                                    </div>
                                    <input type="text" name="vakantie" value="<?php $array["vakantie"]; ?>">
                                </li>
                                <li>
                                    <div>
                                        <span>Wat is je beste persoonlijke eigenschap?</span>
                                        <span class="n"><?php echo $error["besteEigenschap"]; ?></span>
                                    </div>
                                    <input type="text" name="besteEigenschap" value='<?php echo $array["besteEigenschap"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wat is je beste persoonlijke eigenschap?</span>
                                        <span class="n"><?php echo $error["slechtsteEigenschap"]; ?></span>
                                    </div>
                                    <input type="text" name="slechtsteEigenschap" value='<?php echo $array["slechtsteEigenschap"]; ?>'>
                                </li>
                                <li>
                                    <div>
                                        <span>Wat is het ergste dat je kan overkomen?</span>
                                        <span class="n"><?php echo $error["ergste"]; ?></span>
                                    </div>
                                    <input type="text" name="ergste" value='<?php echo $array["ergste"]; ?>'>
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
                            Er zijn veel mensen die niet kunnen <?php echo $array["kunnen"]; ?>. Neem nou <?php echo $array["persoon"]; ?>. Zelfs met de hulp van een <?php echo $array["vakantie"]; ?> of zelf <?php echo $array["getal"]; ?> kan <?php echo $array["persoon"]; ?> niet <?php echo $array["kunnen"]; ?>. Dat heeft niets te maken met een gebrek aan <?php echo $array["besteEigenschap"]; ?>, maar een te veel aan <?php echo $array["slechtsteEigenschap"]; ?>. Te veel <?php echo $array["slechtsteEigenschap"]; ?> leidt tot <?php echo $array["ergste"]; ?> en dat is niet goed als je wilt <?php echo $array["kunnen"]; ?>. Helaas voor <?php echo $array["persoon"]; ?>.
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