<?php
function filterClasseByNiveau($string)
{
    $pdo = getPDO();
    $id = getIdNiveauByLibelle($string);
    if (!$id) {
        return [];
    }
    $sql = "SELECT c.id,c.code,c.libelle,n.libelle
    FROM classe AS c
    INNER JOIN niveau AS n
    ON c.id_niveau = n.id
    WHERE c.id_niveau = :id
    ORDER BY libelle ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function ajoutClasse($lib, $code, $id_niveau,$id_filiere)
{
    $pdo = getPDO();
    $sql = "INSERT INTO classe(lib,code,id_niveau,id_filiere)
            VALUES (:lib,:code,:id_niveau,:id_filiere)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'lib' => $lib,
        'code' => $code,
        'id_niveau' => $id_niveau,
        'id_filiere' => $id_filiere
    ]);
}
function findOneClasse(int $id): ?array
{
    $pdo = getPDO();
    $sql = "SELECT 
    e.id,
    e.matricule,
    e.nom,
    e.prenom,
    e.email,
    e.telephone,
    e.adresse,
    c.libelle AS classe,
    n.libelle AS niveau,
    f.libelle AS filiere
FROM etudiant AS e
INNER JOIN classe AS c ON e.id_classe = c.id
INNER JOIN niveau AS n ON c.id_niveau = n.id
INNER JOIN filiere AS f ON c.id_filiere = f.id
WHERE e.id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
    return $etudiant ?: null;
}
function deleteClasse($id){
    $pdo = getPDO();
    $sql = 'DELETE FROM etudiant WHERE id =:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
}

function updateClasse($id,$nom,$prenom,$email,$classe,$telephone,$adresse){
    $pdo = getPDO();
    $sql = 'UPDATE etudiant
    SET
        nom =:nom,
        prenom = :prenom,
        email = :email,
        id_classe = :classe,
        telephone=:telephone,
        adresse=:adresse
    WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id'=>$id,
        'prenom'=>$prenom,
        'nom'=>$nom,
        'email'=>$email,
        'classe'=>$classe,
        'telephone'=>$telephone,
        'adresse'=>$adresse
    ]);
}