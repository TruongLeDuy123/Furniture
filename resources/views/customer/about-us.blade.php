<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>About us</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/about-us.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
</head>

<body>
    <x-header />
    <main class="container px-8 lg:px-[100px]">

        <div class="category mt-8 lg:mt-20 mb-4 lg:mb-16">
            <div class="text-center">
                <h1 class="text-center text-[26px] lg:text-[64px] font-bold">Về chúng tôi</h1>
                <div class="gray-color text-[14px] lg:text-[18px] text-center font-medium mt-3">Chào mừng bạn đến với nội thất thông minh BiSys !
                </div>
                <div class="gray-color text-[14px] lg:text-[18px] text-center font-medium">
                    BiSys - Yêu ngôi nhà của bạn
                </div>
            </div>
        </div>
        <div class="mission">
            <span class="yellow-color text-[14px] lg:text-[18px] font-bold">Sứ mệnh của chúng tôi</span>
            <div class="lg:flex gap-x-20 mb-12 lg:mb-20">
                <div class="flex-1">
                    <div class="text-[24px] lg:text-[44px] font-bold mb-5">Mang đến cho khách hàng những dịch vụ tốt nhất
                    </div>
                    <div class="flex justify-between mb-5 lg:mb-0">
                        <div class="basis-1/3">
                            <p class="text-[24px] lg:text-[44px] font-bold">20+</p>
                            <p class="w-4/5 text-[14px] lg:text-[18px] text-gray font-medium">Năm kinh nghiệm</p>
                        </div>
                        <div class="basis-1/3">
                            <p class="text-[24px] lg:text-[44px] font-bold">483</p>
                            <p class="w-4/5 text-[14px] lg:text-[18px] text-gray font-medium">Khách hàng hài lòng với sản phẩm</p>
                        </div>
                        <div class="basis-1/3">
                            <p class="text-[24px] lg:text-[44px] font-bold">150+</p>
                            <p class="w-4/5 text-[14px] lg:text-[18px] text-gray font-medium">Đơn hàng được bán mỗi quý</p>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex mb-4">
                        <div class="mr-5">
                            <img srcset="{{asset('img/various-product-icon.png')}} 2x" alt="Image">
                        </div>
                        <div>
                            <p class="text-desc text-justify font-bold text-[16px] lg:text-[24px] mb-2 text-[#151411]">
                                Sản phẩm đa dạng
                            </p>
                            <p class="text-desc text-[14px] lg:text-[18px] text-justify text-gray">
                                Hơn 100 sản phẩm với thiết kế, kiểu dáng độc đáo - giải pháp cho mọi ngóc ngách
                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="mr-5">
                            <img srcset="{{asset('img/fast-icon.png 2x')}}" alt="Image">
                        </div>
                        <div>
                            <p class="text-desc text-justify font-bold text-[16px] lg:text-[24px] mb-2 text-[#151411]">
                                Giao hàng nhanh chóng
                            </p>
                            <p class="text-desc text-[14px] lg:text-[18px] text-justify text-gray">
                                Đội ngũ vận chuyển chuyên nghiệp. Cam kết sản phẩm sẽ đến tay người dùng trong 3-5 ngày kể
                                từ khi đặt hàng
                            </p>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="mr-5">
                            <img srcset="{{asset('img/comfortable-money-icon.png 2x')}}" alt="Image">
                        </div>
                        <div>
                            <p class="text-desc text-justify font-bold text-[16px] lg:text-[24px] mb-2 text-[#151411]">
                                Phù hợp với túi tiền
                            </p>
                            <p class="text-desc text-[14px] lg:text-[18px] text-justify text-gray">
                                Cung cấp sản phẩm chất lượng thuộc nhiều phân khúc giá khác nhau và nhiều ưu đãi trong quá
                                trình mua sắm
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="our-team">
            <div class="lg:w-1/2">
                <span class="yellow-color text-[14px] lg:text-[18px] font-bold">Our team</span>
                <div class="text-[24px] lg:text-[44px] font-bold">Meet our leading and strong&nbsp;team
                </div>
            </div>
            <div class="image-section lg:grid grid-cols-4 gap-x-10 gap-y-5 mt-4 lg:mt-16">
                <div class="image-section-item mb-8 lg:mb-0">
                    <img src="{{asset('img/doantuquynh.jpg')}}" alt="tuquynh" class=" shadow-2xl object-cover rounded-md aspect-square">
                    <div class="text-[14px] lg:text-[26px] font-bold mt-2">Đoàn Tú Quỳnh</div>
                    <div class="text-[12px] lg:text-[18px] gray-color">Developer</div>
                </div>
                <div class="image-section-item mb-8 lg:mb-0">
                    <img src="{{asset('img/myphuong.jpg')}}" alt="myphuong" class=" shadow-2xl object-cover rounded-md aspect-square">
                    <div class="text-[14px] lg:text-[26px] font-bold mt-2">Trần Ngọc Mỹ Phương</div>
                    <div class="text-[12px] lg:text-[18px] gray-color">Developer</div>
                </div>
                <div class="image-section-item mb-8 lg:mb-0">
                    <img src="{{asset('img/thanhhieu.jpg')}}" alt="thanhhieu" class=" shadow-2xl object-cover rounded-md aspect-square">
                    <div class="text-[14px] lg:text-[26px] font-bold mt-2">Trần Thanh Hiếu</div>
                    <div class="text-[12px] lg:text-[18px] gray-color">Developer</div>
                </div>
                <div class="image-section-item mb-8 lg:mb-0">
                    <img src="{{asset('img/duytruong.jpg')}}" alt="duytruong" class=" shadow-2xl object-cover rounded-md aspect-square">
                    <div class="text-[14px] lg:text-[26px] font-bold mt-2">Lê Duy Trường</div>
                    <div class="text-[12px] lg:text-[18px] gray-color">Developer</div>
                </div>

            </div>
        </div>
        <x-chatbot />
    </main>
    <x-footer />
</body>

</html>