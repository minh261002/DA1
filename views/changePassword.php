<main>
    <h2 class="text-center mt-5 mb-3 fw-bold">Đổi Mật Khẩu</h2>
    <div class="container form">

        <p class="err"><?php
if (isset($_SESSION["message_re"]) && $_SESSION["message_re"] != "") {
    echo $_SESSION["message_re"];
    unset($_SESSION["message_re"]);
}
?></p>
        <form action="index.php?page=change-function" method="POST" id="loginForm">
            <div class="form-group mb-3">
                <label for="password">Mật Khẩu Cũ</label>
                <input type="password" name="password" class="form-control py-2" id="password">
                <span class="err" id="passwordErr"></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Mật Khẩu Mới</label>
                <input type="password" name="password_new" class="form-control py-2" id="password-new">
                <span class="err" id="passwordErr"></span>
            </div>
            <div class="form-group mb-3">
                <label for="password">Nhập Lại Mật Khẩu Mới</label>
                <input type="password" name="confirm-new" class="form-control py-2" id="confirm-new">
                <span class="err" id="passwordErr"></span>
            </div>

            <div class="form-group mb-3">
                <input class="btn-form" type="submit" value="Đổi Mật Khẩu" name="btn-change">
            </div>
        </form>
    </div>
</main>