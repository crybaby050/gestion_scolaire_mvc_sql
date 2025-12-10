<div class="fil-content">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'update-success'): ?>
        <div class="popup-success">
            Classe modifié avec succès !
        </div>
    <?php endif; ?>
    <div class="filajout">
        <h3>Ajouter une filiere</h3>
        <div class="filform">
            <form action="" method="post">
                <input type="text" placeholder="Nouveau filiere" name="lib">
                <!-- bcGtdMil08    ne pas supprimer mot de passe de compte -->
                <button type="submit" name="add_fil">Ajouter</button>
            </form>
        </div>
    </div>
    <div class="filist">
        <h3>Liste des filieres</h3>
        <div class="filcard">
            <div class="fil-card">
                <div class="fil-elem">
                    <div class="filicone">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <div class="fil-info">
                        <div class="filem">
                            <span><strong>Libelle :</strong>Developement Web</span>
                            <span><strong>Nombre de classe Associer :</strong>3</span>
                        </div>
                        <div class="detail-fil">
                            <a href="#" class="det-fil"><i class="fas fa-eye"></i></a>
                            <a href="#" class="rem-fil"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>