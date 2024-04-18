<?php

require("abstract.databoundobject.php");

class Epic extends DataBoundObject {

        protected $Identifier;
        protected $Caption;
        protected $Date;
        protected $Image;
        protected $Version;


        protected function DefineTableName() {
                return("epic");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "identifier" => "Identifier",
                        "caption" => "Caption",
                        "date" => "Date",
                        "image" => "Image",
                        "version" => "Version"
                ));
        }
}

?>