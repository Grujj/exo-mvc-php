<?php include './ressources/views/header.php' ;?>

<main id="displayMovieDetails">
    
    <section>
        <?php if(sizeof($this->movies) > 0) :?>
            <?php foreach ($this->movies as $movie): ?>
                <h1><?= $movie->getTitle() ?> :</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque incidunt fuga nisi quidem aut ab a aliquid itaque atque facilis. Aliquam dolor aspernatur aperiam quo architecto, soluta voluptas placeat assumenda.</p>
                <figure>
                    <div>
                        <img src="<?= $movie->getPosterSrc() ?>" alt="<?= $movie->getPosterAlt() ?>">
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque incidunt fuga nisi quidem aut ab a aliquid itaque atque facilis. Aliquam dolor aspernatur aperiam quo architecto, soluta voluptas placeat assumenda.</p>
                        <a href="index.php?controller=movie&action=findAll">Retour à la liste</a>
                    </div>
                    
                </figure>   

            <?php endforeach ;?>
        <?php endif ;?>
    </section>
</main>
<?php include './ressources/views/footer.php'; ?>