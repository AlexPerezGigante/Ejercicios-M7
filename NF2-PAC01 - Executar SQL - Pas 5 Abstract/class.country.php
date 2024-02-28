<?php

class Country extends DataBoundObject {

        protected $Country;

        protected $LastUpdate;


        protected function DefineTableName() {
                return("country");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "country" => "Country",
                        "last_update" => "LastUpdate"
                ));
        }
}

?>
