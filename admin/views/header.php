<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <div class="container flex justify-content-between">
            <div class="header__logo">
                <img src="../assets/img/tokyolife-logo.1bafb78d.svg" alt="">
            </div>

            <div class="header__logout">
                <p>Xin Chào <?=$username?></p>
                <a href="index.php?page=logout">Đăng xuất</a>
            </div>
        </div>
    </header>