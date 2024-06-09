<section class="benevole column">
    <div class="column__content benevole__content">
        <h2 role="heading" aria-level="2"><?= get_field('benevole-title', 'options', false); ?></h2>
        <p><?= get_field('benevole-text', 'options'); ?></p>
        <ul>
            <?php if (have_rows('benevole-conditions-list', 'options')) :
                while (have_rows('benevole-conditions-list', 'options')) :
                    the_row();
                    $text = get_sub_field('condition-text', 'options');
                    ?>
                    <li>
                        <p><?= $text; ?></p>
                    </li>
                <?php endwhile;
            endif; ?>
        </ul>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('benevole-first-link-url', 'options'); ?>"><?= get_field('benevole-first-link-text', 'options'); ?></a>
            <a class="secondary" href="<?= get_field('benevole-second-link-url', 'options'); ?>"><?= get_field('benevole-second-link-text', 'options'); ?></a>
        </div>
    </div>
    <div class="column__img benevole__img mobile_hidden">
        <img src="<?= get_field('benevole-img', 'options'); ?>" alt="">
    </div>
</section>