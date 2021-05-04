<?php include './views/header.php' ;?>

<?php var_dump($movies); die(); ?>
<p>Page des films :</p>

<?php if(sizeof($movies) > 0) :?>
    <?php foreach ($movies as $movie): ?>
        <p><?= $movie->getTitle() ?></p>
    <?php endforeach ;?>
<?php endif ;?>

<?php include './views/footer.php'; ?>