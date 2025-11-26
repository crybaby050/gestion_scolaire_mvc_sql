<div class="classe-content">
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

    <div class="classe-header">
        <h1>Liste des classes</h1>
        <p>Gestion des classes du système</p>
        <div class="classe-filters">
            
            <!-- Filtre par niveau -->
            <form class="classe-filter-form" method="get">
                <input type="hidden" name="page" value="classe">
                <div>
                    <select name="filniv" id="">
                        <option value=""></option>
                        <?php foreach ($niveaux as $niveau): ?>
                            <option value="<?= $niveau['libelle'] ?>"><?= $niveau['libelle'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" name="filt-niv">Filtrer par niveau</button>
            </form>
            <!-- Filtre par filière -->
            <form class="classe-filter-form" method="get">
                <input type="hidden" name="page" value="classe">
                <div>
                    <select name="filfil" id="">
                        <option value=""></option>
                        <?php foreach ($filieres as $filiere): ?>
                            <option value="<?= $filiere['libelle'] ?>"><?= $filiere['libelle'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" name="filt-fil">Filtrer par filiere</button>
            </form>
            <a href="#">
                <button class="add-classe-btn">Ajouter une classe</button>
            </a>
        </div>
    </div>
    <!-- SWITCH card / tableau -->
    <input type="checkbox" id="classeToggleView" hidden>
    <label for="classeToggleView" class="classe-switch-btn">Changer d'affichage</label>
    <!-- CARDS -->
    <div class="classe-card-container">
        <?php foreach ($classes as $classe): ?>
        <div class="classe-card">
            <div class="classe-card-actions">
                <a href="?page=detail_classe&id=<?= $classe['id'] ?>" class="c-view"><i class="fas fa-eye"></i></a>
                <a href="?page=update_classe&id=<?= $classe['id'] ?>" class="c-edit"><i class="fas fa-edit"></i></a>
                <a href="?page=classe&delete=<?= $classe['id'] ?>" class="c-delete" onclick="return confirm('La suppression de cette classe entraine la suppression des etudiants appartenant a cette classe \nVoulez-vous continuer')"><i class="fas fa-trash"></i></a>
            </div>
            <div class="classe-card-header">
                <h3>Classe INFO</h3>
                <span class="classe-code"><?= $classe['code'] ?></span>
            </div>
            <div class="classe-card-body">
                <p><strong>Libellé :</strong> <?= $classe['libelle'] ?></p>
                <p><strong>Filière :</strong> <?= $classe['filiere_libelle'] ?></p>
                <p><strong>Niveau :</strong> <?= $classe['niveau_libelle'] ?></p>
            </div>
        </div>
        <?php endforeach ?>
        <!-- DUPLIQUE LES CARDS SI NÉCESSAIRE -->
    </div>
    <!-- TABLEAU -->
    <table class="classe-table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Libellé</th>
                <th>Filière</th>
                <th>Niveau</th>
                <th>Acte</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $classe): ?>
            <tr>
                <td><?= $classe['code'] ?></td>
                <td><?= $classe['libelle'] ?></td>
                <td><?= $classe['filiere_libelle'] ?></td>
                <td><?= $classe['niveau_libelle'] ?></td>
                <td class="classe-table-actions">
                    <a href="?page=detail_classe&id=<?= $classe['id'] ?>" class="ct-view"><i class="fas fa-eye"></i></a>
                    <a href="?page=update_classe&id=<?= $classe['id'] ?>" class="ct-edit"><i class="fas fa-edit"></i></a>
                    <a href="?page=classe&delete=<?= $classe['id'] ?>" class="ct-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>