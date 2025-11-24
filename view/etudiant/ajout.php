<div class="add-container">
    <h2>Ajouter un étudiant</h2>

    <form class="form-card">
        
        <div class="field">
            <label>Nom</label>
            <input type="text" placeholder="Ex: Ben Thiam">
            <small class="error">Message d’erreur ici</small>
        </div>
        
        <div class="field">
            <label>Prenom</label>
            <input type="text" placeholder="Ex: Ben Thiam">
            <small class="error">Message d’erreur ici</small>
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" placeholder="exemple@mail.com">
            <small class="error"></small>
        </div>

        <div class="field">
            <label>Téléphone</label>
            <input type="text" placeholder="77xxxxxxx">
            <small class="error"></small>
        </div>

        <div class="field">
            <label>Classe</label>
            <select>
                <option value="dev">Développement</option>
                <option value="réseau">Réseau</option>
                <option value="design">Design</option>
            </select>
            <small class="error"></small>
        </div>

        <div class="field">
            <label>Adresse</label>
            <input type="text" placeholder="Ex: Dakar, Yoff">
            <small class="error"></small>
        </div>

        <div class="btns">
            <button type="button" class="cancel">Annuler</button>
            <button type="submit" class="save">Enregistrer</button>
        </div>

    </form>
</div>
