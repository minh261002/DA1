<main>
    <h2 class="text-center mt-5 mb-3 fw-bold">Đăng Ký</h2>
    <div class="container form">
        <form action="" method="POST" id="registerForm">
            <div class="form-group mb-3">
                <label for="username">Tên Đăng Nhập</label>
                <input type="text" name="username" class="form-control py-2" id="username">
                <span class="err" id="usernameErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="email">Địa Chỉ Email</label>
                <input type="text" name="email" class="form-control py-2" id="email">
                <span class="err" id="emailErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="password">Mật Khẩu</label>
                <input type="password" name="password" class="form-control py-2" id="password">
                <span class="err" id="passwordErr"></span>
            </div>

            <div class="form-group mb-3">
                <label for="confirm">Nhập Lại Mật Khẩu</label>
                <input type="password" name="confirm" class="form-control py-2" id="confirm">
                <span class="err" id="confirmErr"></span>
            </div>

            <div class="form-floating mb-3">
                <input class="btn-form" type="submit" value="Đăng Ký">
            </div>
        </form>

        <p class="no-acc">Bạn đã có tài khoản ? <a href="index.php?page=login">Đăng Nhập Ngay</a></p>
        <p class="text-center my-3 fw-bold fs-5">Hoặc</p>
        <div class="login-social mb-5">
            <div class="login-fb flex">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1365.3 1365.3" height="24" width="24">
                    <path
                        d="M1365.3 682.7A682.7 682.7 0 10576 1357V880H402.7V682.7H576V532.3c0-171.1 102-265.6 257.9-265.6 74.6 0 152.8 13.3 152.8 13.3v168h-86.1c-84.8 0-111.3 52.6-111.3 106.6v128h189.4L948.4 880h-159v477a682.8 682.8 0 00576-674.3"
                        fill="#fff"></path>
                </svg>
                <p>Đăng Nhập Bằng Facebook</p>
            </div>

            <div class="login-google mt-3 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#4285F4"
                        d="M20.64 12.2045c0-.6381-.0573-1.2518-.1636-1.8409H12v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.615z">
                    </path>
                    <path fill="#34A853"
                        d="M12 21c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H3.9574v2.3318C5.4382 18.9832 8.4818 21 12 21z">
                    </path>
                    <path fill="#FBBC05"
                        d="M6.964 13.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V7.9582H3.9573A8.9965 8.9965 0 0 0 3 12c0 1.4523.3477 2.8268.9573 4.0418L6.964 13.71z">
                    </path>
                    <path fill="#EA4335"
                        d="M12 6.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C16.4632 3.8918 14.426 3 12 3 8.4818 3 5.4382 5.0168 3.9573 7.9582L6.964 10.29C7.6718 8.1627 9.6559 6.5795 12 6.5795z">
                    </path>
                </svg>
                <p>Đăng Nhập Bằng Google</p>
            </div>
        </div>
    </div>
    <div class="line2"></div>
</main>

<script src="assets/js/check-form.js"></script>

<script>
const registerForm = document.getElementById("registerForm");
registerForm.addEventListener("submit", function(e) {
    e.preventDefault();

    if (validateRegisterForm()) {
        alert("Biểu mẫu đăng ký hợp lệ, có thể xử lý.");
    }
});
</script>