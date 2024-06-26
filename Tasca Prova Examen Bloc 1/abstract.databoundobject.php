<?php



abstract class DataBoundObject {

   protected $ID;
   protected $objPDO;
   protected $strTableName;
   protected $arRelationMap;
   protected $blForDeletion;
   protected $blIsLoaded;
   protected $arModifiedRelations;

  protected $connectionString = "file:parse\prova.log";

protected $urlData;
protected $fileName;
protected $className;
protected $log;

protected $connectionStringDB = "postgres:parse\prova.log";

protected $urlDataDB;
protected $fileNameDB;
protected $classNameDB;
protected $logDB;

   abstract protected function DefineTableName();
   abstract protected function DefineRelationMap();

  

   public function __construct(PDO $objPDO, $id = NULL) {
      $this->strTableName = $this->DefineTableName();
      $this->arRelationMap = $this->DefineRelationMap();
      $this->objPDO = $objPDO;
      $this->blIsLoaded = false;
      if (isset($id)) {
         $this->ID = $id;
      };
      $this->arModifiedRelations = array();

      $this->urlData = parse_url($this->connectionString);

 $this->fileName = 'Logger/class.' . $this->urlData['scheme'] . 'LoggerBackend.php';

include_once($this->fileName);

$this->className = $this->urlData['scheme'] . 'LoggerBackend';

$this->log = $this->className::getInstance();



$this->urlDataDB = parse_url($this->connectionStringDB);

$this->fileNameDB = 'Logger/class.' . $this->urlDataDB['scheme'] . 'LoggerBackend.php';

include_once($this->fileNameDB);

$this->classNameDB = $this->urlDataDB['scheme'] . 'LoggerBackend';

echo "GetInstance";
$this->logDB = $this->classNameDB::getInstance();




       
   }

   public function Load() {
      if (isset($this->ID)) {
		$strQuery = "SELECT ";
        foreach ($this->arRelationMap as $key => $value) {
			$strQuery .= "\"" . $key . "\",";
        }
        $strQuery = substr($strQuery, 0, strlen($strQuery)-1);
        $strQuery .= " FROM \"" . $this->strTableName . "\" WHERE \"id\" = :eid";
        $objStatement = $this->objPDO->prepare($strQuery);
        $objStatement->bindParam(':eid', $this->ID, PDO::PARAM_INT);
        $objStatement->execute();
        $arRow = $objStatement->fetch(PDO::FETCH_ASSOC);
        foreach($arRow as $key => $value) {
            $strMember = $this->arRelationMap[$key];
            if (property_exists($this, $strMember)) {
                if (is_numeric($value)) {
                   eval('$this->'.$strMember.' = '.$value.';');
                } else {
                   eval('$this->'.$strMember.' = "'.$value.'";');
                };
            };
         };
         $this->blIsLoaded = true;
      };
   }

