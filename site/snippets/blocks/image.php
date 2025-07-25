<figure class="c-figure">
  <img src="<?= $block->image()->toFile()?->url() ?>" alt="<?= $block->alt()->esc() ?>" />
  <?php if ($block->caption()->isNotEmpty()): ?>
    <figcaption><?= $block->caption()->kirbytextinline() ?></figcaption>
  <?php endif ?>
</figure>
