<?php
function ajoutFiliere($lib){
    $pdo = getPDO();
    $sql = "INSERT INTO 
    filiere (libelle) 
    VALUES(:lib)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(['lib'=>$lib]);
}
function deleteFiliere($id){
    $pdo = getPDO();
    $sql = "DELETE FROM filiere WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
}