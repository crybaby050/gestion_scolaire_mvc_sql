<?php
function uniqueElement($nom){
    $pdo = getPDO();
    $sql = "SELECT * FROM article WHERE nom =:nom LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nom'=>$nom]);
    return $stmt->fetch();
}