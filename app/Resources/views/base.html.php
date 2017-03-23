<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title><?php $view['slots']->output('title', 'Docsman') ?></title>
        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
        <?php $view['slots']->output('stylesheets') ?>
        <link rel="icon" type="image/x-icon" href="<?php echo $view['assets']->getUrl('favicon.ico') ?>" />
    </head>
    <body>
        <?php $view['slots']->output('body') ?>
        <?php $view['slots']->output('javascripts') ?>
    </body>
</html>
