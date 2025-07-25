<nav class="l-sidebar c-sidebar" aria-label="Sommaire">
  <div class="c-sidebar__header">
    <h2 class="c-sidebar__title">Le Projet de Fin d'Études</h2>
    <p class="c-sidebar__subtitle">Manuel pour étudiant·e en design</p>
  </div>

  <ul class="c-sidebar__chapters">
    <?php foreach ($site->children()->listed() as $chapter): ?>
      <?php
      $isActive = $page->is($chapter);
      $isOpen = $isActive || $page->isDescendantOf($chapter);
      $chapterColor = $chapter->couleur()->or('#000'); // couleur hex
      $chapterIcon = $chapter->icone()->or('📄'); // emoji ou caractère
      ?>
      <li class="c-sidebar__item
                 <?= $isActive ? 'is-active' : '' ?>
                 <?= $isOpen ? 'is-open' : '' ?>
                 <?= $chapter->hasChildren() ? 'js-toggleable' : '' ?>"
          data-color="<?= $chapterColor ?>">

        <div class="c-sidebar__link" style="--chapter-color: <?= $chapterColor ?>;">
          <span class="c-sidebar__icon"><?= $chapterIcon ?></span>

          <a href="<?= $chapter->url() ?>" class="c-sidebar__text">
            <?= $chapter->title()->esc() ?>
          </a>

          <?php if ($chapter->hasChildren()): ?>
            <button class="c-sidebar__chevron-toggle" aria-label="Dérouler le chapitre">
              <span class="c-sidebar__chevron">›</span>
            </button>
          <?php endif ?>
        </div>

        <?php if ($chapter->hasChildren()): ?>
          <ul class="c-sidebar__sections" <?= $isOpen ? '' : 'style="display: none;"' ?>>
            <?php foreach ($chapter->children()->listed() as $subpage): ?>
              <li class="<?= $page->is($subpage) ? 'is-current' : '' ?>">
                <a href="<?= $subpage->url() ?>">
                  <?= $subpage->title()->esc() ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        <?php endif ?>

        <?php if ($isActive): ?>
          <ul class="c-sidebar__anchors">
            <?php foreach ($page->content()->get('blocks')->toBlocks() as $block): ?>
              <?php if ($block->type() === 'heading' && $block->level()->toInt() === 2): ?>
                <li>
                  <a href="#<?= Str::slug($block->text()) ?>"><?= $block->text() ?></a>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </li>
    <?php endforeach ?>
  </ul>

  <footer class="c-sidebar__footer">
    <div class="c-sidebar__footer-grid">
      <div class="c-sidebar__footer-text">
        <div class="c-sidebar__version">v0.1</div>
        <div class="c-sidebar__lab">
          <a href="https://media-design-lab.notion.site/Media-Design-lab-1d80d4c7c5998046baf6d512b47dc37f?source=copy_link" target="_blank" rel="noopener">
            <small>Media Design Lab</small>
          </a>
        </div>
      </div>
      <div class="c-sidebar__footer-logo">
        <img src="<?= url('assets/images/logo_MEDIA_rvb.png') ?>" alt="Logo du Media Design Lab" class="c-sidebar__logo" />
      </div>
    </div>
  </footer>
</nav>
