<?php snippet('header'); ?>
<?php snippet('sidebar'); ?>

<main id="content" role="main" class="l-main t-chapter">
    <h1 class="t-chapter__title"><?= $page->title() ?></h1>

    <?php if ($page->intro()->isNotEmpty()): ?>
        <div class="t-chapter__intro">
            <?= $page->intro()->kirbytext() ?>
        </div>
    <?php endif ?>

    <?php if ($page->children()->listed()->count()): ?>
        <nav class="c-navigation c-navigation--subchapters">
            <ul class="c-navigation__list">
                <?php foreach ($page->children()->listed() as $subchapter): ?>
                    <li class="c-navigation__item">
                        <a href="<?= $subchapter->url() ?>" class="c-navigation__link">
                            <?= $subchapter->title() ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
    <?php endif ?>

    <div class="t-chapter__content">
        <?php foreach ($page->sections()->toLayouts() as $section): ?>
            <section class="t-chapter__section <?= $section->css_classes()->esc() ?>" id="<?= $section->id() ?>">
                <?php foreach ($section->columns() as $column): ?>
                    <div class="t-chapter__column" style="--span:<?= $column->span() ?>">
                        <div class="t-chapter__block-container">
                            <?php
                            foreach ($column->blocks() as $block):
                                if ($block->type() === "text") {
                                    echo $block->text()->kirbytext();
                                } else {
                                    echo $block;
                                }
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </section>
        <?php endforeach ?>
    </div>

    <?php snippet('chapter-navigation') ?>
    <?= js('assets/js/app.js') ?>
</main>
