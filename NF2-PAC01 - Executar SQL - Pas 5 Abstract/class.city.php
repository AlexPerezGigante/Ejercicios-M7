<?php

class City extends DataBoundObject {

        protected $City;
        protected $CountryId;
        protected $LastUpdate;



        protected function DefineTableName() {
                return("city");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "city" => "City",
                        "country_id" => "CountryId",
                        "last_update" => "LastUpdate"
                ));
        }
}

?>
