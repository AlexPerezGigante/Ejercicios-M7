<?php

//fetch_user_chat_history.php

include('connect.php');

session_start();

echo parent::fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], parent::$objPDO);
    

?>