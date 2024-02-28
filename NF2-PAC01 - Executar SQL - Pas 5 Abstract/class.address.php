<?php

class Address extends DataBoundObject {

        protected $Address;
        protected $Address2;
        protected $District;
        protected $CityId;
        protected $PostalCode;

        protected $Phone;
        protected $LastUpdate;


        protected function DefineTableName() {
                return("address");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "address" => "Address",
                        "address2" => "Address2",
                        "district" => "District",
                        "city_id" => "CityId",
                        "postal_code" => "PostalCode",
                        "phone" => "Phone",
                        "last_update" => "LastUpdate"
                ));
        }
}

?>
