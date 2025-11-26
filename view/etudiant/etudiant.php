<div class="content">
<?php if (isset($_GET['msg']) && $_GET['msg'] === 'update-success'): ?>
<div class="popup-success">
    Étudiant modifié avec succès !
</div>
<?php endif; ?>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'delete-success'): ?>
<div class="popup-success">
    Étudiant supprimé avec succès !
</div>
<?php endif; ?>

    <div class="etu-h">
        <h1>Liste des etudiants</h1>
        <br>
        <p>Gestion des étudiants du système</p>
        <div class="etu-fil">
            <form action="" method="get">
                <input type="hidden" name="page" value="etudiant">
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
            <a href="?page=add_etudiant"><button class="add-etu">Ajouter un etudiant</button></a>
        </div>
    </div>


    <!-- Checkbox caché -->
    <input type="checkbox" id="toggleView" hidden>

    <!-- Le bouton qui agit comme switch -->
    <label for="toggleView" class="switch-btn">Changer d'affichage</label>

    <!-- SECTION : CARDS -->
    <div class="card-container view-card">
        <?php foreach ($etudiants as $etudiant): ?>
            <div class="student-card">
                <div class="card-actions">
                    <a href="?page=detail_etudiant&id=<?= $etudiant['id'] ?>" class="btn-view"><i class="fas fa-eye"></i></a>
                    <a href="?page=update_etudiant&id=<?= $etudiant['id'] ?>" class="btn-edit"><i class="fas fa-edit"></i></a>
                    <a href="?page=etudiant&delete=<?= $etudiant['id'] ?>" class="btn-delete" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')"><i class="fas fa-trash"></i></a>
                </div>
                <div class="card-header">
                    <h3><?= $etudiant['prenom'] . " " . $etudiant['nom'] ?></h3>
                    <span class="matricule"><?= $etudiant['matricule'] ?></span>
                </div>
                <div class="card-body">
                    <p><strong>Classe :</strong><?= $etudiant['libelle'] ?></p>
                    <p><strong>Email :</strong><?= $etudiant['email'] ?></p>
                    <p><strong>Téléphone :</strong><?= $etudiant['telephone'] ?></p>
                    <p><strong>Adresse :</strong><?= $etudiant['adresse'] ?></p>
                </div>
            </div>
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
                        <a href="?page=detail_etudiant&id=<?= $etudiant['id'] ?>" class="table-view-btn"><i class="fas fa-eye"></i></a>
                        <a href="?page=update_etudiant&id=<?= $etudiant['id'] ?>" class="table-edit-btn"><i class="fas fa-edit"></i></a>
                        <a href="?page=etudiant&delete=<?= $etudiant['id'] ?>" class="table-delete-btn"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>