<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgError ?></p>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>