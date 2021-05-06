<?php include './ressources/views/header.php' ;?>

<main id="displayAllMovies">
    <h1>Page des films :</h1>
    <p class="intro">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet similique perferendis enim nesciunt assumenda aliquam rerum laboriosam dolores nulla soluta, adipisci provident porro ipsa quaerat distinctio asperiores consequuntur aspernatur nihil.</p>
    <h2><a href="index.php?controller=movie&action=add">Ajouter un film</a></h2>
    <section>
        <?php if(sizeof($this->movies) > 0) :?>
            <?php foreach ($this->movies as $movie): ?>

                <figure id="figure<?= $movie->getIdMovie()?>">
                    <div>
                        <img src="<?= $movie->getPosterSrc() ?>" alt="<?= $movie->getPosterAlt() ?>">
                        <figcaption><h2><?= $movie->getTitle() ?></h2></figcaption>
                    </div>
                    <div>
                        <p><?= $movie->getDescription() ?></p>
                        <a href="index.php?controller=movie&action=findOne&id=<?= $movie->getIdMovie() ?>">En savoir plus</a>
                        <a href="index.php?controller=movie&action=delete&id=<?= $movie->getIdMovie() ?>">Supprimer ce film</a>
                    </div>
                    
                </figure>   

            <?php endforeach ;?>
        <?php endif ;?>
    </section>
</main>
<?php include './ressources/views/footer.php'; ?>