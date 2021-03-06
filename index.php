<?php


if(isset($_POST["vergelijking"])){
    $xkwadraat = htmlspecialchars($_POST["xkwadraat"]);
    $x = htmlspecialchars($_POST["x"]);
    $getal = htmlspecialchars($_POST["getal"]);

    if(is_numeric($xkwadraat) && is_numeric($x) && is_numeric($getal)){
        $discriminant = pow($x, 2) - 4 * $xkwadraat * $getal;

        if(abs($discriminant) != $discriminant){
            $error = "De vergelijking is niet oplosbaar! De discriminant is negatief.";
        }

        $discriminant_sqrt = sqrt($discriminant);
        $first = (-$x + $discriminant_sqrt)/(2 * $xkwadraat);
        if($discriminant !== 0){
            $second = (-$x - $discriminant_sqrt)/(2 * $xkwadraat);  
        }
        else{
            $second = "/";
        }
        
        
        $answer = [$first, $second];
    
    }


}

?>

<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Vergelijking oplosser! </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="heading">
        <h1> Quadratic Solver </h1>
    </div>
<div class="materialbox">
<h2> Typ de vergelijking in </h2>
<form method="POST">
    
    <input type="text" name="xkwadraat" required>x²
    <input type="text" name="x" required>x
    <input type="text" name="getal" required><br>
    <button type="submit" name="vergelijking"> Los op! </button>

</form>
</div>

<?php

if(isset($answer)){
    echo "
    
    <div class='materialbox'>
    <h2>Gegevens</h2>
    <p>a = $xkwadraat, b = $x, c = $getal</p>
    </div>
    
    <div class=\"materialbox\">
    
    <h2> Stap 1: Discriminant berekenen </h2>
    <p><b>D = b² - 4 <small>x</small> a <small>x</small> c</b></p>
    <p><b>D = </b><i>" . $x . "² - 4 <small>x</small> $xkwadraat <small>x</small> $getal</i></p>
    <p><b>D = </b><i>" . pow($x, 2).  " - " . 4 * $xkwadraat * $getal . " <b>=</b> $discriminant</i></p>
    <p><b>√D = $discriminant_sqrt</b></p>
    </div>
    
    <div class='materialbox'>
    <h2> Stap 2: formule invullen</h2>
    
    <p><b>x1, x2 = (-b ± √D)/2a</b></p> 
    <p><b>x1, x2</b> = <i>(" . -$x ." ± $discriminant_sqrt)/ " . 2 * $xkwadraat . "</i></p>
    
    </div>
";
    echo "<div class=\"materialbox\">";
    echo "<h2> Oplossing </h2>";
    echo "<p><b>Discriminant: </b>" . $discriminant . "<br><b>Vierkantswortel van de Discriminant: </b>" . $discriminant_sqrt . "</p>";
    echo "<p><b>Eerste oplossing: </b>" . $answer[0] . "<br><b>Tweede oplossing: </b>" . $answer[1] . "</p>";

    if(!isset($error)){
        echo "</div>";
    }
}
if(isset($error)){
    echo "<p><b>Foutmelding: </b>$error</p>";
    echo "</div>";
}

?>
</div>

</body> 