   public function Save() {
      if (isset($this->ID)) {
         $strQuery = 'UPDATE "' . $this->strTableName . '" SET ';
         foreach ($this->arRelationMap as $key => $value) {
            eval('$actualVal = &$this->' . $value . ';');
            if (array_key_exists($value, $this->arModifiedRelations)) {
               $strQuery .= '"' . $key . "\" = :$value, ";
            };
         }
         $strQuery = substr($strQuery, 0, strlen($strQuery)-2);
         $strQuery .= ' WHERE "id" = :eid';
         unset($objStatement);
         $objStatement = $this->objPDO->prepare($strQuery);
         $objStatement->bindValue(':eid', $this->ID, PDO::PARAM_INT);
         foreach ($this->arRelationMap as $key => $value) {
            eval('$actualVal = &$this->' . $value . ';');
            if (array_key_exists($value, $this->arModifiedRelations)) {
               if ((is_int($actualVal)) || ($actualVal == NULL)) {
                  $objStatement->bindValue(':' . $value, $actualVal,PDO::PARAM_INT);
               } else {
                  $objStatement->bindValue(':' . $value, $actualVal,PDO::PARAM_STR);
               };
            };
         };
         $objStatement->execute();
         $this->log->logMessage($this->ID, $this->getIsActive(), $this->className::INFO , 'UserApp Updated');
         $this->logDB->logMessage($this->ID, $this->getIsActive(), $this->className::INFO , 'UserApp Updated');
      } else {
         $strValueList = "";
         $strQuery = 'INSERT INTO "' . $this->strTableName . '"(';
         foreach ($this->arRelationMap as $key => $value) {
            eval('$actualVal = &$this->' . $value . ';');
            if (isset($actualVal)) {
               if (array_key_exists($value, $this->arModifiedRelations)) {
                  $strQuery .= '"' . $key . '", ';
                  $strValueList .= ":$value, ";
               };
            };
         }
         $strQuery = substr($strQuery, 0, strlen($strQuery) - 2);
         $strValueList = substr($strValueList, 0, strlen($strValueList) - 2);
         $strQuery .= ") VALUES (";
         $strQuery .= $strValueList;
         $strQuery .= ")";

         unset($objStatement);
         $objStatement = $this->objPDO->prepare($strQuery);
         foreach ($this->arRelationMap as $key => $value) {
            eval('$actualVal = &$this->' . $value . ';');
            if (isset($actualVal)) {   
               if (array_key_exists($value, $this->arModifiedRelations)) {
                  if ((is_int($actualVal)) || ($actualVal == NULL)) {
                     $objStatement->bindValue(':' . $value, $actualVal, PDO::PARAM_INT);
                  } else {
                     $objStatement->bindValue(':' . $value, $actualVal, PDO::PARAM_STR);
                  };
               };
            };
         }
         $objStatement->execute();
         
         $this->ID = $this->objPDO->lastInsertId($this->strTableName . "_id_seq");
         
         $this->log->logMessage($this->ID, $this->getIsActive(), $this->className::CRITICAL , 'UserApp saved');
         $this->logDB->logMessage($this->ID, $this->getIsActive(), $this->className::CRITICAL , 'UserApp saved');
      }
   }

   public function MarkForDeletion() {
      $this->blForDeletion = true;
      
   }
   
   public function __destruct() {
      if (isset($this->ID)) {   
         if ($this->blForDeletion == true) {
            $strQuery = 'DELETE FROM "' . $this->strTableName . '" WHERE "id" = :eid';
            $objStatement = $this->objPDO->prepare($strQuery);
            $objStatement->bindValue(':eid', $this->ID, PDO::PARAM_INT);   
            $objStatement->execute();
            $this->log->logMessage($this->ID, $this->getIsActive(), $this->className::WARNING , 'UserApp deleted');
            $this->logDB->logMessage($this->ID, $this->getIsActive(), $this->className::WARNING , 'UserApp deleted');
         };
      }
   }

   public function __call($strFunction, $arArguments) {

      $strMethodType = substr($strFunction, 0, 3);
      $strMethodMember = substr($strFunction, 3);
      switch ($strMethodType) {
         case "set":
            return($this->SetAccessor($strMethodMember, $arArguments[0]));
            break;
         case "get":
            return($this->GetAccessor($strMethodMember));   
      };
      return(false);   
   }

   private function SetAccessor($strMember, $strNewValue) {
      if (property_exists($this, $strMember)) {
         if (is_numeric($strNewValue)) { 
            eval('$this->' . $strMember . ' = ' . $strNewValue . ';');
         } else {
            eval('$this->' . $strMember . ' = "' . $strNewValue . '";');
         };
         $id='NoID';
         $idDB=NULL;
         if (isset($this->ID)) {
            $id=$this->ID;
            $idDB=$this->ID;
         }
         $isAct='NoValueIsActive';
         $isActDB = NULL;
         
         if ($this->getIsActive()!==NULL){
            $isAct=$this->getIsActive(); 
            $isActDB=$this->getIsActive();
         }
         $this->log->logMessage($id, $isAct, $this->className::NOTICE , 'Set '.$strMember);
         $this->logDB->logMessage($idDB, $isActDB, $this->className::NOTICE , 'Set '.$strMember);
         $this->arModifiedRelations[$strMember] = "1";
         
      } else {
         return(false);
      };   
   }

   private function GetAccessor($strMember) {
      if ($this->blIsLoaded != true) {
         $this->Load();
      }
      if (property_exists($this, $strMember)) {
         
         eval('$strRetVal = $this->' . $strMember . ';');
         return($strRetVal);
      } else {
         return(false);
      };   
   }
   
}

?>
