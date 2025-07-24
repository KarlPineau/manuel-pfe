<?php
$orderedPages = $site->index()->listed();
$currentIndex = $orderedPages->indexOf($page);
$prev = $orderedPages->nth($currentIndex - 1);
$next = $orderedPages->nth($currentIndex + 1);
?>

<footer class="l-footer c-navchap">
  <nav aria-label="Navigation entre les chapitres">
    <div class="c-navchap__links">
      <div class="c-navchap__prev">
        <?php if ($prev): ?>
          <a href="<?= $prev->url() ?>" class="c-navchap__link c-navchap__link--prev">
            ← <?= $prev->title()->esc() ?>
          </a>
        <?php else: ?>
          <a href="<?= $site->url() ?>" class="c-navchap__link c-navchap__link--prev">
            ← Retour à l’accueil
          </a>
        <?php endif ?>
      </div>
      <div class="c-navchap__next">
        <?php if ($next): ?>
          <a href="<?= $next->url() ?>" class="c-navchap__link c-navchap__link--next">
            <?= $next->title()->esc() ?> →
          </a>
        <?php else: ?>
          <a href="<?= $site->url() ?>" class="c-navchap__link c-navchap__link--next">
            Retour à l’accueil →
          </a>
        <?php endif ?>
      </div>
    </div>

    <div class="c-navchap__top">
      <a href="#top" class="c-navchap__link c-navchap__link--top" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">
        ↑ Retour en haut
      </a>
    </div>
  </nav>
</footer>