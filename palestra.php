<?php
// Recupero dati dal form
$nome = $_POST['nome'];
$eta = (int)$_POST['eta'];
$pagamento = $_POST['pagamento'];

// Prezzo base in base all'età
if ($eta < 18 || $eta > 64) {
    $prezzoMensile = 35;
} else {
    $prezzoMensile = 45;
}

// Prezzo annuale senza sconto
$prezzoAnnuale = $prezzoMensile * 12;

// Applico sconto in base alla frequenza
$sconto = 0;

switch ($pagamento) {
    case "mensile":
        $sconto = 0;
        break;
    case "bimestrale":
        $sconto = 10;
        break;
    case "trimestrale":
        $sconto = 15;
        break;
    case "annuale":
        $sconto = 20;
        break;
}

$prezzoFinale = $prezzoAnnuale - ($prezzoAnnuale * $sconto / 100);

echo "<h2>Dati inseriti</h2>";
echo "Nome: $nome <br>";
echo "Età: $eta <br>";
echo "Pagamento: $pagamento <br><br>";

echo "<h2>Prezzo Finale</h2>";
echo "Il prezzo per un anno è di " . $prezzoFinale . "€.";
?>
