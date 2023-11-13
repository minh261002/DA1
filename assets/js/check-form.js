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
function checkcreateuser() {
  var name = document.getElementById("name");
  var password = document.getElementById("password");
  var phone = document.getElementById("phone");
  var email = document.getElementById("email");

  // Check if any field is empty
  if (name.value.trim() === "" || password.value.trim() === "" || phone.value.trim() === "" || email.value.trim() ===
    "") {
    alert("Vui lòng điền đầy đủ thông tin!");
    return false;
  }

  // Check if the password has at least 6 characters
  if (password.value.length < 6) {
    alert("Mật khẩu phải có ít nhất 6 ký tự.");
    password.focus();
    return false;
  }

  // Check if the phone number is numeric and 10 digits
  if (isNaN(phone.value) || phone.value.length !== 10) {
    alert("Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.");
    phone.focus();
    return false;
  }

  // Check if the email is in a valid format
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!emailPattern.test(email.value)) {
    alert("Email không hợp lệ. Vui lòng nhập đúng định dạng.");
    email.focus();
    return false;
  }

  return true;
}
