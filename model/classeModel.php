<?php
function getIdNiveauByLibelle($string)
{
    $pdo = getPDO();
    $sql = "SELECT id FROM niveau WHERE libelle = :value";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['value' => $string]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}
function filterClasseByNiveau($string)
{
    $pdo = getPDO();
    $id = getIdNiveauByLibelle($string);
    if (!$id) {
        return [];
    }
    $sql = "SELECT c.id,c.code,c.libelle,n.libelle AS niveau_libelle,f.libelle AS filiere_libelle
    FROM classe AS c
    INNER JOIN niveau AS n
    ON c.id_niveau = n.id
    INNER JOIN filiere AS f
    ON c.id_filiere = f.id
    WHERE c.id_niveau = :id
    ORDER BY libelle ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getIdFiliereByLibelle($string)
{
    $pdo = getPDO();
    $sql = "SELECT id FROM filiere WHERE libelle = :value";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['value' => $string]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}
function filterClasseByFiliere($string)
{
    $pdo = getPDO();
    $id = getIdFiliereByLibelle($string);
    if (!$id) {
        return [];
    }
    $sql = "SELECT c.id,c.code,c.libelle,n.libelle AS niveau_libelle,f.libelle AS filiere_libelle
    FROM classe AS c
    INNER JOIN filiere AS f
    ON c.id_filiere = f.id
    INNER JOIN niveau AS n
    ON c.id_niveau = n.id
    WHERE c.id_filiere = :id
    ORDER BY libelle ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ajoutClasse($lib, $code, $id_niveau,$id_filiere)
{
    $pdo = getPDO();
    $sql = "INSERT INTO classe(libelle,code,id_niveau,id_filiere)
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
    c.id,
    c.code,
    c.libelle,
    n.libelle AS niveau,
    f.libelle AS filiere
FROM classe AS c
INNER JOIN niveau AS n ON c.id_niveau = n.id
INNER JOIN filiere AS f ON c.id_filiere = f.id
WHERE c.id = :id LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
    return $etudiant ?: null;
}
function deleteClasse($id){
    $pdo = getPDO();
    $sql = 'DELETE FROM classe WHERE id =:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
}

function updateClasse($id,$lib,$code,$niv,$fil){
    $pdo = getPDO();
    $sql = 'UPDATE classe
    SET
        libelle =:libelle,
        code = :code,
        id_niveau = :niveau,
        id_filiere = :filiere
    WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id'=>$id,
        'libelle'=>$lib,
        'code'=>$code,
        'niveau'=>$niv,
        'filiere'=>$fil
    ]);
}
function getEtudiantFromClasse($id){
    $pdo = getPDO();
    
    $sql = "SELECT 
                e.id,
                e.matricule,
                e.nom,
                e.prenom,
                e.email,
                e.telephone,
                e.adresse,
                c.libelle
            FROM etudiant AS e
            INNER JOIN classe AS c
                ON e.id_classe = c.id
            WHERE c.id = :id
            ORDER BY e.prenom ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function countEtudiantFromClasse($id){
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM etudiant WHERE id_classe = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return $stmt->fetchColumn();
}