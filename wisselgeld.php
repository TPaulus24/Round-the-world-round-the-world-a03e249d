<?php
$input = $argv[1];
//Afronden op 5 centen
$key = round($input / 0.05) * 0.05;
$Bedrag = number_format($key, 2);
$Bedrag *= 100;
// Geld eenheden (Brieven & Munten)
$eenheden = [   500, 
                200, 
                100, 
                50, 
                20, 
                10, 
                5, 
                2, 
                1, 
                0.50,
                0.20, 
                0.10, 
                0.05];
function bereken($Bedrag, $eenheden)
{
    $Eenheid = $Bedrag / $eenheden;
    $rest = $Bedrag % $eenheden;
    $eindBedrag = floor($Eenheid);
    return array($eindBedrag, $rest);
}
for ($i = 0; $i < count($eenheden); $i++) {
    $eenheden[$i] *= 100;
    $uitkomst = bereken($Bedrag, $eenheden[$i]);
    $Bedrag = $uitkomst[1];
    if ($uitkomst[0] > 0) {
        if ($eenheden[$i] < 100) {
            echo $uitkomst[0] . " x " . $eenheden[$i] . " cent" . PHP_EOL;
        } else {
            $eenheden[$i] /= 100;
            echo $uitkomst[0] . " x " . $eenheden[$i] . " euro" . PHP_EOL;
        }
    }
}
?>