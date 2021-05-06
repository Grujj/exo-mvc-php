<?php include './ressources/views/header.php' ;?>

<main id="displayMovieDetails">
    
    <section>
        <?php if(sizeof($this->movies) > 0) :?>
            <?php foreach ($this->movies as $movie): ?>
                <h1><?= $movie->getTitle() ?> :</h1>
                <p><?= $movie->getDescription() ?></p>
                <figure>
                    <div>
                        <img src="<?= $movie->getPosterSrc() ?>" alt="<?= $movie->getPosterAlt() ?>">
                    </div>
                    <div>
                        <p><?= $movie->getCritic() ?></p>
                        <a href="index.php?controller=movie&action=findAll">Retour à la liste</a>
                    </div>
                    
                </figure>   

            <?php endforeach ;?>
        <?php endif ;?>
    </section>
</main>
<?php include './ressources/views/footer.php'; ?>