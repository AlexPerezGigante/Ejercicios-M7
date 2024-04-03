<?php


 include_once("abstract.databoundobject2.php");
include_once("./class.pdofactory.php");
include_once('class.registro.php');

class postgresLoggerBackend{
    private $logFile; //nombre del fichero
	private $reg; //connexió del fitxer

    private $logLevel; //nivel para registrar los mensajes

	const DEBUG = 100;
	const INFO = 75;
	const NOTICE = 50;
	const WARNING = 25;
	const ERROR = 10;
	const CRITICAL = 5;

    private function __construct() {
        $this->logLevel = 100;

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        echo "BD: ".$strDSN."\n";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
        echo "aa: ".$strDSN."\n";
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "bb: ".$strDSN."\n";
        $this->reg = new Registro($objPDO);
        echo "cc: ".$strDSN."\n";

}

public static function getInstance(){
    static $objLog;
    if(!isset($objLog)){
        $objLog = new postgresLoggerBackend();
    }
    return $objLog;
}

public function __destruct(){
    if(is_resource($this->reg)){
        // fclose($this->reg);
    }
}


public function logMessage($id, $isActive, $logLevel = fileLoggerBackend::INFO, $msg){
    if ($logLevel > $this->logLevel){
        return false;
    }
    
        

        //   if (!is_resource($this->reg)){
        //       printf("No puedo abrir el fichero %s", $this->logFile);
        //       return false;
        //   }
        


    date_default_timezone_set('America/New_York');
      $formatterDate = DateTimeImmutable::createFromFormat('U',time());
      $time = $formatterDate->format('Y-m-d H:i:s');

      $msg = str_replace("\t", "", $msg);
      $msg = str_replace("\n", "", $msg);
      $msg = str_replace("@", "", $msg);

      if (!is_numeric($id)) {
        $id=0;
     }
     if (!is_numeric($isActive)) {
        $isActive=0;
     }

    echo $id . " " . $isActive . " " . $logLevel . " " . $msg;
      
    $this->reg->setIdUserApp($id);
    
    $this->reg->setComentario($msg);
    echo "Connection opened...\n";
    $this->reg->setCodi($logLevel);
    $this->reg->setIsActive($isActive);
    $this->reg->setRegTime($time);
    
    $this->reg->Save();

    
      


    //   $message = $time."\t".$logLevel."\t".$msg."\t".$module."\n";
    //   fwrite($this->reg, $message);

}

public static function levelToString($loglevel = null){

    switch ($loglevel) {
        case fileLoggerBackend::DEBUG:
            return 'DEBUG';
            break;
        case fileLoggerBackend::INFO:
            return 'INFO';
            break;
        case fileLoggerBackend::NOTICE:
            return 'NOTICE';
            break;
        case fileLoggerBackend::WARNING:
            return 'WARNING';
            break;
        case fileLoggerBackend::ERROR:
            return 'ERROR';
            break;
        case fileLoggerBackend::CRITICAL:
            return 'CRITICAL';
            break;			
        default:
            return '[OTHER]';
            break;
    }

}
}