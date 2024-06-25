<?php

// Inclure les fichiers nécessaires
require_once  'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;


// Créer un objet PhpSpreadsheet
$spreadsheet = new Spreadsheet();

/// Obtenir la feuille de calcul active
$sheet = $spreadsheet->setActiveSheetIndex(0);

// Définir le titre de la feuille de calcul
$sheet->setTitle('Feuille de calcul basic');

// Définir les en-têtes de colonne
$sheet->setCellValue('A1', utf8_encode('id'));
$sheet->setCellValue('B1', 'Prénom');
$sheet->setCellValue('C1', 'Age');

// Définir des données de test
$sheet->setCellValue('A2', 'Alice');
$sheet->setCellValue('B2', 'Dupont');
$sheet->setCellValue('C2', 30);

// Formater l'en-tête en gras
$sheet->getStyle('A1:C1')->getFont()->setBold(true);

// Enregistrer le fichier Excel
$writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$filename = 'exemple_basic.xlsx';
$writer->save($filename);

// Télécharger le fichier
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filename));
readfile($filename);

?>
