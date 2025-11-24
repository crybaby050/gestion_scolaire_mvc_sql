<?php 
    require_once __DIR__ . '/../../controller/etudiantController.php';
    $classes = tableClasse();
    $error = newEtudiant();
?>
<div class="add-container">
    <h2>Ajouter un étudiant</h2>
    <form class="form-card">
        
        <div class="field">
            <label>Nom</label>
            <input type="text" placeholder="Ex: Thiam">
            <small class="error"><?= $error['nom'] ?? "" ?></small>
        </div>
        
        <div class="field">
            <label>Prenom</label>
            <input type="text" placeholder="Ex: Ben">
            <small class="error"><?= $error['pre'] ?? "" ?></small>
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" placeholder="exemple@mail.com">
            <small class="error"><?= $error['mail'] ?? "" ?></small>
        </div>
        
                <div class="field">
                    <label>Classe</label>
                    <select>
                        <option value=""></option>
                        <?php foreach($classes as $classe): ?>
                            <option value="">
                                <?= $classe['libelle'] ?? "" ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <small class="error"><?= $error['cls'] ?? "" ?></small>
                </div>
        <div class="field">
            <label>Téléphone</label>
            <input type="text" placeholder="77xxxxxxx">
            <small class="error"><?= $error['tel'] ?? "" ?></small>
        </div>
        <div class="field">
            <label>Adresse</label>
            <input type="text" placeholder="Ex: Dakar, Yoff">
            <small class="error"><?= $error['ads'] ?? "" ?></small>
        </div>
        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save" name="add-etu">Enregistrer</button>
        </div>
    </form>
</div>
