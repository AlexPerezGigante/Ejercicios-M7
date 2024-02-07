<?php
class EmailAddress
{ 
    private $id;

    public function __construct($id) {
        $this->setId($id);
       
    }
    public function setId($setId){
        $this->id = $setId;
    }
    public function getId(){
        $html = "Id EmailAddress: " . $this->id . "</br>";
        return $html;
    }
}