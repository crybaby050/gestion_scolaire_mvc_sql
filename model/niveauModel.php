<?php
function ajoutNiveau($lib){
    $pdo = getPDO();
    $sql = "INSERT INTO 
    niveau (libelle) 
    VALUES(:lib)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(['lib'=>$lib]);
}
function deleteNiveau($id){
    $pdo = getPDO();
    $sql = "DELETE FROM niveau WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
}

function countClasseFromNiveau($id){
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM classe WHERE id_niveau = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt->fetchColumn();
}