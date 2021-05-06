<?php include './ressources/views/header.php' ;?>

<p>Page des utilisateurs :</p>

<?php if(sizeof($this->users) > 0) :?>
    <?php foreach ($this->users as $user): ?>
        <p>
            <?= $user->getPseudo() ?>
            <a href="index.php?controller=user&action=delete&id=<?= $user->getIdUser() ?>">X</a>
        </p>
    <?php endforeach ;?>
<?php endif ;?>

<a href="index.php?controller=user">Retour</a>

<?php include './ressources/views/footer.php'; ?>