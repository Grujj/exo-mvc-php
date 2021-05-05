<?php include './ressources/views/header.php' ;?>

<p>Page des utilisateurs :</p>

<?php if(sizeof($this->users) > 0) :?>
    <?php foreach ($this->users as $user): ?>
        <p><?= $user->getPseudo() ?></p>
    <?php endforeach ;?>
<?php endif ;?>

<?php include './ressources/views/footer.php'; ?>