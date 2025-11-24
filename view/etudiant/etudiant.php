<?php
require_once __DIR__ . '/../../controller/etudiantController.php';
$etudiants = affiheEtudiant();
$classes = getAllClasse();
?>
<div class="content">
    <div class="etu-h">
        <h1>Liste des etudiants</h1>
        <br>
        <p>Gestion des étudiants du système</p>
        <div class="etu-fil">
            <form action="" method="get">
                <div>
                    <select name="fil" id="">
                        <option value=""></option>
                        <?php foreach ($classes as $classe): ?>
                            <option value="<?= $classe['libelle'] ?>"><?= $classe['libelle'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" name="filt">Filtrer</button>
            </form>
            <a href=""><button class="add-etu">Ajouter un etudiant</button></a>
        </div>
    </div>


    <!-- Checkbox caché -->
    <input type="checkbox" id="toggleView" hidden>

    <!-- Le bouton qui agit comme switch -->
    <label for="toggleView" class="switch-btn">Changer d'affichage</label>

    <!-- SECTION : CARDS -->
    <div class="card-container view-card">
        <?php foreach ($etudiants as $etudiant): ?>
            <a href="" style="text-decoration: none;color:black">
                <div class="student-card">
                    <div class="card-header">
                        <h3><?= $etudiant['prenom'] . " " . $etudiant['nom'] ?></h3>
                        <span class="matricule"><?= $etudiant['matricule'] ?></span>

                        <div class="card-actions">
                            <a href="view.php?id=<?= $etudiant['id'] ?>" class="btn-view"><i class="fas fa-eye"></i></a>
                            <a href="update.php?id=<?= $etudiant['id'] ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?= $etudiant['id'] ?>" class="btn-delete"><i class="fas fa-trash"></i></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <p><strong>Classe :</strong><?= $etudiant['libelle'] ?></p>
                        <p><strong>Email :</strong><?= $etudiant['email'] ?></p>
                        <p><strong>Téléphone :</strong><?= $etudiant['telephone'] ?></p>
                        <p><strong>Adresse :</strong><?= $etudiant['adresse'] ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>

    <!-- SECTION : TABLEAU -->
    <table class="table-view">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Matricule</th>
                <th>Classe</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Acte</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr onclick="" style="cursor:pointer;">
                    <td><?= $etudiant['nom'] ?></td>
                    <td><?= $etudiant['prenom'] ?></td>
                    <td><?= $etudiant['matricule'] ?></td>
                    <td><?= $etudiant['libelle'] ?></td>
                    <td><?= $etudiant['email'] ?></td>
                    <td><?= $etudiant['telephone'] ?></td>
                    <td><?= $etudiant['adresse'] ?></td>

                    <td class="acte-btns">
                        <a href="view.php?id=<?= $etudiant['id'] ?>" class="table-view-btn"><i class="fas fa-eye"></i></a>
                        <a href="update.php?id=<?= $etudiant['id'] ?>" class="table-edit-btn"><i class="fas fa-edit"></i></a>
                        <a href="delete.php?id=<?= $etudiant['id'] ?>" class="table-delete-btn"><i class="fas fa-trash"></i></a>
                    </td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>