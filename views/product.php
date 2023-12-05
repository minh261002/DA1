<?php
$html_category = '';

foreach ($list_category as $ct) {
    extract($ct);
    $html_category .= '
        <li><a href = "index.php?page=product&id=' . $id . '">' . $name . '</a></li>
    ';
}
$html_product = show_product($all_product);

if (isset($_GET['id'])) {
    $id_category = $_GET['id'];
    $category = get_category_by_id($id_category);
    $category_name = $category['name'];
} else {
    $category_name = 'Tất Cả Sản Phẩm';
}
?>

<main>
    <section class="product-page my-5">
        <div class="container">
            <ul class="category">
                <li><a href="index.php?page=product">Tất cả sản phẩm</a></li>
                <?= $html_category ?>
            </ul>

            <div class="page-product">
                <div class="pd_page_ct_name">
                    <p>
                        <?= $category_name ?>
                    </p>
                </div>

                <div class="products">
                    <?= $html_product; ?>
                </div>

                <?php
                if (isset($_SESSION['page_count']) && isset($_SESSION['page_no'])) {
                    $total_pages = $_SESSION['page_count'];
                    $current_page = $_SESSION['page_no'];

                    if ($showPagination) {
                        echo '<div class="pagination">';
                        for ($page = 0; $page < $total_pages; $page++) {
                            $page_number = $page + 1;
                            if ($page == $current_page) {
                                echo '<a class="active" href="index.php?page=product&page_no=' . $page . '">' . $page_number . '</a>';
                            } else {
                                echo '<a href="index.php?page=product&page_no=' . $page . '">' . $page_number . '</a>';
                            }
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>