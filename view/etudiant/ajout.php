<?php
require_once __DIR__ . '/../../controller/etudiantController.php';
$classes = tableClasse();
list($error, $success) = newEtudiant();
?>
<?php if (!empty($success)): ?>
<div class="success-popup">
    <?= $success ?>
</div>
<?php endif; ?>
<div class="add-container">
    <h2>Ajouter un étudiant</h2>
    <form class="form-card" method="post">
        <div class="field">
            <label>Nom</label>
            <input type="text" placeholder="Ex: Thiam" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? "") ?>">
            <p class="error"><?= $error['nom'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Prenom</label>
            <input type="text" placeholder="Ex: Ben" name="pre" value="<?= htmlspecialchars($_POST['pre'] ?? "") ?>">
            <p class="error"><?= $error['pre'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" placeholder="exemple@mail.com" name="mail"  value="<?= htmlspecialchars($_POST['mail'] ?? "") ?>">
            <p class="error"><?= $error['mail'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Classe</label>
            <select name="cls">
                <option value=""></option>
                <?php foreach ($classes as $classe): ?>
                    <option  value="<?= $classe['libelle'] ?>"<?= (($_POST['cls'] ?? "") == $classe['libelle']) ? "selected" : "" ?>>
                        <?= $classe['libelle'] ?? "" ?>
                    </option>
                <?php endforeach ?>
            </select>
            <p class="error"><?= $error['cls'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Téléphone</label>
            <input type="text" placeholder="77xxxxxxx" name="tel" value="<?= htmlspecialchars($_POST['tel'] ?? "") ?>">
            <p class="error"><?= $error['tel'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Adresse</label>
            <input type="text" placeholder="Ex: Dakar, Yoff" name="ads" value="<?= htmlspecialchars($_POST['ads'] ?? "") ?>">
            <p class="error"><?= $error['ads'] ?? "" ?></p>
        </div>
        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save" name="add-etu">Enregistrer</button>
        </div>
    </form>
</div>