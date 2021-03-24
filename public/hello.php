<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


//echo shell_exec('dir');
/*
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$reader->setReadFilter( new MyReadFilter() );
$spreadsheet = $reader->load("teamy_control.xlsx");

//hodnota z prvni buňky
$counter = 0;
//echo $var.'<br>';
for ($i='A'; $i < 'Z'; $i++) {
    $num =  $i.'1';
    //echo $i;
    $cell = $spreadsheet->getActiveSheet()->getCell($i.'1');
  //  print_r($cell);
  if($cell == ''){
      echo 'empty<br>';
  }else{
    echo $cell.'<br>';
} 
    
    $counter++;
}*/


$inputFileName = 'teamy_control.xlsx';
//$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
$sheetCount = $spreadsheet->getSheetCount();
$all = $spreadsheet->getSheetNames();
for ($i=0; $i < $sheetCount; $i++) { 
    $sheetData = $spreadsheet->getSheet($i)->toArray(null, true, true, true);
    $name= $spreadsheet->getSheetNames()[$i];
    echo 'Sheet: '.$name.'<br>';
        foreach ($sheetData as $key => $value) {
            echo 'řádek: '.$key; 
            print_r($value);
            echo '<br>';
        }
}
/*$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//print_r($sheetCount = $spreadsheet->getSheet());
foreach ($sheetData as $key => $value) {
    echo 'řádek: '.$key; 
    print_r($value);
     echo '<br>';
}

*/


/*
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');*/