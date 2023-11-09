<?php
if ($_GET["act"] == "new") {
    $html_option_product = show_product($new_product);
}
if ($_GET["act"] == "hot") {
    $html_option_product = show_product($hot_product);
}
?>
<main>
    <section class="product-new-page my-5">
        <div class="container">
            <div class="new-product">
                <?= $html_option_product; ?>
            </div>
        </div>
    </section>
</main>