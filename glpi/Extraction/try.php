<?php
// Récupération de la valeur depuis l'URL (paramètre GET)
$valeur = $_GET['valeur'] ?? '';

// Affichage de la valeur dans le journal des logs
error_log('La valeur est : ' . $valeur);

// Affichage de la valeur à l'écran
echo 'La valeur est : ' . $valeur;
?>
