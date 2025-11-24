<?php
function uniqueElement($nom){
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE nom =:nom LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom'=>$nom]);
    return $stmt->fetch();
}
// function verifUser($mail){
//     $pdo = getPDO();
//     $sql = "SELECT * FROM users WHERE mail =:mail LIMIT 1";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([':mail'=>$mail]);
//     return $stmt->fetch();
// }
function verifMdp($mdp){
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE mdp =:mdp LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mdp'=>$mdp]);
    return $stmt->fetch();
}
