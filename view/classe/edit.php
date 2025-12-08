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
            <input type="text" name="lib" value="<?= $classe['libelle'] ?>">
            <p class="error"><?= $error['lib'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Code</label>
            <input type="text" name="code" value="<?= $classe['code'] ?>">
            <p class="error"><?= $error['code'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Niveau</label>
            <select name="niv">
                <option value=""></option>
                <?php foreach ($niveaux as $niveau): ?>
                    <option value="<?= $niveau['libelle'] ?>"
                        <?= ($classe['niveau'] === $niveau['libelle']) ? "selected" : "" ?>>
                        <?= $niveau['libelle'] ?>
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
                    <option value="<?= $filiere['libelle'] ?>"
                        <?= ($classe['filiere'] === $filiere['libelle']) ? "selected" : "" ?>>
                        <?= $filiere['libelle'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <p class="error"><?= $error['fil'] ?? "" ?></p>
        </div>

        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save" name="mod-cls">Enregistrer</button>
        </div>
    </form>
</div>