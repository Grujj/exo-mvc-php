<?php include './ressources/views/header.php' ;?>

<main id="displayAllMovies">
    <h1>Page des films :</h1>
    <p class="intro">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet similique perferendis enim nesciunt assumenda aliquam rerum laboriosam dolores nulla soluta, adipisci provident porro ipsa quaerat distinctio asperiores consequuntur aspernatur nihil.</p>
    <section>
        <?php if(sizeof($this->movies) > 0) :?>
            <?php foreach ($this->movies as $movie): ?>

                <figure id="figure<?= $movie->getIdMovie()?>">
                    <div>
                        <img src="<?= $movie->getPosterSrc() ?>" alt="<?= $movie->getPosterAlt() ?>">
                        <figcaption><h2><?= $movie->getTitle() ?></h2></figcaption>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque incidunt fuga nisi quidem aut ab a aliquid itaque atque facilis. Aliquam dolor aspernatur aperiam quo architecto, soluta voluptas placeat assumenda.</p>
                        <a href="index.php?controller=movie&action=findOne&id=<?= $movie->getIdMovie() ?>">En savoir plus</a>
                    </div>
                    
                </figure>   

            <?php endforeach ;?>
        <?php endif ;?>
    </section>
</main>
<?php include './ressources/views/footer.php'; ?>