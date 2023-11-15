<?php
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $category = get_category_by_id($category_id);
    extract($category);
}
?>

<main class="my-5">
    <div class="container">
        <h3 class="text-center">Danh Mục Sản Phẩm</h3>

        <form action="index.php?page=updateCategory" method="POST" style="width:500px; margin:0 auto;" class="mt-3 mb-5"
            enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="id">ID Danh Mục</label>
                <input type="text" name="category_id" id="category_id" class="form-control" value="<?= $id ?>" disabled>
                <span class="err">Không Cần Nhập ID Danh Mục</span>
            </div>

            <div class="form-group mb-3">
                <label for="id">Tên Danh Mục</label>
                <input type="text" name="category_name" id="category_name" class="form-control" value="<?= $name ?>">
                <span class="err" id="ctnameErr"></span>
            </div>

            <div class="form-group mb-3">
                <img src="../Uploads/<?= $avatar ?>" width='50px'>
                <input type="file" name="category_img" id="category_img" class="form-control d-block">
                <input type="hidden" name="avatar_old" value="<?= $avatar ?>">
                <span class="err" id="ctimgErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="home">Tùy Chọn</label>
                <select name="home" id="home" class="form-control">
                    <option value="0" <?php echo ($home == 0) ? 'selected' : ''; ?>>Mặc Định</option>
                    <option value="1" <?php echo ($home == 1) ? 'selected' : ''; ?>>Hiện Danh Mục Lên Trang Chủ</option>
                    <option value="2" <?php echo ($home == 2) ? 'selected' : ''; ?>>Ẩn Danh Mục</option>
                </select>
            </div>


            <div class="form-group mb-3">
                <input type="hidden" name="category_id" value=<?= $id ?>>
                <input type="submit" name="updateCategory" value="Lưu Thay Đổi  " class="btn btn-dark px-5">
            </div>

            <a href="index.php?page=category">Quay Lại</a>

        </form>
    </div>
</main>