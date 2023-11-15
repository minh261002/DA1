<main class="my-5">
    <div class="container">
        <h3 class="text-center">Danh Mục Sản Phẩm</h3>

        <form action="index.php?page=addCategory" method="POST" style="width:500px; margin:0 auto;" class="mt-3 mb-5"
            enctype="multipart/form-data">

            <p class="err">
                <?php if (isset($message)) {
                    echo $message;
                } ?>
            </p>
            <div class="form-group mb-3">
                <label for="id">ID Danh Mục</label>
                <input type="text" name="category_id" id="category_id" class="form-control" disabled>
                <span class="err">Không Cần Nhập ID Danh Mục</span>
            </div>

            <div class="form-group mb-3">
                <label for="id">Tên Danh Mục</label>
                <input type="text" name="category_name" id="category_name" class="form-control">
                <span class="err" id="ctnameErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="category_img">Ảnh</label>
                <input type="file" name="category_img" id="category_img" class="form-control d-block">
                <span class="err" id="ctimgErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="home">Tùy Chọn</label>
                <select name="home" id="home" class="form-control">Tùy Chọn
                    <option value="0"> Mặc Định</option>
                    <option value="1">Hiện Danh Mục Lên Trang Chủ</option>
                    <option value="2">Ẩn Danh Mục</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <input type="submit" name="addCategory" value="Thêm Danh Mục Mới" class="btn btn-dark px-5">
            </div>

            <a href="index.php?page=category">Quay Lại</a>
        </form>
    </div>
</main>