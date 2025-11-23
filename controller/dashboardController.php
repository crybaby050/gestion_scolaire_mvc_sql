<?php 
    require_once __DIR__ . '/../model/helperModel.php' ;
    $user = verifUser('benthiam@gmail.com');
    $nameUser = $user['prenom'];
    $etu = countElement('etudiant');
    $classe = countElement('classe');
    $niv = countElement('niveau');
    $fil = countElement('filiere');
?>