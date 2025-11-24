<?php
function getAllEtudiant(){
    $pdo = getPDO();
    $sql = "SELECT e.id,e.matricule,e.nom,e.prenom,e.email,e.telephone,e.adresse,c.libelle
    FROM etudiant AS e
    INNER JOIN classe AS c
    ON e.id_classe = c.id
    ";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllClasse(){
    $pdo = getPDO();
    $sql = "SELECT *FROM classe";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getIdClasseByLibelle($string){
    $pdo = getPDO();
    $sql = "SELECT id FROM classe WHERE libelle = :libelle";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':libelle'=>$string]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}
function filterEtudiantByClasse($string){
    $pdo = getPDO();
    $id = getIdClasseByLibelle($string);
    if (!$id) {
        return [];
    }
    $sql = "SELECT e.id,e.matricule,e.nom,e.prenom,e.email,e.telephone,e.adresse,c.libelle
    FROM etudiant AS e
    INNER JOIN classe AS c
    ON e.id_classe = c.id
    WHERE e.id_classe = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function ajoutEtudiant($nom,$pre,$id_classe,$mail,$tel,$ads){
    $pdo=getPDO();
    $sql = "INSERT INTO etudiant(nom,prenom,id_classe,email,telephone,adresse)
            VALUES (:nom,:prenom,:id_classe,:email,:telephone,:adresse)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom'=>$nom,
        ':prenom'=>$pre,
        ':email'=>$mail,
        ':id_classe'=>$id_classe,
        ':telephone'=>$tel,
        ':adresse'=>$ads
    ]);
}