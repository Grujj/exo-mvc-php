<?php include './ressources/views/header.php' ;?>

<main id="formAddUser">

    <p><?= $this->message ?></p>
    
    <form action="index.php?controller=user&action=connect" method="post">
        
        <p>
            <label for="email">Email : </label>
            <input id="email" name="email" type="text" required>
        </p>
        
        <p>
            <label for="password">Mot de passe : </label>
            <input id="password" name="password" type="password" required>
        </p>
       
        <p>
            <button type="submit">Se connecter</button>
        </p>
        
    </form>

    <a href="index.php?controller=user&action=add">Créer un compte</a>
    
</main>

<?php include './ressources/views/footer.php'; ?>