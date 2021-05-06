<?php include './ressources/views/header.php' ;?>

<main id="formAddUser">
    
    <form action="index.php?controller=movie&action=add" method="post">
        <p>
            <label for="title">Titre : </label>
            <input id="title" name="title" type="text" required>
        </p>

        <p>
            <label for="poster">Lien source de l'affiche : </label>
            <input id="poster_src" name="poster_src" type="text" required>
        </p>

        <p>
            <label for="poster">Attribut alt de l'affiche : </label>
            <input id="poster_alt" name="poster_alt" type="text" required>
        </p>

        <p>
            <label for="critic">Critique : </label>
            <textarea name="critic" id="critic" cols="30" rows="10"></textarea>
        </p>

        <p>
            <label for="description">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </p>
        
        <p>
            <button type="submit">Enregistrer</button>
        </p>

    </form>
    
</main>

<?php include './ressources/views/footer.php'; ?>