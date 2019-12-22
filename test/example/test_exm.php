<?php 
require __DIR__ . '/../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);
$printer = new Printer($connector);

$printer -> text("Hello World!\n");
$printer -> cut();

$printer -> close();
echo 'tesing';
?>