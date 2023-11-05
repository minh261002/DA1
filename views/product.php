<?php
$html_category = '';
foreach ($siblingsCategories as $category) {
    extract($category);
    $link = 'index.php?page=product&id=' . $id;
    $html_category .= '<li><a href="' . $link . '">' . htmlspecialchars($name) . '</a></li>';
}

$html_product = show_product($list_product)
?>

<main>
    <section class="product-page my-5">
        <div class="container">
            <ul class="category">
                <?=$html_category?>
            </ul>

            <div class="products">
                <?=$html_product;?>
            </div>
        </div>
    </section>
</main>