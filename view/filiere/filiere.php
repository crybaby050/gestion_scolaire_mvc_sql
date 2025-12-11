<div class="fil-content">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'add-success'): ?>
        <div class="popup-success">
            Classe enregistrer avec succès !
        </div>
    <?php endif; ?>
    <div class="filajout">
        <h3>Ajouter une filiere</h3>
        <div class="filform">
            <form action="" method="post">
                <div>
                    <input type="text" placeholder="Nouveau filiere" name="lib">
                <p><?= $error ?? "" ?></p>
                </div>
                <!-- bcGtdMil08    ne pas supprimer mot de passe de compte -->
                <button type="submit" name="add_fil">Ajouter</button>
            </form>
        </div>
    </div>
    <div class="filist">
        <h3>Liste des filieres</h3>
        <div class="filcard">
            <?php foreach($filieres as $filiere): ?>
            <div class="fil-card">
                <div class="fil-elem">
                    <div class="filicone">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <div class="fil-info">
                        <div class="filem">
                            <span><strong>Libelle :</strong><?= $filiere['libelle'] ?></span>
                            <span><strong>Nombre de classe Associer :</strong><?= countClasseFromFiliere($filiere['id']) ?></span>
                        </div>
                        <div class="detail-fil">
                            <!-- <a href="#" class="det-fil"><i class="fas fa-eye"></i></a> -->
                            <a href="#" class="rem-fil"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>