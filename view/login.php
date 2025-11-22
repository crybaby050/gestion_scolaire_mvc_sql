<div class="logContain">
    <div class="logimg"></div>
    <div class="logform">
        <form action="" method="post">
            <div class="h1">
                <img src="/../image/school logo.jpg" alt="">
            </div>
            <div>
                <label for="">Mail</label>
                <input type="text" placeholder="Ex: monmail@gmail.com" name="mail">
                <i class="fa-solid fa-envelope"></i>
                <p><?= $error ?? '' ?></p>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" placeholder="mon mot de passe" name="mdp">
                <i class="fa-solid fa-eye"></i>
                <p><?= $error ?? '' ?></p>
            </div>
            <button type="submit" name="log" >Se Connecter</button>
        </form>
    </div>
</div>