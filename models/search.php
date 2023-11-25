<?php
require_once "./pdo.php";
require_once "./product.php";

if (isset($_GET["search"])) {
    $search = $_GET["search"];

    $results = search($search);

    if ($results !== false) {
        if (count($results) > 0) {
            echo '
            <table class="table table-bordered table-search">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
            ';
            foreach ($results as $result) {
                extract($result);
                echo '
                    <tr>
                        <td>' . $id . '</td>
                        <td>' . $name . '</td>
                        <td><img src="Uploads/' . $img . '" width="30px"></td>
                        <td><a href="index.php?page=details&id=' . $id . '">Xem chi tiết</a></td>
                    </tr>
                ';
            }
            echo '
                </tbody>
            </table>
            ';
        } else {
            echo '<p class="err-search">Không có kết quả tìm kiếm.</p>';
        }
    } else {
        echo "Có lỗi xảy ra trong quá trình tìm kiếm.";
    }
} else {
    echo "Không có dữ liệu tìm kiếm.";
}
?>