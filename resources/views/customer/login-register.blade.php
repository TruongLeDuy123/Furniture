<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login/Register</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/slider-product.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        /* Style cho toàn bộ form */
        #otp-form {
            max-width: 400px;
            margin: 0 auto;
            /* Căn giữa form */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Khoảng cách giữa các phần tử */
        }

        /* Style cho nhãn (label) */
        #otp-form label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        /* Style cho ô input */
        #otp-form input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            /* Đảm bảo chiều rộng luôn đầy đủ */
            transition: border-color 0.3s ease;
        }

        #otp-form input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
            /* Xóa viền mặc định khi focus */
        }

        /* Style cho nút submit */
        #otp-form button {
            padding: 12px 0;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #otp-form button:hover {
            background-color: #0056b3;
            /* Màu khi hover */
        }

        /* Responsive cho màn hình nhỏ */
        @media (max-width: 600px) {
            #otp-form {
                padding: 15px;
            }

            #otp-form button {
                padding: 10px 0;
                font-size: 15px;
            }
        }

        /* Thêm hiệu ứng fade-in */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
                /* Di chuyển từ trên xuống */
            }

            to {
                opacity: 1;
                transform: translateY(0);
                /* Về vị trí ban đầu */
            }
        }

        /* Style cho form khi hiện */
        #otp-form.show {
            display: block;
            /* Hiển thị form */
            animation: fadeIn 0.5s ease-out;
            /* Áp dụng animation */
            opacity: 1;
            transform: translateY(0);
        }

        /* Đảm bảo form ẩn đi ban đầu */
        #otp-form {
            display: none;
            opacity: 0;
            transform: translateY(-20px);
            /* Ẩn đi với opacity = 0 */
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    </style>

</head>

