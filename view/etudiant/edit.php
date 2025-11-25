<div class="add-container">
    <h2>Modifier l'etudiant <?= 'niincn' ?></h2>
    <form class="form-card" method="post">
        <div class="field">
            <label>Nom</label>
            <input type="text" placeholder="Ex: Thiam" name="nom" value="<?= $etudiant['nom'] ?>">
            <p class="error"><?= $error['nom'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Prenom</label>
            <input type="text" placeholder="Ex: Ben" name="pre" value="<?= $etudiant['prenom'] ?>">
            <p class="error"><?= $error['pre'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="text" placeholder="exemple@mail.com" name="mail"  value="<?= $etudiant['email'] ?>">
            <p class="error"><?= $error['mail'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Classe</label>
            <select name="cls">
                <option value=""></option>
                <?php foreach ($classes as $classe): ?>
                    <option  value="<?= $etudiant['classe'] ?>"<?= $etudiant['classe'] ? "selected" : "" ?>>
                        <?= $classe['libelle'] ?? "" ?>
                    </option>
                <?php endforeach ?>
            </select>
            <p class="error"><?= $error['cls'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Téléphone</label>
            <input type="text" placeholder="77xxxxxxx" name="tel" value="<?= $etudiant['telephone'] ?>">
            <p class="error"><?= $error['tel'] ?? "" ?></p>
        </div>
        <div class="field">
            <label>Adresse</label>
            <input type="text" placeholder="Ex: Dakar, Yoff" name="ads" value="<?= $etudiant['adresse'] ?>">
            <p class="error"><?= $error['ads'] ?? "" ?></p>
        </div>
        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save" name="mod-etu">Enregistrer</button>
        </div>
    </form>
</div>