<?php
if (isset($_GET['id'])) {
    $id_product = $_GET['id'];

    $pd_vote = get_product_by_id($id_product);

    var_dump($pd_vote);
}
?>

<style>
    .form-rating {
        display: none;
    }

    .form-rating+label {
        cursor: pointer;
        font-size: 42px;
        color: #ddd;
        border: none !important;
        border-radius: 0 !important;
        background-color: transparent !important;
    }

    .form-rating:checked+label,
    .form-rating:hover+label,
    .form-rating:checked~.form-rating+label {
        color: #ffd700 !important;
    }

    .result {
        font-size: 20px;
        margin-top: 20px;
    }
</style>

<main class="my-5">
    <div class="container">
        <div class="info_product">
            <div class="container">
                <h5>Đơn Hàng #
                    <?= $id_bill ?>
                </h5>

                <table class="table">
                    <thead>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Kích Thước</th>
                        <th>Màu</th>
                        <th>Số Lượng</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <?= $name_product ?>
                            </td>
                            <td>
                                <img src="uploads/<?= $img_product ?>" width="50px">
                            </td>
                            <td>
                                <?= $size ?>
                            </td>
                            <td>
                                <?= $color ?>
                            </td>
                            <td>
                                <?= $quantity ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="rating text-center">
            <form action="index.php?page=vote" method="POST" class="form-rate">
                <label for="">Đánh Giá Của Bạn</label>
                <div class="reate-group">
                    <input type="radio" id="star5" name="rating" class="form-rating" value="5">
                    <label for="star5">&#10025; </label>

                    <input type="radio" id="star4" name="rating" class="form-rating" value="4">
                    <label for="star4">&#10025; </label>

                    <input type="radio" id="star3" name="rating" class="form-rating" value="3">
                    <label for="star3">&#10025; </label>

                    <input type="radio" id="star2" name="rating" class="form-rating" value="2">
                    <label for="star2">&#10025; </label>

                    <input type="radio" id="star1" name="rating" class="form-rating" value="1">
                    <label for="star1">&#10025; </label>
                </div>

                <div class="form-group my-3">
                    <label for="content" class="form-label">Nhận xét của bạn</label>
                    <textarea class="form-control" name="content" id="content" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <input type="hidden" name="id_bill_details" value="<?= $id_bill_details ?>">
                    <input type="hidden" name="id_product" value="<?= $id_product ?>">

                    <input type="submit" value="Gửi Đánh Giá" class="btn-form" name="btn-send-rating">
                </div>
            </form>
        </div>
    </div>

</main>

<script>
    const ratingInputs = document.querySelectorAll('input[type="radio"]');
    const ratingValue = document.getElementById('ratingValue');

    ratingInputs.forEach((input) => {
        input.addEventListener('change', () => {
            ratingValue.textContent = input.value;
        });
    });

</script>