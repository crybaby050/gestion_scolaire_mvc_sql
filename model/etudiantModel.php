<?php
function getIdClasseByLibelle($string)
{
    $pdo = getPDO();
    $sql = "SELECT id FROM classe WHERE libelle = :value";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['value' => $string]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}
function filterEtudiantByClasse($string)
{
    $pdo = getPDO();
    $id = getIdClasseByLibelle($string);
    if (!$id) {
        return [];
    }
    $sql = "SELECT e.id,e.matricule,e.nom,e.prenom,e.email,e.telephone,e.adresse,c.libelle
    FROM etudiant AS e
    INNER JOIN classe AS c
    ON e.id_classe = c.id
    WHERE e.id_classe = :id
    ORDER BY prenom ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function ajoutEtudiant($nom, $pre, $id_classe, $mail, $tel, $ads)
{
    $pdo = getPDO();
    $sql = "INSERT INTO etudiant(nom,prenom,id_classe,email,telephone,adresse)
            VALUES (:nom,:prenom,:id_classe,:email,:telephone,:adresse)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $pre,
        'email' => $mail,
        'id_classe' => $id_classe,
        'telephone' => $tel,
        'adresse' => $ads
    ]);
}
function findOneEtudiant(int $id): ?array
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
function deleteEtudiant($id){
    $pdo = getPDO();
    $sql = 'DELETE FROM etudiant WHERE id =:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
}

function updateEtudiant($id,$nom,$prenom,$email,$classe,$telephone,$adresse){
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