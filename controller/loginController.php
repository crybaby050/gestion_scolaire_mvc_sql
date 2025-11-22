<?php
require_once __DIR__ . '/../other/init.php';
function isConnected(){
    if(isset($_POST['log'])){
        $mail = sanitize($_POST['mail']);
    }
}