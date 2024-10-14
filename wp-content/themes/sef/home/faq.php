<section class="faq column" data-animation="showUp">
    <div class="faq__content column__content">
        <h2><?= get_field('home-faq-title', false, false); ?></h2>
        <?php if (have_rows('home-faq-list')):
            while (have_rows('home-faq-list')): the_row(); ?>
                <p><?= get_sub_field('faq-text'); ?></p>
            <?php endwhile; endif; ?>
        <div class="cta_group">
            <a class="primary"
               href="<?= get_field('home-faq-first-link-url'); ?>"><?= get_field('home-faq-first-link-text'); ?></a>
            <a class="secondary"><?= get_field('home-faq-second-link-text'); ?><span class="icon-arrow-right2"></span></a>
        </div>
    </div>
    <div class="faq__question">
        <div class="faq__question__menu">
            <div class="faq__question__menu__title_benevole">
                <a href="#benevole"> <img src="<?= get_field('home-faq-first-title-icon'); ?>" alt=""></a>
                <a href="#benevole"><?= get_field('home-faq-first-title'); ?></a>
            </div>
            <div class="faq__question__menu__title_donate">
                <a href="#donate"> <img src="<?= get_field('home-faq-second-title-icon'); ?>" alt=""></a>
                <a href="#donate"><?= get_field('home-faq-second-title'); ?></a>
            </div>
            <div class="faq__question__menu__title_asbl">
                <a href="#asbl"> <img src="<?= get_field('home-faq-third-title-icon'); ?>" alt=""><a href="#asbl">
                        <a href="#asbl"><?= get_field('home-faq-third-title'); ?></a>
            </div>
        </div>
        <div class="faq__question__container">
            <div class="faq__question__container__first">
                <h3 id="benevole" class="title" role="heading"
                    aria-level="3"><?= get_field('home-faq-first-title'); ?></h3>
                <?php if (have_rows('home-faq-first-list')):
                    while (have_rows('home-faq-first-list')) :
                        the_row();
                        $question = get_sub_field('faq-question');
                        $answer = get_sub_field('faq-answer');
                        ?>
                        <article data-animation="showUp">
                            <h4 role="heading" aria-level="4" class="hidden"><?= $question;?></h4>
                            <input class="hidden" type="checkbox" id="arrow-faq-<?= $question; ?>">
                            <label class="first-label" for="arrow-faq-<?= $question; ?>">
                                <?= $question; ?>
                            </label>
                            <p><?= $answer; ?></p>
                        </article>
                    <?php endwhile; endif; ?>
            </div>
            <div class="faq__question__container__second">
                <h3 id="donate" role="heading" aria-level="3"><?= get_field('home-faq-second-title'); ?></h3>
                <?php if (have_rows('home-faq-second-list')):
                    while (have_rows('home-faq-second-list')) :
                        the_row();
                        $question = get_sub_field('faq-question');
                        $answer = get_sub_field('faq-answer');
                        ?>
                        <article>
                            <h4 role="heading" aria-level="4" class="hidden"><?= $question;?></h4>
                            <input class="hidden" type="checkbox" id="arrow-faq-<?= $question; ?>">
                            <label class="second-label" for="arrow-faq-<?= $question; ?>">
                                <?= $question; ?>
                            </label>
                            <p><?= $answer; ?></p>
                        </article>
                    <?php endwhile; endif; ?>
            </div>
            <div class="faq__question__container__third">
                <h3 id="asbl" role="heading" aria-level="3"><?= get_field('home-faq-third-title'); ?></h3>
                <?php if (have_rows('home-faq-third-list')):
                    while (have_rows('home-faq-third-list')) :
                        the_row();
                        $question = get_sub_field('faq-question');
                        $answer = get_sub_field('faq-answer');
                        ?>
                        <article>
                            <h4 role="heading" aria-level="4" class="hidden"><?= $question;?></h4>
                            <input class="hidden" type="checkbox" id="arrow-faq-<?= $question; ?>">
                            <label class="third-label" for="arrow-faq-<?= $question; ?>">
                                <?= $question; ?>
                            </label>
                            <p><?= $answer; ?></p>
                        </article>
                    <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
</section>