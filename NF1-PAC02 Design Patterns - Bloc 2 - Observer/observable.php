<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $names;
  private $budgets;
  private $countries;
  private $motorsports;

  function __construct() {
         $this->names = array();
         $this->budgets = array();
         $this->countries = array();
         $this->motorsports = array();
  }

  public function addRecord($name, $budget, $country, $motorsport) {
         array_push($this->names, $name);
         array_push($this->budgets, $budget);
         array_push($this->countries, $country);
         array_push($this->motorsports, $motorsport);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->budgets, $this->countries, $this->motorsports);
  }
}
?>
