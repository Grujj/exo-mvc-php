<?php include './ressources/views/header.php' ;?>

<p>Page des films :</p>

<?php if(sizeof($this->movies) > 0) :?>
    <?php foreach ($this->movies as $movie): ?>
        <p><?= $movie->getTitle() ?></p>
    <?php endforeach ;?>
<?php endif ;?>

<?php include './ressources/views/footer.php'; ?>