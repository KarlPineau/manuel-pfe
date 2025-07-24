<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?= $page->title() ?> | <?= $site->title() ?></title>
  <meta name="description" content="<?= $page->excerpt()->or($site->description())->esc() ?>"/>

  <!-- OG & Twitter Cards -->
  <meta property="og:title" content="<?= $page->title() ?>"/>
  <meta property="og:description" content="<?= $page->excerpt()->or($site->description())->esc() ?>"/>
  <meta property="og:image" content="<?= $site->url() ?>/assets/images/share.jpg"/>
  <meta name="twitter:card" content="summary_large_image"/>

  <!-- CSS & Print -->
  <?= css([
    'assets/css/main.css',
    'assets/css/print.css' => '@media print'
  ]) ?>

  <?php if (param('print')): ?>
    <script src="//unpkg.com/pagedjs/dist/paged.polyfill.js"></script>
  <?php endif ?>
</head>

<body class="v-web">
<div id="top"></div>
<header class="l-header c-header">
  <div class="c-header__container">
    <div class="c-header__left">
      <input type="checkbox" id="burger-toggle" class="c-burger__checkbox" hidden>
      <label for="burger-toggle" class="c-burger" aria-label="Ouvrir le menu">
        <span class="c-burger__bar"></span>
        <span class="c-burger__bar"></span>
        <span class="c-burger__bar"></span>
      </label>


      <nav class="c-breadcrumb" aria-label="Fil d’Ariane">
        <a href="<?= $site->url() ?>">Accueil</a>
        <?php foreach ($page->parents()->listed() as $parent): ?>
          <span>/</span>
          <a href="<?= $parent->url() ?>"><?= $parent->title()->esc() ?></a>
        <?php endforeach ?>
        <span>/</span>
        <span class="is-current"><?= $page->title()->esc() ?></span>
      </nav>
    </div>

    <div class="c-header__right">
      <span class="c-header__reading">⏱ <?= $page->readtime() ?> min</span>
      <div class="c-header__progress">
        <span class="c-header__progress-label">Progression</span>
        <?php $progress = $page->progress()->int() ?>
        <div class="c-header__progress-bar">
          <div class="c-header__progress-fill" style="width: <?= $progress ?>%"></div>
        </div>
        <span class="c-header__progress-value"><?= $progress ?>%</span>
      </div>
    </div>
  </div>
</header>