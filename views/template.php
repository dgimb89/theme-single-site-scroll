<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $view->render('head') ?>
    <?php $view->style('theme', 'theme:css/theme.css') ?>
    <?php $view->script('SmoothScroll', 'theme:js/SmoothScroll.min.js') ?>
    <?php $view->script('theme', 'theme:js/theme.js') ?>
</head>
<body id="start">

    <div class="video-background">
        <div class="video-foreground">
            <iframe src="<?= $params['video_background'] ?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <div class="uk-height-viewport uk-text-center">
        <h1><?= $params['title'] ?></h1>
        <?php if ($params['logo']) : ?>
            <img class="tm-logo grow uk-container-center" src="<?= $this->escape($params['logo']) ?>" alt="<?= $params['title'] ?>">
            <img class="tm-logo-contrast grow uk-container-center" src="<?= ($params['logo_contrast']) ? $this->escape($params['logo_contrast']) : $this->escape($params['logo']) ?>" alt="<?= $params['title'] ?>">
        <?php endif ?>
    </div>

    <div>
        <nav class="tm-navbar uk-navbar">

            <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                <div class="uk-navbar-flip">
                    <?= $view->menu('main', 'menu-navbar.php') ?>
                    <?= $view->position('navbar', 'position-blank.php') ?>
                </div>
            <?php endif ?>

        </nav>

        <?php if ($view->position()->exists('hero')) : ?>
            <div id="tm-hero" class="tm-hero uk-block uk-block-large uk-cover-background uk-flex uk-flex-middle uk-height-viewport <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?> <?= $params['classes.parallax'] ?>>
                <div class="uk-container uk-container-center">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('hero', 'position-grid.php') ?>
                    </section>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('top')) : ?>
            <div id="tm-top" class="tm-top uk-block <?= $params['top_style'] ?>">
                <div class="uk-container uk-container-center">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('top', 'position-grid.php') ?>
                    </section>

                </div>
            </div>
        <?php endif; ?>

        <div id="tm-main" class="tm-main uk-block <?= $params['main_style'] ?>">
            <div class="uk-container uk-container-center">

                <div class="uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-medium-3-4' : 'uk-width-1-1'; ?>">
                        <?= $view->render('content') ?>
                    </main>

                    <?php if ($view->position()->exists('sidebar')) : ?>
                        <aside class="uk-width-medium-1-4 <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                            <?= $view->position('sidebar', 'position-panel.php') ?>
                        </aside>
                    <?php endif ?>

                </div>

            </div>
        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
            <div id="tm-bottom" class="tm-bottom uk-block <?= $params['bottom_style'] ?>">
                <div class="uk-container uk-container-center">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('bottom', 'position-grid.php') ?>
                    </section>

                </div>
            </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('footer')) : ?>
            <div id="tm-footer" class="tm-footer uk-block uk-block-secondary uk-contrast">
                <div class="uk-container uk-container-center">

                    <section class="uk-grid uk-grid-match" data-uk-grid-margin>
                        <?= $view->position('footer', 'position-grid.php') ?>
                    </section>

                </div>
            </div>
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
    </div>

    <?= $view->render('footer') ?>

</body>
</html>
