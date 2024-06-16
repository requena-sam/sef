<nav role="navigation" class="navigation">
    <h2 role="heading" aria-level="2" class="hidden">Navigation principale</h2>
    <h3 role="heading" aria-level="3"><a href="<?= home_url(); ?>" title="Vers la page d'accueil">SEF</a></h3>
    <input type="checkbox" class="input menu-btn computer_hidden" id="menu-btn">
    <label class="menu-icon computer_hidden" for="menu-btn">
        <span class="navicon" aria-label="Hamburger menu 'icon'"></span>
    </label>
    <div class="navigation__links">
        <ul class="navigation__links__global" role="list">
            <?php if (have_rows('navigation-list', 'options')):
                while (have_rows('navigation-list', 'options')):
                    the_row();
                    $text = get_sub_field('navigation-text', 'options');
                    $link = get_sub_field('navigation-link', 'options');
                    ?>
                    <li><a class="<?=dw_is_active($link);?>" href="<?= $link; ?>" title="Vers la page <?=$text;?>"><?= $text; ?></a></li>
                <?php endwhile;endif; ?>
        </ul>
        <ul class="navigation__links__more">
            <li>
                <a class="navigation__links__more__primary" href="<?= get_field('nav-link-url-1', 'options'); ?>"><?= get_field('nav-link-text-1', 'options'); ?></a>
            </li>
            <li>
                <a class="navigation__links__more__secondary btn-arrow" href="<?= get_field('nav-link-url-2', 'options'); ?>"><?= get_field('nav-link-text-2', 'options'); ?></a>
            </li>
        </ul>
    </div>
</nav>