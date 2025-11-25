<div class="classe-content">

    <div class="classe-header">
        <h1>Liste des classes</h1>
        <p>Gestion des classes du système</p>
        <div class="classe-filters">
            
            <!-- Filtre par niveau -->
            <form class="classe-filter-form">
                <div>
                    <input type="text" placeholder="Chercher un niveau...">
                </div>
                <button type="submit">Filtrer</button>
            </form>
            <!-- Filtre par filière -->
            <form class="classe-filter-form">
                <div>
                    <input type="text" placeholder="Chercher une filière...">
                </div>
                <button type="submit">Filtrer</button>
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
        
        <div class="classe-card">
            <div class="classe-card-actions">
                <a href="#" class="c-view"><i class="fas fa-eye"></i></a>
                <a href="#" class="c-edit"><i class="fas fa-edit"></i></a>
                <a href="#" class="c-delete"><i class="fas fa-trash"></i></a>
            </div>
            <div class="classe-card-header">
                <h3>Classe A1</h3>
                <span class="classe-code">C-A1</span>
            </div>
            <div class="classe-card-body">
                <p><strong>Libellé :</strong> Informatique</p>
                <p><strong>Filière :</strong> Développement</p>
                <p><strong>Niveau :</strong> Licence 1</p>
            </div>
        </div>
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
            <tr>
                <td>C-A1</td>
                <td>Informatique</td>
                <td>Développement</td>
                <td>Licence 1</td>
                <td class="classe-table-actions">
                    <a href="#" class="ct-view"><i class="fas fa-eye"></i></a>
                    <a href="#" class="ct-edit"><i class="fas fa-edit"></i></a>
                    <a href="#" class="ct-delete"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
