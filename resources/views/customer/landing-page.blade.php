<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

    <style>
        body {
            background: url(../img/snowflakes-background4.png);
        }
    </style>
    <script>
        async function fetchCategoriesData() {
            try {
                const categoriesRes = await fetch(`api/getproductpicforcategory`);
                const categoriesData = await categoriesRes.json();


                if (!categoriesData || !Array.isArray(categoriesData)) {
                    console.error('Invalid or missing data structure in API response');
                    return;
                }

                console.log(categoriesData);

                const categoryContainer = document.getElementById('DanhMucSanPham');
                categoryContainer.innerHTML = ``;

                let row = ``;
                categoriesData.forEach((category) => {
                    row += `
                    <div class="category-item text-center mb-[80px]">
                    <div class="overflow-hidden cursor-pointer rounded-xl relative group">
                        <div onClick="transportCateID(${category.id})" class="w-full h-full rounded-xl z-50 opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out cursor-pointer absolute flex items-center justify-center bg-[#000] bg-opacity-40">
                            <div class="font-bold px-[42px] py-[12px] text-[26px] text-white border-white border-solid border-4  ">
                                Chi
                                tiết</div>
                        </div>
                        <img alt="Image" class="object-cover w-full aspect-square group-hover:scale-110 transition duration-300 ease-in-out" srcset="${category.HinhAnh}" />
                    </div>
                    <a onClick="transportCateID(${category.id})" class="button-primary mt-[21px] ">${category.TenDM}</a>
                </div>
                    `
                });
                categoryContainer.innerHTML = row;
            } catch (error) {
                console.error('Error fetching product data:', error);
            }
        }
        fetchCategoriesData();

        function searchProduct() {
            keyword = document.getElementById('TimKiem').value;
            sessionStorage.setItem("keyword", keyword);
            window.location.href = "/product-page";

        }


        function searchEnter(event) {
            if (event.key === 'Enter') {
                console.log("enter");
                keyword = document.getElementById('TimKiem').value;
                sessionStorage.setItem("keyword", keyword);
                window.location.href = "/product-page";
            } else {
                return;
            }
        }

        async function transportCateID(id) {
            sessionStorage.setItem("categoryId", id);
            window.location.href = "/product-page";
        }

        async function transportProductID(id, maDM) {
            sessionStorage.setItem("productId", id);
            sessionStorage.setItem("maDM", maDM);
            window.location.href = "/detail-product-page";
        }

        async function fetchData() {
            try {
                const productRes = await fetch(`api/products/get-random-products/10`);
                const productData = await productRes.json();

                if (!productData || !Array.isArray(productData)) {
                    console.error('Invalid or missing data structure in API response');
                    return;
                }

                // const products = productData.data;

                console.log(productData);

                const swiperContainer = document.querySelector('#DanhSachSanPham');
                productData.forEach(product => {
                    const swiperSlide = document.createElement('div');
                    swiperSlide.classList.add('swiper-slide');

                    const productHTML = `
                    <div onClick="transportProductID(${product.id} , ${product.maDM})" class="h-full flex flex-col overflow-hidden">
                        <div class="aspect-square rounded-[3px] ">
                            <img class="object-cover h-full" src="${product.HinhAnh}"
                                alt="${product.TenSP}">
                        </div>
                        <div class="flex-1 flex flex-col px-[12px] md:px-[17px] md:py-[5px] py-[10px]">
                            <p class="h-1/3 flex-1 line-clamp-2 text-gray-700 md:text-[18px] text-[13px] font-bold">
                                ${product.TenSP}
                            </p>
                            <p class="h-1/3 text-desc">Thương hiệu: ${product.ThuongHieu}</p>
                            <div class="h-1/3 flex justify-between items-center price ">
                                <span class="md:text-[24px] text-[16px] current-price font-semibold text-teal-700">
                                    ${product.Gia.toLocaleString()}<span class="md:text-[20px] text-[14px]">đ</span>
                                </span>
                            </div>
                        </div>
                    </div>
                `;
                    swiperSlide.innerHTML = productHTML;
                    swiperContainer.appendChild(swiperSlide);
                });
            } catch (error) {
                console.error('Error fetching product data:', error);
            }
        }
        fetchData();
    </script>
</head>

