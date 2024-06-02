<?php 

require("abstract.databoundobject.php");

class ChatMessage extends DataBoundObject {

        protected $ID;
        protected $To_user_id;
        protected $From_user_id;
        protected $Chat_message;
        protected $Timestamp;
        protected $Status;


        protected function DefineTableName() {
                return("chat_message");
        }

        protected function DefineRelationMap() {
                return(array(
                        "chat_message_id" => "ID",
                        "to_user_id" => "To_user_id",
                        "from_user_id" => "From_user_id",
                        "chat_message" => "Chat_message",
                        "timestamp" => "Timestamp",
                        "status" => "Status"
                ));
        }
}

?>