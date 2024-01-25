<?php
require_once("observable.php");
require_once("abstract_widget.php");

$dat = new DataSource();
$widgetA = new BasicWidget();
$widgetB = new FancyWidget();

$dat->addObserver($widgetA);
$dat->addObserver($widgetB);

$dat->addRecord("Fernando Alonso", 50, "Spain", "Formula 1");
$dat->addRecord("Valentino Rossi", 35, "Italy", "MotoGP");
$dat->addRecord("Danica Patrick", 12, "USA", "Auto Racing");
$dat->addRecord("Sebastien Ogier", 10, "France", "Rally");
$dat->addRecord("Sebastie gier", 50, "Frace", "Raly");


$widgetA->draw();
$widgetB->draw();
?>
