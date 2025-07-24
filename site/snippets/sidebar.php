<nav class="l-sidebar c-sidebar" aria-label="Sommaire">
  <h2 class="c-sidebar__title">Manuel du Projet de fin d'études</h2>
  <ul class="c-sidebar__chapters">
    <?php foreach ($site->children()->listed() as $chapter): ?>
      <?php
      $isActive = $page->is($chapter);
      $chapterColor = Str::slug($chapter->couleur()->value());
      ?>
      <li class="c-sidebar__item <?= $isActive ? 'is-active' : '' ?>">
        <a href="<?= $chapter->url() ?>" class="c-sidebar__link chapter-color--<?= $chapterColor ?>">
          <span class="c-sidebar__icon">
            <?= snippet('icon', ['type' => $chapterColor]) ?>
          </span>
          <?= $chapter->title()->esc() ?>
        </a>

        <?php if ($isActive && $chapter->hasChildren()): ?>
          <ul class="c-sidebar__sections">
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
    <div class="c-sidebar__branding">
      <img
        src="<?= url('assets/images/logo_MEDIA_rvb.png') ?>"
        alt="Logo du Media Design Lab"
        class="c-sidebar__logo"
      />
      <p class="c-sidebar__version">
        v0.1<br>
        <a href="https://www.lecolededesign.com" target="_blank" rel="noopener"><small>Media Design Lab</small></a>
      </p>
    </div>
  </footer>
</nav>