<?php

class Registro extends DataBoundObject2 {

        protected $IdUserApp;
        protected $Codi;
        protected $Comentario;
        protected $RegTime;
        protected $IsActive;



        protected function DefineTableName() {
                return("loguserapp");
        }

        protected function DefineRelationMap() {
                return(array(
                        "idUserApp" => "IdUserApp",
                        "codi" => "Codi",
                        "comentari" => "Comentario",
                        "regTime" => "RegTime",
                        "isActive" => "IsActive"
                ));
        }
}

?>