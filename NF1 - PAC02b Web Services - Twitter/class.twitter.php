<?php

require("abstract.databoundobject.php");

class Twitter extends DataBoundObject {

        protected $Url;
        protected $Author_name;
        protected $Html;
        protected $Type;


        protected function DefineTableName() {
                return("twitter");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "url" => "Url",
                        "author_name" => "Author_name",
                        "html" => "Html",
                        "type" => "Type"
                ));
        }
}

?>