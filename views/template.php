<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $view->render('head') ?>
    <?php $view->style('theme', 'theme:css/theme.css') ?>
    <?php $view->script('SmoothScroll', 'theme:js/SmoothScroll.min.js') ?>
    <?php $view->script('theme-pnp', 'theme:js/custom.js', ['jquery']) ?>
    <?php $view->script('theme', 'theme:js/theme.js', ['jquery']) ?>
</head>
<body id="start">
    <div class="uk-height-viewport uk-text-center">
        <h1><?= $params['title'] ?></h1>
        <?php if ($params['logo']) : ?>
            <img class="tm-logo grow uk-container-center" src="<?= $this->escape($params['logo']) ?>" alt="<?= $params['title'] ?>">
            <img class="tm-logo-contrast grow uk-container-center" src="<?= ($params['logo_contrast']) ? $this->escape($params['logo_contrast']) : $this->escape($params['logo']) ?>" alt="<?= $params['title'] ?>">
        <?php endif ?>
    </div>

    <section>
        <nav class="tm-navbar uk-navbar">
            <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                <div class="uk-navbar-flip">
                    <?= $view->menu('main', 'menu-navbar.php') ?>
                    <?= $view->position('navbar', 'position-blank.php') ?>
                </div>
            <?php endif ?>

        </nav>

        <?php if ($view->position()->exists('hero')) : ?>
            <?= $view->position('hero', 'position-grid.php') ?>
        <?php endif; ?>


        <?php if ($view->position()->exists('top')) : ?>
            <?= $view->position('top', 'position-grid.php') ?>
        <?php endif; ?>


        <div class="uk-width-medium-1-1 uk-block">
            <main id="content" class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                <?= $view->render('content') ?>
            </main>

            <?php if ($view->position()->exists('sidebar')) : ?>
                <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                    <?= $view->position('sidebar', 'position-panel.php') ?>
                </aside>
            <?php endif ?>
        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
            <?= $view->position('bottom', 'position-grid.php') ?>
        <?php endif; ?>


        <?php if ($view->position()->exists('footer')) : ?>
            <?= $view->position('footer', 'position-grid.php') ?>
        <?php endif; ?>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
            <div id="offcanvas" class="uk-offcanvas">
                <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">

                    <?php if ($params['logo_offcanvas']) : ?>
                        <div class="uk-panel uk-text-center">
                            <a href="<?= $view->url()->get() ?>">
                                <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                            </a>
                        </div>
                    <?php endif ?>

                    <?php if ($view->menu()->exists('offcanvas')) : ?>
                        <?= $view->menu('offcanvas', ['class' => 'uk-nav-offcanvas']) ?>
                    <?php endif ?>

                    <?php if ($view->position()->exists('offcanvas')) : ?>
                        <?= $view->position('offcanvas', 'position-panel.php') ?>
                    <?php endif ?>

                </div>
            </div>
        <?php endif ?>
    </section>

    <div class="video-background">
        <div class="video-foreground">
            <iframe src="<?= $params['video_background'] ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <?= $view->render('footer') ?>

</body>
</html>
