<?php
$html_category = '';

foreach ($list_category as $ct) {
    extract($ct);
    $html_category .= '
        <li><a href = "index.php?page = product & id = ' . $id . '">' . $name . '</a></li>
    ';
}
$html_product = show_product($all_product)
    ?>

<main>
    <section class="product-page my-5">
        <div class="container">
            <ul class="category">
                <?= $html_category ?>
            </ul>

            <div class="products">
                <?= $html_product; ?>
            </div>
        </div>
    </section>
</main>