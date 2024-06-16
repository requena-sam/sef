<footer class="footer">
    <section class="footer__upper">
    <h2 role="heading" aria-level="2" class="hidden">Footer</h2>
        <article class="footer__upper__bank">
            <h3 role="heading" aria-level="3">Numéro de compte bancaire</h3>
            <p><?= get_field('footer-bank-number', 'options'); ?></p>
            <h3 role="heading" aria-level="3">Numéro de contact</h3>
            <a href="tel:<?= get_field('footer-number', 'options'); ?>"><?= get_field('footer-number', 'options'); ?></a>
        </article>
        <div class="footer__upper__lists">
            <div class="footer__upper__lists__contribution">
                <h3 role="heading" aria-level="3">Contribution</h3>
                <ul>
                    <?php if (have_rows('footer-contribution', 'options')):
                        while (have_rows('footer-contribution', 'options')) :
                            the_row();
                            $url = get_sub_field('footer-contribution-url');
                            $text = get_sub_field('footer-contribution-text');
                            ?>
                            <li><a href="<?= $url; ?>" title="Lien vers la page <?= $text; ?>"><?= $text; ?></a></li>
                        <?php endwhile; endif; ?>
                </ul>
            </div>
            <div class="footer__upper__lists__follow">
                <h3 role="heading" aria-level="3">Nous suivre</h3>
                <ul>
                    <?php if (have_rows('footer-follow', 'options')):
                        while (have_rows('footer-follow', 'options')) :
                            the_row();
                            $url = get_sub_field('footer-follow-url');
                            $text = get_sub_field('footer-follow-text');
                            ?>
                            <li><a href="<?= $url; ?>" title="Lien vers la page <?= $text; ?>"><?= $text; ?></a></li>
                        <?php endwhile; endif; ?>
                </ul>
            </div>
            <div class="footer__upper__lists__navigation">
                <h3 role="heading" aria-level="3">Navigation <span class="hidden">secondaire</span></h3>
                <ul>
                    <?php if (have_rows('footer-navigation', 'options')):
                        while (have_rows('footer-navigation', 'options')) :
                            the_row();
                            $url = get_sub_field('footer-navigation-url');
                            $text = get_sub_field('footer-navigation-text');
                            ?>
                            <li><a href="<?= $url; ?>" title="Lien vers la page <?= $text; ?>"><?= $text; ?></a></li>
                        <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>
    </section>
    <section class="footer__bottom">
        <h2 role="heading" class="hidden" aria-level="2">Footer end</h2>
        <p>&copy;2024 Service d'entraide familiale. Tous droits réservés.</p>
        <div class="footer__bottom__left">
            <p>
                Crée par <a href="https://samrequena.be" title="Lien vers le portfolio de Sam Requena">Sam Requena</a>
            </p>
            <a href="<?= get_field('politique-link', 'options'); ?>">Politique de confidentialités</a>
        </div>
    </section>
</footer>
<script type="module" src="<?= dw_asset('js/site.js') ?>" defer></script>
</body>
</html>