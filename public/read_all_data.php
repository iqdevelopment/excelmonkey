<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


/******
 * 
 * Načtení všech dat ze excelu s tím, že $SheetName = název listu
 * z foreach $sheetData -> key = číslo řádku a value je array s hodnotami ve tvaru  array('A' => 33)
 * 
 *********/


$inputFileName = 'teamy_control.xlsx';
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
$sheetCount = $spreadsheet->getSheetCount();
$all = $spreadsheet->getSheetNames();
for ($i=0; $i < $sheetCount; $i++) { 
    $sheetData = $spreadsheet->getSheet($i)->toArray(null, true, true, true);
    $SheetName= $spreadsheet->getSheetNames()[$i];
    echo 'Sheet: '.$SheetName.'<br>';
        foreach ($sheetData as $key => $value) {
            echo 'řádek: '.$key; 
            print_r($value);
            echo '<br>';
        }
}
