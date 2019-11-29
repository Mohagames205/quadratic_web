<?php


if(isset($_POST["vergelijking"])){
    $xkwadraat = $_POST["xkwadraat"];
    $x = $_POST["x"];
    $getal = $_POST["getal"];

    if(is_numeric($xkwadraat) && is_numeric($x) && is_numeric($getal)){
        $discriminant = pow($x, 2) - 4 * $xkwadraat * $getal;

        if(abs($discriminant) != $discriminant){
            $error = "De vergelijking is niet oplosbaar! De discriminant is negatief.";
        }

        $discriminant_squared = sqrt($discriminant);
        $first = (-$x + $discriminant_squared)/(2 * $xkwadraat); 
        $second = (-$x - $discriminant_squared)/(2 * $xkwadraat); 
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
        <h1> Los nu jouw 2de graads vergelijking op! </h1>
    </div>
<div class="content">
<form method="POST">
    <input type="text" name="xkwadraat" required>x²
    <input type="text" name="x" required>x
    <input type="text" name="getal" required><br>
    <button type="submit" name="vergelijking"> Los op! </button>

</form>

<?php

if(isset($answer)){
    echo "<br><hr>";
    echo "<p><b>Discriminant: </b>" . $discriminant . "<br><b>Vierkantswortel van de Discriminant: </b>" . $discriminant_squared . "</p>";
    echo "<p><b>Eerste oplossing: </b>" . $answer[0] . "<br><b>Tweede oplossing: </b>" . $answer[1] . "</p>";
}
if(isset($error)){
    echo "<p><b>Foutmelding: </b>$error</p>";
}

?>
</div>
</body> 