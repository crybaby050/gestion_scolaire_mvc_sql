<div class="add-container">
    <?php if (!empty($success)): ?>
<div class="success-popup">
    <?= $success ?>
</div>
<?php endif; ?>
    <h2>Ajouter une classe</h2>
    <form class="form-card" method="post">
        <div class="field">
            <label>Nom</label>
            <input type="text" placeholder="Ex: Classe A-1" name="lib" value="<?= htmlspecialchars($_POST['lib'] ?? "") ?>">
            <p class="error"><?= $error['lib'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Code</label>
            <input type="text" placeholder="Ex: CA-1" name="code" value="<?= htmlspecialchars($_POST['code'] ?? "") ?>">
            <p class="error"><?= $error['code'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Niveau</label>
            <select name="niv">
                <option value=""></option>
                <?php foreach ($niveaux as $niveau): ?>
                    <option  value="<?= $niveau['libelle'] ?>"<?= (($_POST['niv'] ?? "") == $niveau['libelle']) ? "selected" : "" ?>>
                        <?= $niveau['libelle'] ?? "" ?>
                    </option>
                <?php endforeach ?>
            </select>
            <p class="error"><?= $error['niv'] ?? "" ?></p>
        </div>
        
        <div class="field">
            <label>Filere</label>
            <select name="fil">
                <option value=""></option>
                <?php foreach ($filieres as $filiere): ?>
                    <option  vlaue="<?= $filiere['libelle'] ?>"<?= (($_POST['fil'] ?? "") == $filiere['libelle']) ? "selected" : "" ?>>
                        <?= $filiere['libelle'] ?? "" ?>
                    </option>
                <?php endforeach ?>
            </select>
            <p class="error"><?= $error['fil'] ?? "" ?></p>
        </div>
        
        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save" name="add-cls">Enregistrer</button>
        </div>
    </form>
</div>