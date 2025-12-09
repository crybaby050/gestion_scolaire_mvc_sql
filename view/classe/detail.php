<div class="cla-details-wrapper">
    <div class="banner-classe"></div>
    <div class="cla-detail-card">
        <!-- Image décorative -->
        <div class="cla-details-decor">
            <img src="/../image/school logo.jpg" alt="Décor" class="etu-details-img">
        </div>
        <diV class="inf-cls-head">
            <h3>INFORMATION DE LA CLASSE</h3>
        </div>
        <div>
            <div class="line">
                <span>Nom</span>
                <span><?= $classe['libelle'] ?></span>
            </div>
            <div class="line">
                <span>Code</span>
                <span><?= $classe['code'] ?></span>
            </div>
            <div class="line">
                <span>Niveau</span>
                <span><?= $classe['niveau'] ?></span>
            </div>
            <div class="line">
                <span>Filière</span>
                <span><?= $classe['filiere'] ?></span>
            </div>
            <div class="line">
                <span>Nombre d'élèves associer </span>
                <span><?= $nb ?></span>
            </div>
        </div>
    </div>
    <!-- Checkbox caché -->
    <input type="checkbox" id="switchetu" hidden>
    <!-- Le bouton qui agit comme switch -->
    <label for="switchetu" class="switchetu-btn">Changer d'affichage</label>
    <div class="cls-assoc">
        <h3>ETUDIANTS ASSOCIER</h3>
        <!-- SECTION : CARDS -->
        <div class="card-container view-card">
            <?php foreach ($etudiants as $etudiant): ?>
                <div class="student-card">
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
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>