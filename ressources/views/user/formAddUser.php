<?php include './ressources/views/header.php' ;?>

<main id="formAddUser">

    <p><?= $this->message ?></p>
    
    <form action="index.php?controller=user&action=add" method="post">

        <p>
            <label for="pseudo">Pseudo : </label>
            <input id="pseudo" name="pseudo" type="text" required>
        </p>
        
        <p>
            <label for="email">Email : </label>
            <input id="email" name="email" type="text" required>
        </p>
        
        <p>
            <label for="password">Mot de passe : </label>
            <input id="password" name="password" type="password" required>
        </p>
       
        <p>
            <button type="submit">Enregistrer</button>
        </p>
        
    </form>
    
</main>

<?php include './ressources/views/footer.php'; ?>