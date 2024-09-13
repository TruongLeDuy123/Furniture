<style>
    #linkCart1 {
        position: relative;
    }

    .totalCart {
        font-size: 14px;
        display: flex;
        width: 20px;
        height: 20px;
        background-color: red;
        justify-content: center;
        align-items: center;
        color: #fff;
        border-radius: 50%;
        position: absolute;
        top: 60%;
        right: -10px;
    }
</style>

<header class="z-50 hidden lg:block sticky top-0 bg-white shadow-[0px_5px_6px_rgba(0,_0,_0,_0.25)]">
    <img hidden id="corner_left" src="https://nguyencongnam.id.vn/wp-content/uploads/2023/11/topleft.png">
    <img hidden id="corner_right" src="https://nguyencongnam.id.vn/wp-content/uploads/2023/11/topright.png">
    <div class="container py-[25px] flex items-center justify-between">
        <div class="flex items-center justify-center gap-x-2 cursor-pointer">
            <img srcset="{{ asset('img/logo.png') }} 2x" alt="#" />
            <span class="font-medium text-[18px]">
                BiSys - Yêu ngôi nhà của bạn
            </span>
        </div>
        <div class="flex items-center justify-center gap-x-[60px] font-medium text-[18px] cursor-pointer">
            <a href="{{ route('landing-page') }}">Home</a>
            <a href="{{ route('product') }}">Sản phẩm</a>
            <a href="{{ route('about-us') }}">Về chúng tôi</a>
        </div>
        <div class="flex items-center justify-center gap-x-6 text-[18px] cursor-pointer">
            <a id="linkCart1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <span id="totalCart"></span>
            </a>
            <a id="linkProfile1" class="flex items-center justify-center gap-x-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                <span id="username1" class="font-bold"></span>
            </a>
        </div>
    </div>
</header>

<header class="z-50 sticky top-0 lg:hidden bg-white shadow-[0px_1px_2px_rgba(0,_0,_0,_0.1)]">
    <div class="w-full mx-auto p-5 flex justify-between">
        <div class="flex items-center justify-start gap-x-2 cursor-pointer">
            <img srcset="{{ asset('img/logo.png') }} 2.5x" alt="#" />
            <span class="font-medium text-[18px]"> BiSys </span>
        </div>
        <input hidden type="checkbox" class="nav__input" id="nav-mobile-input" />
        <label for="nav-mobile-input" class="z-50 label-moblie">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </label>

        <label for="nav-mobile-input" class="overlay"></label>

        <div class="menu-content">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('landing-page') }}">Home</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('product') }}">Sản phẩm</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('about-us') }}">Về chúng tôi</a>
                </li>
            </ul>

            <div class="absolute pl-[30px] bottom-10">
                <!-- <button class="px-[16px] py-[8px] text-white bg-[#518581]">
        Đăng nhập
      </button> -->
                <!-- After login -->
                <div class="flex items-center justify-center gap-x-3 text-[18px] cursor-pointer">
                    <a id="linkCart2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                    </a>
                    <a id="linkProfile2" class="flex items-center justify-center gap-x-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span id="username2" class="font-bold text-sm truncate max-w-[70px]"></span>
                    </a>
                </div>
            </div>
</header>

<script>
    var email = sessionStorage.getItem("email");

    var linkProfile1 = document.getElementById("linkProfile1");
    var linkCart1 = document.getElementById("linkCart1");
    var username1 = document.getElementById("username1");

    var linkProfile2 = document.getElementById("linkProfile2");
    var linkCart2 = document.getElementById("linkCart2");
    var username2 = document.getElementById("username2");

    document.getElementById("linkCart1").addEventListener('click', function(event) {
        sessionStorage.setItem("href", "/cart-information");
    })

    document.getElementById("linkCart2").addEventListener('click', function(event) {
        sessionStorage.setItem("href", "/cart-information");
    })

    if (!email || email == "null") {
        let currentUrl = window.location.href;
        if (currentUrl.includes("/profile-page") || currentUrl.includes("/login-register?email")) {
            window.location.replace("/login-register")
        }

        linkProfile1.href = "/login-register";
        linkCart1.href = "/login-register";
        linkProfile2.href = "/login-register";
        linkCart2.href = "/login-register";
    } else {
        let currentUrl = window.location.href;
        if (currentUrl.includes("/login-register")) {
            window.location.href = "/profile-page"
        }

        linkProfile1.href = "/profile-page";
        linkCart1.href = "/cart-information";

        linkProfile2.href = "/profile-page";
        linkCart2.href = "/cart-information";
        fetch(`/api/customers/email/${email}`)
            .then(response => response.json())
            .then(data => {
                username1.innerHTML = data.HoTen;
				
                username2.innerHTML = data.HoTen;
                sessionStorage.setItem("id", data.id)   
                sessionStorage.setItem("HoTen", data.HoTen)
                sessionStorage.setItem("SDT", data.SDT)
                sessionStorage.setItem("DiaChi", data.DiaChi)
                sessionStorage.setItem("ThanhPho", data.ThanhPho)
            });
    }

    async function fetchTotalCart() {
        var id = sessionStorage.getItem('id');
        var numCart = 0;
        if (id == null) {
            totalCart.classList.remove("totalCart");
            totalCart.textContent = "";
        } else {
            await fetch(`/api/carts/makh/${id}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(cart => {
                        numCart += cart.SoLuong;
                    })
                });
            var totalCart = document.getElementById("totalCart");
            if (numCart == 0) {
                totalCart.classList.remove("totalCart");
                totalCart.textContent = "";
            } else {
                totalCart.classList.add("totalCart");
                totalCart.textContent = numCart;
            }
            sessionStorage.setItem("totalCart", numCart);
        }
    }
    document.addEventListener('DOMContentLoaded', async function() {
        if (sessionStorage.getItem("email") != null) {
            await fetchTotalCart();

        }
    });

    if (window.location.pathname === "/") {
        var cornerLeftImg = document.getElementById("corner_left");
        var cornerRightImg = document.getElementById("corner_right");
        cornerLeftImg.removeAttribute("hidden");
        cornerRightImg.removeAttribute("hidden");
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
