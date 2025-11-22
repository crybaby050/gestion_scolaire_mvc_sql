<?php
function getPDO(){
    try{
        return new PDO(
            "mysql:host=localhost;dbname=ecole;charset=utf8",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }catch(PDOException $e){
        die("Erreur PDO :" . $e->getMessage());
    }
}