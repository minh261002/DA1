<?php
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    extract($user);
}
if (isset($dateOfBirth)) {
    $formattedDate = date('Y-m-d', strtotime($dateOfBirth));
}

if (isset($address)) {
    $addressData = json_decode($address, true);

    if ($addressData !== null) {
        $province = $addressData['province'];
        $district = $addressData['district'];
        $ward = $addressData['ward'];
        $detail = $addressData['detail'];
    } else {
        echo "Có lỗi";
    }
}
?>

<main style="background-color: #f5f5f5;" class="py-5">
    <section class="profile">
        <div class="wrap-content">
            <div class="container-profile">
                <div class="profile_option">

                    <div class="option-block act flex">
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="vuesax/outline/frame">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd" d="M8.07957 10.62H8.15957H8.18957C10.9796 10.53 13.1796 8.25 13.1896 5.44C13.1896 2.58 10.8596 0.25 7.99957 0.25C5.13957 0.25 2.80957 2.58 2.80957 5.44C2.80957 8.25 4.99957 10.53 7.89957 10.62C7.95957 10.61 8.02957 10.61 8.07957 10.62ZM4.30957 5.44C4.30957 3.41 5.96957 1.75 7.99957 1.75C10.0296 1.75 11.6896 3.41 11.6896 5.44C11.6796 7.42 10.1396 9.03 8.17957 9.12C8.04957 9.11 7.90957 9.11 7.85957 9.12C5.86957 9.05 4.30957 7.44 4.30957 5.44ZM2.74961 20.05C4.23961 21.05 6.20961 21.55 8.16961 21.55C10.1296 21.55 12.0896 21.05 13.5896 20.05C14.9796 19.12 15.7396 17.85 15.7396 16.48C15.7396 15.11 14.9696 13.85 13.5896 12.93C10.6096 10.94 5.74961 10.94 2.74961 12.93C1.35961 13.86 0.599609 15.13 0.599609 16.5C0.599609 17.87 1.35961 19.13 2.74961 20.05ZM2.09961 16.51C2.09961 15.65 2.61961 14.83 3.57961 14.19C6.06961 12.53 10.2696 12.53 12.7596 14.19C13.7096 14.82 14.2396 15.64 14.2396 16.49C14.2396 17.35 13.7196 18.17 12.7596 18.81C10.2696 20.48 6.06961 20.48 3.57961 18.81C2.62961 18.18 2.09961 17.36 2.09961 16.51Z" fill="#6B7280"></path>
                            </g>
                        </svg>
                        <p>Tài Khoản Của Tôi</p>
                    </div>

                    <div class="option-block flex">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="icon-wrapper">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd" d="M12.3756 23.3623C11.4956 23.3623 10.6256 23.1723 9.93561 22.7923L4.59561 19.8223C3.14561 19.0223 2.01562 17.0923 2.01562 15.4323V9.78228C2.01562 8.12228 3.14561 6.20233 4.59561 5.39233L9.93561 2.4323C11.3056 1.6723 13.4456 1.6723 14.8156 2.4323L20.1556 5.40228C21.6056 6.20228 22.7356 8.13229 22.7356 9.79229V15.4423C22.7356 17.1023 21.6056 19.0223 20.1556 19.8323L14.8156 22.7923C14.1256 23.1723 13.2556 23.3623 12.3756 23.3623ZM12.3756 3.3623C11.7456 3.3623 11.1256 3.4923 10.6656 3.7423L9.13765 4.59212L17.4189 9.37414L20.422 7.63659C20.1316 7.24525 19.7864 6.91521 19.4256 6.71227L14.0856 3.7423C13.6256 3.4923 13.0056 3.3623 12.3756 3.3623ZM16.6257 11.5761V13.8528C16.6257 14.2628 16.9657 14.6028 17.3757 14.6028C17.7857 14.6028 18.1257 14.2629 18.1257 13.8729V10.7072L21.1057 8.98103C21.1892 9.25947 21.2356 9.53517 21.2356 9.79229V15.4423C21.2356 16.5523 20.3856 17.9823 19.4256 18.5223L14.0856 21.4923C13.8146 21.6442 13.4824 21.7508 13.1255 21.8122V13.6036L16.6257 11.5761ZM15.9334 10.2336L12.3753 12.2922L4.32818 7.63529C4.61882 7.2446 4.96443 6.91544 5.32562 6.71227L7.6177 5.43747L15.9334 10.2336ZM11.6255 13.5982L3.64469 8.97961C3.56177 9.25767 3.51562 9.53367 3.51562 9.79229V15.4423C3.51562 16.5423 4.36562 17.9823 5.32562 18.5223L10.6656 21.4923C10.9366 21.6441 11.2687 21.7508 11.6255 21.8122V13.5982Z" fill="#4B5563"></path>
                            </g>
                        </svg>
                        <p>Đơn Hàng Của Tôi</p>
                    </div>

                    <div class="option-block flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="wrapper">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd" d="M7.00266 20.751H9.00269H17.0027C21.4127 20.751 22.7527 19.411 22.7527 15.001V9.00098C22.7527 4.59098 21.4127 3.25098 17.0027 3.25098H9.00269H7.00266C2.75266 3.25098 1.36266 4.52098 1.26266 8.48098C1.25266 8.68098 1.32266 8.87098 1.47266 9.02098C1.62266 9.17098 1.81266 9.25098 2.01266 9.25098C3.52266 9.25098 4.75266 10.491 4.75266 12.001C4.75266 13.511 3.52266 14.751 2.01266 14.751C1.80266 14.751 1.61266 14.841 1.47266 14.981C1.33266 15.121 1.26266 15.321 1.26266 15.521C1.36266 19.481 2.75266 20.751 7.00266 20.751ZM7.00266 19.251H8.25269V16.501C8.25269 16.091 8.59269 15.751 9.00269 15.751C9.41269 15.751 9.75269 16.091 9.75269 16.501V19.251H17.0027C20.5827 19.251 21.2527 18.571 21.2527 15.001V9.00098C21.2527 5.43098 20.5827 4.75098 17.0027 4.75098H9.75269V7.50098C9.75269 7.91098 9.41269 8.25098 9.00269 8.25098C8.59269 8.25098 8.25269 7.91098 8.25269 7.50098V4.75098H7.00266C3.82266 4.75098 2.96266 5.29098 2.79266 7.82098C4.76266 8.20098 6.25266 9.93098 6.25266 12.001C6.25266 14.071 4.76266 15.801 2.79266 16.181C2.96266 18.721 3.82266 19.251 7.00266 19.251ZM12.3626 15.4306C12.5626 15.5706 12.8026 15.6506 13.0426 15.6506C13.2326 15.6506 13.4226 15.6106 13.5926 15.5206L14.6726 14.9606L15.7426 15.5206C16.1326 15.7206 16.6026 15.6906 16.9626 15.4306C17.3226 15.1706 17.5026 14.7306 17.4226 14.2906L17.2126 13.1006L18.0826 12.2506C18.4026 11.9406 18.5226 11.4806 18.3826 11.0606C18.2426 10.6406 17.8826 10.3306 17.4426 10.2706L16.2426 10.0906L15.7026 9.00059C15.5126 8.60059 15.1126 8.35059 14.6626 8.35059C14.2226 8.35059 13.8226 8.60059 13.6226 9.00059L13.0826 10.0906L11.8826 10.2706C11.4426 10.3306 11.0826 10.6406 10.9426 11.0606C10.8126 11.4806 10.9226 11.9406 11.2426 12.2506L12.1126 13.1006L11.9026 14.2906C11.8226 14.7306 12.0026 15.1706 12.3626 15.4306ZM13.2826 12.1506L12.7726 11.6506L13.4926 11.5506C13.8726 11.4906 14.2026 11.2506 14.3726 10.9106L14.6826 10.2706L14.9926 10.9106C15.1626 11.2506 15.4926 11.4906 15.8726 11.5506L16.5726 11.6506L16.0626 12.1506C15.7826 12.4106 15.6626 12.7906 15.7226 13.1806L15.8426 13.8806L15.2126 13.5506C14.8726 13.3706 14.4726 13.3706 14.1326 13.5506L13.5026 13.8806L13.6226 13.1806C13.6826 12.8006 13.5626 12.4206 13.2826 12.1506Z" fill="#6B7280"></path>
                            </g>
                        </svg>
                        <p>Kho Voucher</p>
                    </div>

                    <div class="option-block flex">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="vuesax/outline/star">
                                <path id="Vector" d="M16.6601 21.6698C16.1301 21.6698 15.4501 21.4998 14.6001 20.9998L11.6101 19.2298C11.3001 19.0498 10.7001 19.0498 10.4001 19.2298L7.40012 20.9998C5.63012 22.0498 4.59012 21.6298 4.12012 21.2898C3.66012 20.9498 2.94012 20.0798 3.41012 18.0798L4.12012 15.0098C4.20012 14.6898 4.04012 14.1398 3.80012 13.8998L1.32012 11.4198C0.0801177 10.1798 0.180118 9.11983 0.350118 8.59982C0.520118 8.07982 1.06012 7.15982 2.78012 6.86982L5.97012 6.33982C6.27012 6.28982 6.70012 5.96982 6.83012 5.69982L8.60012 2.16982C9.40012 0.559824 10.4501 0.319824 11.0001 0.319824C11.5501 0.319824 12.6001 0.559824 13.4001 2.16982L15.1601 5.68982C15.3001 5.95982 15.7301 6.27982 16.0301 6.32982L19.2201 6.85982C20.9501 7.14982 21.4901 8.06982 21.6501 8.58982C21.8101 9.10983 21.9101 10.1698 20.6801 11.4098L18.2001 13.8998C17.9601 14.1398 17.8101 14.6798 17.8801 15.0098L18.5901 18.0798C19.0501 20.0798 18.3401 20.9498 17.8801 21.2898C17.6301 21.4698 17.2301 21.6698 16.6601 21.6698ZM11.0001 17.5898C11.4901 17.5898 11.9801 17.7098 12.3701 17.9398L15.3601 19.7098C16.2301 20.2298 16.7801 20.2298 16.9901 20.0798C17.2001 19.9298 17.3501 19.3998 17.1301 18.4198L16.4201 15.3498C16.2301 14.5198 16.5401 13.4498 17.1401 12.8398L19.6201 10.3598C20.1101 9.86982 20.3301 9.38982 20.2301 9.05982C20.1201 8.72983 19.6601 8.45982 18.9801 8.34982L15.7901 7.81982C15.0201 7.68982 14.1801 7.06982 13.8301 6.36982L12.0701 2.84982C11.7501 2.20982 11.3501 1.82982 11.0001 1.82982C10.6501 1.82982 10.2501 2.20982 9.94012 2.84982L8.17012 6.36982C7.82012 7.06982 6.98012 7.68982 6.21012 7.81982L3.03012 8.34982C2.35012 8.45982 1.89012 8.72983 1.78012 9.05982C1.67012 9.38982 1.90012 9.87982 2.39012 10.3598L4.87012 12.8398C5.47012 13.4398 5.78012 14.5198 5.59012 15.3498L4.88012 18.4198C4.65012 19.4098 4.81012 19.9298 5.02012 20.0798C5.23012 20.2298 5.77012 20.2198 6.65012 19.7098L9.64012 17.9398C10.0201 17.7098 10.5101 17.5898 11.0001 17.5898Z" fill="#6B7280"></path>
                            </g>
                        </svg>
                        <p>Đánh Giá Của Tôi</p>
                    </div>
                </div>

                <div class="profile-content">
                    <div class="content-header">
                        <h4>Thông Tin Cá Nhân</h4>
                    </div>
                    <div class="content-info">
                        <form class="upload-profile" enctype="multipart/form-data">
                            <div class="avatar">
                                <img src="Uploads/<?= $avatar ?>" id="previewAvatar" class="d-block my-3">
                                <label for="fileAvatar" class="custom-file-upload">
                                    Chọn tệp
                                </label>
                                <input type="file" name="avatar" id="fileAvatar" accept="image/*">
                                <span id="fileName"></span>

                                <script>
                                    const fileAvatar = document.getElementById('fileAvatar');
                                    const previewAvatar = document.getElementById('previewAvatar');
                                    const fileName = document.getElementById('fileName');

                                    fileAvatar.addEventListener('change', function() {
                                        const file = fileAvatar.files[0];

                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewAvatar.src = e.target.result;
                                                previewAvatar.style.display = 'block';
                                                fileName.textContent = file.name;
                                                fileName.style.display = 'inline';
                                            };

                                            reader.readAsDataURL(file);
                                        }
                                    });
                                </script>
                            </div>

                            <div class="info-user">
                                <div class="form-group px-5 mb-4 ">
                                    <label for="fullname">Họ Và Tên </label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="<?php if (isset($fullname)) {
                                                                                                                        echo $fullname;
                                                                                                                    } ?>">

                                </div>

                                <div class="form-group px-5 mb-4 ">
                                    <label for="dateOfBirth">Ngày Sinh </label>
                                    <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="<?= $formattedDate ?>">
                                </div>

                                <div class="form-group px-5 mb-4 ">
                                    <label for="gender">Giới Tính </label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Chọn</option>
                                        <option value="0" <?php if ((isset($gender) && ($gender == 0))) {
                                                                echo 'selected';
                                                            } ?>>Nam</option>
                                        <option value="1" <?php if ((isset($gender) && ($gender == 1))) {
                                                                echo 'selected';
                                                            } ?>>Nữ</option>
                                    </select>
                                </div>

                                <div class="form-group px-5 mb-4 ">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="number" name="phone" id="phone" class="form-control" value="<?php if (isset($phone)) {
                                                                                                                    echo $phone;
                                                                                                                } ?>">
                                </div>

                                <div class="form-group px-5 mb-4 ">
                                    <label for="email">Email </label>
                                    <input type="email" name="email" id="email" class="form-control" disabled value="<?php if (isset($email)) {
                                                                                                                            echo $email;
                                                                                                                        } ?>">
                                </div>

                                <div class="form-group px-5 mb-4 ">
                                    <label for="address">Địa Chỉ </label>

                                    <div class="form-addess flex">
                                        <select class="form-select form-control " id="province">
                                            <option value="">
                                                <?php if (isset($province)) {
                                                    echo $province;
                                                } ?>
                                            </option>
                                        </select>

                                        <select class="form-select form-control" id="district">
                                            <option value="">
                                                <?php if (isset($district)) {
                                                    echo $district;
                                                } ?>
                                            </option>
                                        </select>

                                        <select class="form-select form-control" id="ward">
                                            <option value="">
                                                <?php if (isset($ward)) {
                                                    echo $ward;
                                                } ?>
                                            </option>
                                        </select>
                                    </div>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Nhập Địa Chỉ Cụ Thể" value="<?php if (isset($detail)) {
                                                                                                                                                        echo $detail;
                                                                                                                                                    } ?>">
                                </div>
                                <div class="form-group px-5 mb-4">
                                    <button type="submit" class="btn-form"> Lưu Thay Đổi</button>
                                </div>
                                <script src="assets/js/api.js"></script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>