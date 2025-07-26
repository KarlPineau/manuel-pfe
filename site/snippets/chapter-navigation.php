<?php
$orderedPages = $site->index()->listed();
$currentIndex = $orderedPages->indexOf($page);
$prev = $orderedPages->nth($currentIndex - 1);
$next = $orderedPages->nth($currentIndex + 1);
?>

<footer class="c-navchap">
  <nav aria-label="Navigation entre les chapitres">
    <div class="c-navchap__container">

      <div class="c-navchap__left">
        <?php if ($prev): ?>
          <a href="<?= $prev->url() ?>" class="c-navchap__link c-navchap__link--prev">
            ← <?= $prev->title()->esc() ?>
          </a>
        <?php else: ?>
          <span class="c-navchap__link c-navchap__link--disabled">← Début du manuel</span>
        <?php endif ?>
      </div>

      <div class="c-navchap__center">
        <?php if ($next): ?>
          <a href="<?= $next->url() ?>" class="c-navchap__link c-navchap__link--next">
            <?= $next->title()->esc() ?> →
          </a>
        <?php else: ?>
          <span class="c-navchap__link c-navchap__link--disabled">Fin du manuel →</span>
        <?php endif ?>
      </div>

      <div class="c-navchap__right">
        <a href="#top"
           class="c-navchap__top-button"
           aria-label="Remonter en haut de la page"
           onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
          ↑
        </a>
      </div>

    </div>
  </nav>
</footer>
