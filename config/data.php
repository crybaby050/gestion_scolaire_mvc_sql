<?php
function getPDO(){
    try {
        $pdo = new PDO(
            "mysql:host=mysql-digischool.alwaysdata.net;dbname=digischool_ecole221;charset=utf8;port=3306",
            "digischool",
            "seydinathiam05"  // Remplacez par votre vrai mot de passe
        );
        
        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
        return $pdo;
        
    } catch(PDOException $e){
        die("Erreur PDO : ". $e->getMessage());
    }
}
?>