<body>
    <x-header />

    <main>
        <div>
            <img srcset="{{ asset('img/login-bg.png') }}" alt="login-background"
                class="hidden lg:block object-fill lg:max-w-full  lg:w-full  max-h-[860px] relative" />
            <!-- Đăng nhập -->

            <form action="{{ url('/api/login') }}" class="form-login" autocomplete="off" method="POST">
                <div
                    class="fadeUp lg:absolute lg:top-[25%] top-[20%] lg:right-[80px] right-[45px] lg:w-[618px] lg:min-h-[550px] bg-white bg-opacity-70 rounded-lg flex justify-center flex-col p-[50px] lg:gap-y-[38px] gap-y-[20px]">
                    <span class="lg:text-[44px] text-xl font-bold text-[#FFB23F]">Đăng nhập</span>
                    <input type="text" id="emailLogin" name="email" required placeholder="Email đăng nhập"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />
                    <input type="password" id="passwordLogin" name="password" required placeholder="Mật khẩu"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />

                    <strong class="change-login lg:text-xl text-sm cursor-pointer text-[red]"
                        id="message_login"></strong>

                    <button type="submit"
                        class="bg-[#FFB23F] text-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm hover:bg-opacity-60">
                        Đăng nhập
                    </button>
                    <p class="change-register lg:text-xl text-sm cursor-pointer text-right">
                        Nếu chưa có tài khoản, nhấn <strong>Đăng ký</strong>
                    </p>
                </div>
            </form>

            <!-- Đăng ký -->
            <form action="" class="form-register hidden" autocomplete="off">
                <div
                    class="fadeUp lg:absolute lg:top-[25%] top-[20%] lg:right-[80px] right-[45px] lg:w-[618px] lg:min-h-[550px] bg-white bg-opacity-70 rounded-lg flex justify-center flex-col p-[50px] lg:gap-y-[38px] gap-y-[20px]">
                    <span class="lg:text-[44px] text-xl font-bold text-[#FFB23F]">Đăng ký</span>
                    <input id="HoTen" type="text" name="name" required placeholder="Họ Tên"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />
                    <input id="emailRegister" type="text" name="name" required placeholder="Email đăng nhập"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />
                    <input id="passwordRegister" type="password" required name="password" placeholder="Mật khẩu"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />
                    <input id="confirmPassword" type="password" required name="confirmPassword"
                        placeholder="Nhập lại mật khẩu"
                        class="bg-white rounded-lg shadow lg:h-[60px] h-[50px] lg:w-[516px] w-full p-[14px] font-bold lg:text-2xl text-sm" />
                    <strong class="change-login lg:text-xl text-sm cursor-pointer text-[red]" id="message"></strong>
                    <div class="flex items-center justify-end gap-x-[23px]">
                        <button type="submit"
                            class="bg-[#FFB23F] text-white rounded-lg shadow lg:h-[60px] h-[50px] w-[180px] p-[14px] font-bold lg:text-2xl text-sm hover:bg-opacity-60">
                            Đăng ký
                        </button>
                        <button id="cancel"
                            class="change-login bg-white text-[#AFADB5] rounded-lg shadow lg:h-[60px] h-[50px] w-[180px] p-[14px] font-bold lg:text-2xl text-sm hover:bg-opacity-60"
                            type="button">
                            Hủy
                        </button>
                    </div>
                    <p class="change-login lg:text-xl text-sm cursor-pointer text-right">
                        Nếu đã có tài khoản, nhấn <strong class="change-login">Đăng nhập</strong>
                    </p>
                </div>
            </form>
            <button id="googleLogin">Login with Google</button>
        </div>
    </main>
    <x-footer />

    <form id="otp-form" style="display:none;">
        <label for="otp">Nhập mã OTP:</label>
        <input type="text" id="otp" name="otp" placeholder="Nhập mã OTP"><br>
        <button type="submit">Xác nhận OTP</button>
    </form>

    <script>
        // Gọi hàm này khi cần hiển thị form (ví dụ nhấn nút "Gửi OTP")
        document.getElementById('show-otp-button').addEventListener('click', showOtpForm);

        const changeRegister = document.querySelector(".change-register");
        const changeLogin = document.querySelector(".change-login");

        changeRegister.addEventListener("click", () => {
            document.querySelector(".form-login").classList.add("hidden");
            document.querySelector(".form-register").classList.remove("hidden");
        });

        changeLogin.addEventListener("click", () => {
            document.querySelector(".form-register").classList.add("hidden");
            document.querySelector(".form-login").classList.remove("hidden");
        });

        var message = document.querySelector("#message");
        var message_login = document.querySelector("#message_login");

        document.querySelector('#confirmPassword').addEventListener("click", function(event) {
            message.innerHTML = "";
        })
        document.querySelector('#emailLogin').addEventListener("click", function(event) {
            message_login.innerHTML = "";
        })
        document.querySelector('#passwordLogin').addEventListener("click", function(event) {
            message_login.innerHTML = "";
        })
        document.querySelector('.form-register').addEventListener("submit", function(event) {
            event.preventDefault();
            var HoTen = document.getElementById("HoTen").value;
            var email = document.getElementById("emailRegister").value;
            var password = document.getElementById("passwordRegister").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password != confirmPassword) {
                message.innerHTML = "! Xác nhận mật khẩu không trùng khớp";
                confirmPassword = "";
            } else {
                var data = {
                    HoTen: HoTen,
                    email: email,
                    password: password,
                };
                fetch(`/api/register`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        // window.location.href = "/login-register" // Xử lý phản hồi từ API (nếu cần)
                        $('#otp-form').show()
                        
                    })
                    .catch(e => {
                        console.log("===> Loi: ", e);
                    })
            }

            $('#otp-form').on('submit', function(e) {
                e.preventDefault()
                let otpval = $("#otp").val()
                let data = {
                    email,
                    otp_code: otpval
                }
                fetch(`api/verify-otp`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message == "Vui lòng nhập mã OTP!" || data.message ==
                            'Mã OTP không hợp lệ!') {
                            Swal.fire({
                                title: data.message,
                                icon: "warning",
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Đồng ý",
                            })
                        } else {
                            Swal.fire({
                                title: data.message,
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Đồng ý",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/login-register";
                                }
                            })
                        }
                    })
                    .catch(e => {
                        console.log("Loi: ", e);
                    })
            })
        });

        document.querySelector('#cancel').addEventListener("click", function(event) {
            document.querySelector(".form-register").classList.add("hidden");
            document.querySelector(".form-login").classList.remove("hidden");
        })

        $(document).ready(function() {
            $('.form-login').submit(function(e) {
                e.preventDefault();
                let email = $('#emailLogin').val();
                let password = $('#passwordLogin').val();
                var data = {
                    email: email,
                    password: password,
                };

                fetch(`/api/login`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message == "Mật khẩu không hợp lệ!") {
                            message_login.innerHTML = "Mật khẩu không hợp lệ!";
                        } else if (data.message == "Email không hợp lệ!") {
                            message_login.innerHTML = "Email không hợp lệ!";
                        } else {
                            sessionStorage.setItem("email", data.data.email);
                            sessionStorage.setItem("token", data.token);
                            if (data.data.role == 1) {
                                window.location.href = "/customer_manager";
                            } else {
                                window.location.href = "/";
                            }
                        }
                    });
                if (sessionStorage.getItem("href") == "null") {
                    window.location.replace("/profile-page");
                }
            })
        })

        document.getElementById('googleLogin').addEventListener('click', function() {
            // Điều hướng tới URL đăng nhập Google trên backend
            window.location.href = '/auth/google/redirect';
        });
    </script>
</body>

</html>
