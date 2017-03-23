<?php $view->extend('::base.html.php') ?>

<?php $view['slots']->start('body') ?>
    <div id="app"></div>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('javascripts') ?>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('/react/survive/node_modules/babel-polyfill/dist/polyfill.js') ?>"></script>
    <script type="text/javascript" src="http://localhost:9000/vendor_bundle.js"></script>
    <script type="text/javascript" src="http://localhost:9000/app_bundle.js"></script>
<?php $view['slots']->stop() ?>
