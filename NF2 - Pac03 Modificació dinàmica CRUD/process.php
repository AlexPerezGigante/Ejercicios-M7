<?php

require("class.userapp.php");
require("class.pdofactory.php");



function select($table, $id = NULL){
    $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

    if(isset($id)){     
            eval('$objClass = new '. ucfirst($table) . '( $objPDO , '. $id  .');');
    }else{  
            eval('$objClass = new '. ucfirst($table) . '( $objPDO );');
    }
    
    return $objClass->Select();

    // echo $response;

    // echo ("<script>console.log('PHP: ', ". $response .");</script>");
}

function delete($table, $id){
    $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        eval('$objClass = new '. ucfirst($table) . '( $objPDO , '. $id  .');');
        $objClass->MarkForDeletion();
        $objClass->__destruct();
        return($id);

}

function update($table, $id, $keys = [], $values = []){
    $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $objClass = new Userapp($objPDO, $id);
    eval('$objClass = new '. ucfirst($table) . '( $objPDO , '. $id  .');');
    $index = 1;
    foreach ($values as $valor){
        
        eval('$objClass->set'. ucfirst($keys[$index]) . '( $valor );');
        $index = $index+1;
    }
    
    $objClass->save();
        
    return($id);
}

class intelForm {


    protected $errors = [];
    protected $data = [];
    

    function comprobarVacio(){
        if (empty($_POST['prompt'])) {
            $errors['prompt'] = 'Name is required.';
        }
        
        // if (empty($_POST['email'])) {
        //     $errors['email'] = 'Email is required.';
        // }
        
        // if (empty($_POST['superheroAlias'])) {
        //     $errors['superheroAlias'] = 'Superhero alias is required.';
        // }

        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $data['success'] = true;
            $data['message'] = 'Success!';
        
            $data['prompt'] = $_POST['prompt'];

            $prompt = trim($data['prompt']);
            $promptArray = explode(" ", $prompt);

            if($promptArray[0] == 'read'){
                if(isset($promptArray[2])){
                    $data['select'] = select($promptArray[1], $promptArray[2]);
                }else{
                    $data['select'] = select($promptArray[1]);
                }
                
            }

            if($promptArray[0] == 'delete'){
                if(!isset($_POST['check'])){
                    $data['delete'] = select($promptArray[1], $promptArray[2]);
                }else{
                    if($_POST['check']=='true'){
                        $data['checkDelete'] = delete($promptArray[1], $promptArray[2]);
                    }else{
                        $data['cancelar'] = true;
                    }

                }
                
            }

            if($promptArray[0] == 'update'){
                if(!isset($_POST['check'])){
                    $data['update'] = select($promptArray[1], $promptArray[2]);
                }else{
                    if($_POST['check']=='true'){
                        
                        $data['checkForm'] = update($promptArray[1], $promptArray[2], $_POST['name'], $_POST['value']);
                        // $data['checkForm'] = 1;
                    
                        
                    }else{
                        $data['cancelar'] = true;
                    }

                }
            }

            if($promptArray[0] == 'create'){

                $columna = "
                <tr><td><input name='name[]' type='text'/></td><td><input name='value[]' type='text'/></td></tr>
                ";


                if(!isset($_POST['check'])){
                    $array = [];
                    array_push($array, $columna);

                    $data['create'] = $array;
                }else{
                    if($_POST['check']=='true'){
                        
                        $data['checkForm'] = update($promptArray[1], $promptArray[2], $_POST['name'], $_POST['value']);
                        // $data['checkForm'] = 1;
                    
                        
                    }else{
                        $data['cancelar'] = true;
                    }

                }
            }
                
            
                
            
            

            
        }
        echo json_encode($data);
    }
}



$obj = new intelForm();
$obj->comprobarVacio();

