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

            {{-- login with social --}}
            {{-- <form action="{{ url('/api/auth/google/redirect') }}" class="login_social">
                <button type="submit">Login with Google</button>
            </form> --}}

            <button id="googleLogin">Login with Google</button>


        </div>
    </main>
    <x-footer />


    <script>
        
        const changeRegister = document.querySelector(".change-register");
        const changeLogin = document.querySelector(".change-login");

        changeRegister.addEventListener("click", () => {
            document.querySelector(".form-login").classList.add("hidden");
            document.querySelector(".form-register").classList.remove("hidden");
        });

        //   document.querySelector(".form-login").addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     console.log(
        //       document.querySelector(".form-login").elements["name"].value,
        //       document.querySelector(".form-login").elements["password"].value
        //     );
        //   });

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
                        window.location.href = "/login-register" // Xử lý phản hồi từ API (nếu cần)
                    })
                    .catch(e => {
                        console.log("===> Loi: ", e);
                    })
            }
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
                        // console.log("CHECK DATA: ", data);
                        
                        if (data.message == "Mật khẩu không hợp lệ!") {
                            message_login.innerHTML = "Mật khẩu không hợp lệ!";
                        } else if (data.message == "Email không hợp lệ!") {
                            message_login.innerHTML = "Email không hợp lệ!";
                        } else {
                            sessionStorage.setItem("email", data.data.email);
                            sessionStorage.setItem("token", data.token);
                            if (data.data.role == 1) {
                                window.location.href = "/customer_manager";
                            }
                            else {
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