<body class="bg-[#F9F9F9]">
    <x-header />
    <main class="container ">
        <div class="introduce-with-search mt-20">
            <div class="text-heading mb-10 text-center relative ">
                Tinh tế - Sang trọng <br>
                Chất lượng
                <img srcset="{{asset('img/stars-plus-wink.png')}} 2x" class="hidden lg:inline-block" alt="Image">
            </div>
            <div class="text-desc text-center mb-5 lg:mb-16">
                BiSys - Nơi tô điểm thế giới bên trong ngôi nhà của bạn !
            </div>
            <div class="relative">
                <div class="z-10 mb-5 lg:absolute lg:top-[0] lg:left-1/2  lg:-translate-x-1/2 lg:-translate-y-1/2 search-wrap text-center shadow-[0px 4px 80px rgba(175, 173, 181, 0.2)] ">
                    <div class="relative">
                        <img srcset="{{asset('img/arrow-spiral-down.png')}} 2x" class="lg-block hidden absolute top-[-270px] left-[-200px]" alt="Image">
                        <div class="absolute top-[50%] left-[20px] translate-y-[-50%] ">
                            <img srcset="{{asset('img/search-icon.png')}} 2x" alt="Image">
                        </div>
                        <div class="absolute lg:block hidden top-[50%]  right-[15px] translate-y-[-50%]">
                            <button onclick="searchProduct()" class="button-primary">Tìm kiếm</button>
                        </div>
                        <input id="TimKiem" onkeyup="searchEnter(event)" type="text" class="outline-1 outline-black w-full h-[70px] lg:h-[84px] md:w-[810px] pl-[70px] pr-20 rounded-lg z-0 text-[18px] " placeholder="Nhập từ khóa tìm kiếm...">
                    </div>
                </div>
                <img src="{{asset('img/introduce3.png')}}" class="w-full relative" alt="Image">

            </div>
            <div class="introduce-list lg:grid-cols-3 grid gap-x-4 gap-y-4">
                <div class="introduce-item bg-[#fff] ">
                    <div class="p-6  rounded-lg">
                        <div class="mb-1">
                            <img srcset="{{asset('img/various-product-icon.png')}} 2x" alt="Image">
                        </div>
                        <p class="text-desc text-justify font-bold text-[24px] mb-2 text-[#151411]">
                            Sản phẩm đa dạng
                        </p>
                        <p class="text-desc text-justify">
                            Hơn 100 sản phẩm với thiết kế, kiểu dáng độc đáo - giải pháp cho mọi ngóc ngách
                        </p>

                    </div>
                </div>
                <div class="introduce-item bg-[#fff] ">
                    <div class="p-6  rounded-lg">
                        <div class="mb-1">
                            <img srcset="{{asset('img/fast-icon.png')}} 2x" alt="Image">
                        </div>
                        <p class="text-desc text-justify font-bold text-[24px] mb-2 text-[#151411]">
                            Giao hàng nhanh chóng
                        </p>
                        <p class="text-desc text-justify">
                            Đội ngũ vận chuyển chuyên nghiệp. Cam kết sản phẩm sẽ đến tay người dùng trong 3-5 ngày kể
                            từ khi đặt hàng
                        </p>

                    </div>
                </div>
                <div class="introduce-item bg-[#fff] ">
                    <div class="p-6  rounded-lg">
                        <div class="mb-1">
                            <img srcset="{{asset('img/comfortable-money-icon.png')}} 2x" alt="Image">
                        </div>
                        <p class="text-desc text-justify font-bold text-[24px] mb-2 text-[#151411]">
                            Phù hợp với túi tiền
                        </p>
                        <p class="text-desc text-justify">
                            Cung cấp sản phẩm chất lượng thuộc nhiều phân khúc giá khác nhau và nhiều ưu đãi trong quá
                            trình mua sắm
                        </p>

                    </div>
                </div>

            </div>
        </div>


        <div class="md-block category mt-20">
            <div class="text-heading text-center">Danh mục</div>
            <div id="DanhMucSanPham" class="flex flex-wrap justify-center category-list mt-[45px] grid grid-cols-3 gap-x-10">
            </div>
        </div>


        <div class="product mt-20">
            <div class="text-heading text-center mb-[15px]">
                Sản phẩm nổi bật
            </div>
            <div class="text-desc text-center mb-[30px]">
                Dẫn đầu xu hướng năm 2023
            </div>
            <div class="swiper mySwiper1">
                <div class="swiper-wrapper" id="DanhSachSanPham">
                    <!-- <div class="swiper-slide">
                        <div class="rounded overflow-hidden ">
                            <div class="aspect-square bg-no-repeat bg-center bg-cover "
                                style="background-image: url('{{ asset(`img/product1.png`) }}')"></div>
                            <div class=" pt-[12px]">
                                <p class="text-gray-700 text-[18px]">
                                    Sofa
                                </p>
                                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">Sofa Empuk Banget</div>
                                <p class="text-desc">
                                    Using kapuk randu material
                                </p>
                                <div class="text-[24px] font-bold mb-2 mt-p[18px]">$58.39</div>
                            </div>

                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="rounded overflow-hidden ">
                            <div class="aspect-square bg-no-repeat bg-center bg-cover"
                                style="background-image:  url('{{ asset(`img/product2.png`) }}')"></div>
                            <div class=" pt-[12px]">
                                <p class="text-gray-700 text-[18px]">
                                    Sofa
                                </p>
                                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">Sofa Empuk Banget</div>
                                <p class="text-desc">
                                    Using kapuk randu material
                                </p>
                                <div class="text-[24px] font-bold mb-2 mt-p[18px]">$58.39</div>
                            </div>

                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="rounded overflow-hidden ">
                            <div class="aspect-square bg-no-repeat bg-center bg-cover"
                                style="background-image:  url('{{ asset(`img/product3.png`) }}')"></div>
                            <div class=" pt-[12px]">
                                <p class="text-gray-700 text-[18px]">
                                    Sofa
                                </p>
                                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">Sofa Empuk Banget</div>
                                <p class="text-desc">
                                    Using kapuk randu material
                                </p>
                                <div class="text-[24px] font-bold mb-2 mt-p[18px]">$58.39</div>
                            </div>

                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="rounded overflow-hidden ">
                            <div class="aspect-square bg-no-repeat bg-center bg-cover"
                                style="background-image: url('{{ asset(`img/product2.png`) }}')"></div>
                            <div class=" pt-[12px]">
                                <p class="text-gray-700 text-[18px]">
                                    Sofa
                                </p>
                                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">Sofa Empuk Banget</div>
                                <p class="text-desc">
                                    Using kapuk randu material
                                </p>
                                <div class="text-[24px] font-bold mb-2 mt-p[18px]">$58.39</div>
                            </div>

                        </div>

                    </div>
                    <div class="swiper-slide">
                        <div class="rounded overflow-hidden ">
                            <div class="aspect-square bg-no-repeat bg-center bg-cover"
                                style="background-image: url('{{ asset(`img/product3.png`) }}')"></div>
                            <div class=" pt-[12px]">
                                <p class="text-gray-700 text-[18px]">
                                    Sofa
                                </p>
                                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">Sofa Empuk Banget</div>
                                <p class="text-desc">
                                    Using kapuk randu material
                                </p>
                                <div class="text-[24px] font-bold mb-2 mt-p[18px]">$58.39</div>
                            </div>

                        </div>

                    </div> -->
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="my-custom-pagination-div"></div>
            </div>
        </div>
        <div class="introduce mt-10 lg:mt-40 grid lg:grid-cols-2 lg:gap-[50px]">
            <div class="flex flex-col">
                <div class="introduce-list flex-1">

                    <div class="introduce-item mb-[31px]">
                        <div class="text-heading mb-[22px]">
                            Được chế tạo thủ công bằng những nguyên vật liệu tốt nhất
                        </div>
                        <div class="text-desc mb-[22px]">
                            BiSys cam kết bảo hành 1 năm cho tất cả các sản phẩm.
                        </div>
                        <a href="" class="button-primary ">Tìm hiểu thêm</a>
                    </div>
                </div>
                <img class="hidden lg:block" src="{{asset('img/introduce1.png')}}" alt="Image">

            </div>
            <div class="flex flex-col">
                <div class="introduce-list flex-1 grid grid-cols-3">
                    <div class="introduce-item">
                        <div class="text-heading">
                            20+
                        </div>
                        <div class="text-desc max-w-[176px]">
                            Năm kinh nghiệm
                        </div>
                    </div>
                    <div class="introduce-item">
                        <div class="text-heading">
                            483
                        </div>
                        <div class="text-desc max-w-[176px]">
                            Khách hàng
                            hài lòng với sản phẩm
                        </div>
                    </div>
                    <div class="introduce-item">
                        <div class="text-heading">
                            150+
                        </div>
                        <div class="text-desc max-w-[176px]">
                            Đơn hàng được bán
                            mỗi quý
                        </div>
                    </div>

                </div>
                <img class="lg:hidden block mt-5" src="{{asset('img/introduce1.png')}}" alt="Image">
                <img src="{{asset('img/introduce2.png')}}" class="mt-5" alt="Image">
            </div>
        </div>
        <div class="rating mt-20 lg:mt-40">
            <div class="text-heading text-center mb-[30px]">
                Nhận xét của khách hàng
            </div>
            <div class="text-desc text-center mb-[50px]">
                Sự hài lòng của bạn là ưu tiên hàng đầu và quan trong nhất của chúng tôi
            </div>
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="rating-item ">
                            <div class="p-6 bg-gray-100 rounded-lg">
                                <div class="mb-5">
                                    <img srcset="{{asset('img/quote-up.png')}} 2x" alt="Image">
                                </div>

                                <p class="text-desc text-justify">
                                    Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
                                    nisi,
                                    adipiscing mauris non.
                                </p>
                                <div class="rating justify-between flex items-center">
                                    <div class="customer-info flex items-center">
                                        <img src="{{asset('img/avatar-customer.png')}}" alt="Image">
                                        <h3 class="text-[20px] font-bold ml-3">
                                            Janne Cooper
                                        </h3>
                                    </div>
                                    <div class="point-star flex items-center">
                                        <img srcset="{{asset('img/star.png 2x')}}" alt="Image">
                                        <h3 class="text-[18px] font-bold ml-1">
                                            4.5
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="rating-item ">
                            <div class="p-6 bg-gray-100 rounded-lg">
                                <div class="mb-5">
                                    <img srcset="{{asset('img/quote-up.png 2x')}}" alt="Image">
                                </div>

                                <p class="text-desc text-justify">
                                    Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
                                    nisi,
                                    adipiscing mauris non.
                                </p>
                                <div class="rating justify-between flex items-center">
                                    <div class="customer-info flex items-center">
                                        <img src="{{asset('img/avatar-customer.png')}}" alt="Image">
                                        <h3 class="text-[20px] font-bold ml-3">
                                            Janne Cooper
                                        </h3>
                                    </div>
                                    <div class="point-star flex items-center">
                                        <img srcset="{{asset('img/star.png')}} 2x" alt="Image">
                                        <h3 class="text-[18px] font-bold ml-1">
                                            4.5
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="rating-item ">
                            <div class="p-6 bg-gray-100 rounded-lg">
                                <div class="mb-5">
                                    <img srcset="{{asset('img/quote-up.png 2x')}}" alt="Image">
                                </div>

                                <p class="text-desc text-justify">
                                    Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
                                    nisi,
                                    adipiscing mauris non.
                                </p>
                                <div class="rating justify-between flex items-center">
                                    <div class="customer-info flex items-center">
                                        <img src="{{asset('img/avatar-customer.png')}}" alt="Image">
                                        <h3 class="text-[20px] font-bold ml-3">
                                            Janne Cooper
                                        </h3>
                                    </div>
                                    <div class="point-star flex items-center">
                                        <img srcset="{{asset('img/star.png 2x')}}" alt="Image">
                                        <h3 class="text-[18px] font-bold ml-1">
                                            4.5
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="rating-item ">
                            <div class="p-6 bg-gray-100 rounded-lg">
                                <div class="mb-5">
                                    <img srcset="{{asset('img/quote-up.png')}} 2x" alt="Image">
                                </div>

                                <p class="text-desc text-justify">
                                    Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
                                    nisi,
                                    adipiscing mauris non.
                                </p>
                                <div class="rating justify-between flex items-center">
                                    <div class="customer-info flex items-center">
                                        <img src="{{asset('img/avatar-customer.png')}}" alt="Image">
                                        <h3 class="text-[20px] font-bold ml-3">
                                            Janne Cooper
                                        </h3>
                                    </div>
                                    <div class="point-star flex items-center">
                                        <img srcset="{{asset('img/star.png 2x')}}" alt="Image">
                                        <h3 class="text-[18px] font-bold ml-1">
                                            4.5
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="rating-item ">
                            <div class="p-6 bg-gray-100 rounded-lg">
                                <div class="mb-5">
                                    <img srcset="{{asset('img/quote-up.png')}} 2x" alt="Image">
                                </div>

                                <p class="text-desc text-justify">
                                    Pellentesque etiam blandit in tincidunt at donec. Eget ipsum dignissim placerat
                                    nisi,
                                    adipiscing mauris non.
                                </p>
                                <div class="rating justify-between flex items-center">
                                    <div class="customer-info flex items-center">
                                        <img src="{{asset('img/avatar-customer.png')}}" alt="Image">
                                        <h3 class="text-[20px] font-bold ml-3">
                                            Janne Cooper
                                        </h3>
                                    </div>
                                    <div class="point-star flex items-center">
                                        <img srcset="{{asset('img/star.png 2x')}}" alt="Image">
                                        <h3 class="text-[18px] font-bold ml-1">
                                            4.5
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-custom-pagination-div"></div>
            </div>

        </div>
        <x-chatbot />

    </main>
    <!-- <footer class="mt-[100px] container  py-[60px] border-t border-t-[#ECE4DE] mb-20">
        <div class="flex items-center justify-center gap-y-[23px] flex-col">
            <div class="flex items-center justify-center gap-x-2 cursor-pointer">
                <img srcset="/assets/img/logo.png 2x" alt="logo" />
                <span class="font-medium text-[18px]">
                    BiSys - Yêu ngôi nhà của bạn
                </span>
            </div>
            <div class="flex items-center justify-center gap-x-[41px] cursor-pointer">
                <img src="/assets/icons/facebook.png" alt="facebook" />
                <img src="/assets/icons/instagram.png" alt="instagram" />
                <img src="/assets/icons/twitter.png" alt="twitter" />
            </div>
            <span class="font-medium text-2xl">Hãy theo dõi chúng tôi để cập nhật tin mới nhất !</span>
        </div>
    </footer> -->
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/snowy.js') }}"></script>

</body>

</html>