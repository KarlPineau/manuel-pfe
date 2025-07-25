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
<?php
$depth = $page->depth();
$parents = $page->parents()->listed();

// Par défaut, on suppose que part = niveau 1, sub = niveau 2
if ($depth === 1) {
  $part = $page;
  $sub = null;
} elseif ($depth === 2) {
  $part = $page->parent();
  $sub = $page;
} else {
  $part = $parents->nth(1);     // niveau 1
  $sub =  $parents->first();      // niveau 2
}


function readingCategory($minutes): string {
  $minutes = (int) $minutes;

  if ($minutes <= 3) return 'Lecture express';
  if ($minutes <= 7) return 'Lecture rapide';
  if ($minutes <= 15) return 'Lecture complète';
  if ($minutes <= 25) return 'Lecture approfondie';
  return 'Long chapitre';
}

$words = 0;
foreach ($page->content()->fields() as $field) {
  $words += str_word_count(strip_tags($field->value()));
}
$readingTime = ceil($words / 200);

$category = readingCategory($readingTime);
$labelClass = match(true) {
  $readingTime <= 3 => 'v-express',
  $readingTime <= 7 => 'v-rapide',
  $readingTime <= 15 => 'v-complete',
  $readingTime <= 25 => 'v-longue',
  default => 'v-verylong',
};
?>

<header class="l-header c-header" id="site-header">
  <div class="c-header__container">
    <div class="c-header__left">
      <button id="burger-toggle" class="c-burger" aria-label="Ouvrir le menu">
        <span class="c-burger__bar"></span>
        <span class="c-burger__bar"></span>
        <span class="c-burger__bar"></span>
      </button>

      <div class="c-header__titles">
        <?php if ($part): ?>
          <div class="c-header__part"><?= $part->title()->esc() ?></div>
        <?php endif ?>
        <?php if ($sub): ?>
          <div class="c-header__chapter"><?= $sub->title()->esc() ?></div>
        <?php endif ?>
      </div>
    </div>

    <div class="c-header__right">
      <span class="c-header__reading <?= $labelClass ?>">⏱ <?= $readingTime ?> min – <?= readingCategory($category) ?></span>
      <a href="/version-pdf" class="c-header__download">📄 PDF</a>
    </div>
  </div>
</header>

<div class="l-progress c-progress-bar">
  <div class="c-progress-bar__fill" id="progress-bar"></div>
</div>
