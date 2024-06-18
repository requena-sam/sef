<section class="magasins" data-animation="showUp">
    <h2 role="heading" aria-level="2" class="hidden">Liste des magasins</h2>
    <ul class="magasins__container">
        <?php if (have_rows('magasins-list')):
            while (have_rows('magasins-list')): the_row();
                $title = get_sub_field('title');
                $address = get_sub_field('address');
                $phone = get_sub_field('phone');
                $lundi = get_sub_field('lundi');
                $mardi = get_sub_field('mardi');
                $mercredi = get_sub_field('mercredi');
                $jeudi = get_sub_field('jeudi');
                $vendredi = get_sub_field('vendredi');
                $samedi = get_sub_field('samedi');
                ?>
                <li>
                    <article class="magasins__container__item">
                        <div class="magasins__container__item__header">
                            <h3 aria-level="3" role="heading"><?= $title; ?></h3>
                            <p><?= $address; ?></p>
                        </div>
                        <ul>
                            <h4 role="heading" aria-level="4">Horaire :</h4>
                            <li>Lundi : <?= $lundi; ?></li>
                            <li>Mardi : <?= $mardi; ?></li>
                            <li>Mercredi : <?= $mercredi; ?></li>
                            <li>Jeudi : <?= $jeudi; ?></li>
                            <li>Vendredi : <?= $vendredi; ?></li>
                            <li>Samedi : <?= $samedi; ?></li>
                        </ul>
                        <a class="phone-number" title="Appelez notre magasin" href="tel:<?= $phone; ?>"><?= $phone; ?></a>
                    </article>
                </li>
            <?php endwhile; endif; ?>
    </ul>
    <div class="magasins__map" data-animation="showUp">
        <img src="<?= get_field('map'); ?>" alt="Capture d'écran de la position du centre de google map">
    </div>
</section>