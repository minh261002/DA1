<?php
$show_category = '';

foreach ($list_category as $ct) {
    extract($ct);

    $show_category .= '
        <tr>
            <td>' . $id . '</td>
            <td><img src="../Uploads/' . $avatar . '" width="50px"></td>
            <td>' . $name . '</td>
            <td>' . (($home == 0) ? "Mặc Định" : (($home == 1) ? "Hiển Thị Trang Chủ" : (($home == 2) ? "Đang Ẩn" : "Giá trị không hợp lệ"))) . '</td>
            <td>
                <a href="index.php?page=updateCategory&id=' . $id . '">Sửa</a>
                <a href="index.php?page=delCategory&id=' . $id . '">Xóa</a>
            </td>
        </tr>
    ';
}
?>

<main class="my-5">
    <div class="container">
        <h3 class="mt-3 mb-5 text-center">Danh Mục Sản Phẩm</h3>
        <p class="err">
            <?php
            if (isset($_SESSION["message"]) && $_SESSION["message"] != "") {
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
            ?>
        </p>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên Danh Mục</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </thead>

            <tbody>
                <?= $show_category ?>
            </tbody>
        </table>

        <a href="index.php?page=addCategory">Thêm Danh Mục Mói</a>
    </div>
</main>