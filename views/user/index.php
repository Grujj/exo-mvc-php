<?php include './views/header.php' ;?>


<?php var_dump($users); die(); ?>
<p>Page des utilisateurs :</p>

<?php if(sizeof($users) > 0) :?>
    <?php foreach ($users as $user): ?>
        <p><?= $user->getPseudo() ?></p>
    <?php endforeach ;?>
<?php endif ;?>

<?php include './views/footer.php'; ?>