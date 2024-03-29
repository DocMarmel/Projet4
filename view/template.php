
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; min-scale=1.0; max-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/img/favicon.png">
    <!-- CDN TinyMCE -->
    <script src="public/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#tinymce',
        language: 'fr_FR'
      });
    </script>

    <title><?= $title ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <?php include 'includes/navbar.php'; ?>
      </header>
      <div id="content">
        <?= $content ?>
      </div>
      <footer id="footer">
        <p>Copyright © 2019 Jean FORTEROCHE - <a href="index.php?action=legalnotice">Mentions légales</a></p>
      </footer>
    </div>
  </body>
</html>
