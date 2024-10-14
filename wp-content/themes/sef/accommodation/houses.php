<section class="houses" data-animation="showUp">
    <h2 role="heading" aria-level="2" class="hidden">Listes de nos maisons</h2>
    <ul role="list" class="houses__list">
        <?php if (have_rows('houses-list')):
            while (have_rows('houses-list')): the_row();
                $name = get_sub_field('name');
                $address = get_sub_field('address');
                $info1 = get_sub_field('info-1');
                $info2 = get_sub_field('info-2');
                $text = get_sub_field('text');
                $warning = get_sub_field('warning');
                $img = get_sub_field('img');
                ?>
                <li class="houses__list__item column" data-animation="showUp">
                    <div class="houses__list__item__img column__img">
                        <img src="<?= $img; ?>" alt="Photo de la maison">
                    </div>
                    <div class="houses__list__item__content column__content">
                        <div class="houses_upper">
                            <h3 role="heading" aria-level="3"><?= $name; ?></h3>
                            <p class="address"><?= $address; ?></p>
                        </div>
                        <ul>
                            <li>
                                <?= $info1; ?>
                            </li>
                            <li>
                                <?= $info2; ?>
                            </li>
                        </ul>
                        <p><?= $text; ?></p>
                        <p><b>Attention:</b> <?= $warning; ?></p>
                        <div class="cta_group">
                            <a class="primary"
                               href="<?= get_sub_field('link-url-1'); ?>"><?= get_sub_field('link-text-1'); ?></a>
                            <a class="secondary"
                               href="<?= get_sub_field('link-url-2'); ?>"><?= get_sub_field('link-text-2'); ?><span class="icon-arrow-right2"></span></a>
                        </div>
                    </div>
                </li>
            <?php endwhile; endif; ?>
    </ul>
</section>
