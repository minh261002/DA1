function validateLoginForm() {
  let username = document.getElementById("username");
  let password = document.getElementById("password");
  let usernameErr = document.getElementById("usernameErr");
  let passwordErr = document.getElementById("passwordErr");

  let isValid = true;

  if (username.value.trim() === "") {
    usernameErr.textContent = "Tên đăng nhập không được để trống";
    isValid = false;
  } else {
    usernameErr.textContent = "";
  }

  if (password.value.trim() === "") {
    passwordErr.textContent = "Mật khẩu không được để trống";
    isValid = false;
  } else {
    passwordErr.textContent = "";
  }

  return isValid;
}

function validateRegisterForm() {
  let username = document.getElementById("username");
  let email = document.getElementById("email");
  let password = document.getElementById("password");
  let confirm = document.getElementById("confirm");
  let usernameErr = document.getElementById("usernameErr");
  let emailErr = document.getElementById("emailErr");
  let passwordErr = document.getElementById("passwordErr");
  let confirmErr = document.getElementById("confirmErr");

  let isValid = true;

  // Kiểm tra Tên đăng nhập
  if (username.value.trim() === "") {
    usernameErr.textContent = "Tên đăng nhập không được để trống";
    isValid = false;
  } else {
    usernameErr.textContent = "";
  }

  // Kiểm tra Địa chỉ Email
  if (email.value.trim() === "") {
    emailErr.textContent = "Địa chỉ Email không được để trống";
    isValid = false;
  } else {
    emailErr.textContent = "";
  }

  // Kiểm tra Mật khẩu
  if (password.value.trim() === "") {
    passwordErr.textContent = "Mật khẩu không được để trống";
    isValid = false;
  } else {
    passwordErr.textContent = "";
  }

  // Kiểm tra Nhập lại Mật khẩu
  if (confirm.value.trim() === "") {
    confirmErr.textContent = "Nhập lại Mật khẩu không được để trống";
    isValid = false;
  } else if (confirm.value !== password.value) {
    confirmErr.textContent = "Mật khẩu Không Trùng Khớp";
    isValid = false;
  } else {
    confirmErr.textContent = "";
  }

  return isValid;
}
