<section class="team">
    <h2 role="heading" aria-level="2"><?= get_field('team-title', false, false); ?></h2>
    <div class="team__container">
        <div class="team__container__slider">
            <?php if (have_rows('team-list')):
                while (have_rows('team-list')):
                    the_row();
                    $photo = get_sub_field('photo');
                    $name = get_sub_field('name');
                    $status = get_sub_field('status');
                    ?>
                    <div class="team__container__slider__slide">
                        <div class="team__container__slider__slide__item">
                            <div class="team__container__slider__slide__item__img">
                                <img src="<?= $photo; ?>" alt="Photo de la personne">
                            </div>
                            <p><?= $name; ?></p>
                            <span><?= $status; ?></span>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
        <div class="team__container__slider">
            <?php if (have_rows('team-list')):
                while (have_rows('team-list')):
                    the_row();
                    $photo = get_sub_field('photo');
                    $name = get_sub_field('name');
                    $status = get_sub_field('status');
                    ?>
                    <div class="team__container__slider__slide">
                        <div class="team__container__slider__slide__item">
                            <div class="team__container__slider__slide__item__img">
                                <img src="<?= $photo; ?>" alt="Photo de la personne">
                            </div>
                            <p><?= $name; ?></p>
                            <span><?= $status; ?></span>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
    </div>
</section>
