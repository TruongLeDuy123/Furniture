<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Product Page</title>
  <link rel="stylesheet" href="resources\css\styles.css" />
  <link rel="stylesheet" href="resources\css\slider-product.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
  <main>
    <div>hello</div>
    <div class="mt-[50px] lg:mt-[128px] mb-[50px] flex items-center justify-center flex-col gap-y-[20px]">
      <h1 class="text-[26px] lg:text-[64px] font-bold">Sản phẩm</h1>
      <p class="text-sm lg:text-[18px] font-medium text-[#AFADB5] text-center lg:p-0 p-5">
        Nội thất tinh xảo, với các chi tiết độc đáo mang lại phong cách hiện
        đại và thanh lịch giúp không gian sống của bạn năng động và xinh xắn
      </p>
    </div>
    <div class="swiper mySwiper z-[-1]">
      <div class="swiper-wrapper">
        <div class="swiper-slide slider-1">
          <div class="w-full h-full flex items-start justify-center ml-5 lg:ml-[132px] lg:gap-y-5 gap-y-3 flex-col">
            <span
              class="font-medium text-[10px] lg:text-sm bg-[#518581] rounded-[16px] lg:px-[16px] lg:py-[8px] px-[10px] py-[6px]">Discount</span>
            <h2 class="text-base lg:text-[44px] font-bold">
              Ramadhan Sale Offer
            </h2>
            <p class="lg:text-[24px] text-[12px] font-medium">
              Giảm giá 40% cho đơn hàng đầu tiên trên BiSys
            </p>
          </div>
        </div>
        <div class="swiper-slide slider-2">
          <div class="w-full h-full flex items-start justify-center ml-5 lg:ml-[132px] lg:gap-y-5 gap-y-3 flex-col">
            <span
              class="font-mediup text-[10px] lg:text-sm bg-[#518581] rounded-[16px] lg:px-[16px] lg:py-[8px] px-[10px] py-[6px]">Discount</span>
            <h2 class="text-base lg:text-[44px] font-bold">
              Ramadhan Sale Offer
            </h2>
            <p class="lg:text-[24px] text-[12px] font-medium">
              Giảm giá 40% cho đơn hàng đầu tiên trên BiSys
            </p>
          </div>
        </div>
        <div class="swiper-slide slider-3">
          <div class="w-full h-full flex items-start justify-center ml-5 lg:ml-[132px] lg:gap-y-5 gap-y-3 flex-col">
            <span
              class="font-mediup text-[10px] lg:text-sm bg-[#518581] rounded-[16px] lg:px-[16px] lg:py-[8px] px-[10px] py-[6px]">Discount</span>
            <h2 class="text-base lg:text-[44px] font-bold">
              Ramadhan Sale Offer
            </h2>
            <p class="lg:text-[24px] text-[12px] font-medium">
              Giảm giá 40% cho đơn hàng đầu tiên trên BiSys
            </p>
          </div>
        </div>
        <div class="swiper-slide slider-4">
          <div class="w-full h-full flex items-start justify-center ml-5 lg:ml-[132px] lg:gap-y-5 gap-y-3 flex-col">
            <span
              class="font-mediup text-[10px] lg:text-sm bg-[#518581] rounded-[16px] lg:px-[16px] lg:py-[8px] px-[10px] py-[6px]">Discount</span>
            <h2 class="text-base lg:text-[44px] font-bold">
              Ramadhan Sale Offer
            </h2>
            <p class="lg:text-[24px] text-[12px] font-medium">
              Giảm giá 40% cho đơn hàng đầu tiên trên BiSys
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
    <div
      class="container shadow-[0px_4px_120px_rgba(175,173,181,0.25)] w-full lg:w-[90%] bg-white my-[30px] lg:mt-[40px] lg:mb-[50px] px-[30px] py-[15px] flex items-center justify-center">
      <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" class=" ">
        <path
          d="M15.9645 28C22.9601 28 28.6312 22.3289 28.6312 15.3333C28.6312 8.33769 22.9601 2.66663 15.9645 2.66663C8.96891 2.66663 3.29785 8.33769 3.29785 15.3333C3.29785 22.3289 8.96891 28 15.9645 28Z"
          stroke="#AFADB5" strokeWidth="{2}" strokeLinecap="round" strokeLinejoin="round" />
        <path d="M29.9645 29.3333L27.2979 26.6666" stroke="#AFADB5" strokeWidth="{2}" strokeLinecap="round"
          strokeLinejoin="round" />
      </svg>
      <input type="text" class="outline-none px-[8px] lg:px-[18px] w-full h-[38px] lg:h-[66px] text-sm lg:text-base"
        placeholder="Nhập từ khóa tìm kiếm" />
      <button
        class="text-white bg-[#518581] w-[169px] h-[38px] lg:h-[66px] lg:px-[33px] lg:py-[18px] px-[20px] py-[6px] text-sm lg:text-[18px] font-bold">
        Tìm kiếm
      </button>
    </div>

    <!-- Mobile products display -->
    <div class="lg:hidden heading-category flex items-center justify-start gap-x-[10px] p-5">
      <h1 class="font-bold text-[18px]">Sản phẩm</h1>
      <span
        class="w-[41px] h-[26px] rounded-3xl font-bold text-[12px] text-[#518581] px-4 py-[4.5px] bg-[#F9F9F9] flex items-center justify-center">184</span>
    </div>

    <div class="flex products-wrap container items-baseline justify-center lg:gap-x-[62px]">
      <div class="products-category flex items-center justify-center flex-col max-w-[296px] gap-y-[9px] gap-y-[9px]">
        <div class="hidden lg:flex heading-category items-center justify-center gap-x-[10px]">
          <h1 class="font-bold text-[18px] lg:text-[44px]">Sản phẩm</h1>
          <span
            class="lg:w-[60px] lg:h-[30px] w-[41px] h-[26px] rounded-3xl font-bold text-[12px] lg:text-lg text-[#518581] px-4 py-[4.5px] bg-[#F9F9F9] flex items-center justify-center">184</span>
        </div>
        <span class="hidden lg:flex items-center justify-center gap-x-4">
          <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-[31px] h-[31px]">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M14.1974 0.654419L26.5199 11.8919L25.1443 13.2675L23.1874 11.4928V24.1369L22.2186 25.1057H16.4061L15.4374 24.1369V17.3557H11.5624V24.1369L10.5936 25.1057H4.78114L3.81239 24.1369V11.5083L1.87489 13.2675L0.499268 11.8919L12.8024 0.654419H14.1974ZM5.74989 9.74711V23.1682H9.62489V16.3869L10.5936 15.4182H16.4061L17.3749 16.3869V23.1682H21.2499V9.73548L13.4999 2.70817L5.74989 9.74711Z"
              fill="black" />
          </svg>
          <p class="text-center text-[24px] font-bold">
            <span class="text-[#AFADB5]">Trang chủ /</span> Sản phẩm
          </p>
        </span>
        <div class="hidden lg:flex items-center justify-center flex-col gap-y-[9px]">
          <div class="text-center w-[296px] h-[54px] text-white bg-[#518581] py-3 font-bold text-2xl leading-none">
            Danh mục
          </div>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Nội thất phòng ăn
          </button>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Nội thất phòng ngủ
          </button>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Nội thất phòng tắm
          </button>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Nội thất văn phòng
          </button>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Nội thất phòng khách
          </button>
          <button
            class="h-full w-full bg-white font-light text-2xl py-3 text-center bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
            Đồ trang trí
          </button>
        </div>
        <div class="hidden lg:flex items-center justify-center flex-col gap-y-[9px]">
          <div
            class="text-center w-[296px] h-[54px] text-white bg-[#518581] py-3 font-bold text-2xl leading-none flex items-center justify-center gap-x-[10px]">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M28.125 3.75V6.88125L18.75 15.8044V26.25H11.25V15.8044L1.875 6.87937V3.75H28.125ZM13.125 15V24.375H16.875V15L26.25 6.075V5.625H3.75V6.075L13.125 15Z"
                fill="#F9F9F9" />
            </svg>

            <span>Bộ lọc sản phẩm</span>
          </div>
          <div class="h-full w-full bg-white font-medium text-2xl py-3 text-left text-[#FFB23F]">
            Theo giá
          </div>
          <label for="5-10" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="5-10" class="w-8 h-8" />
              <span>Từ 5 - 10 triệu</span>
            </div>
          </label>
          <label for="10-20" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="10-20" class="w-8 h-8" />
              <span>Từ 10 - 20 triệu</span>
            </div>
          </label>
          <label for="over20" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="over20" class="w-8 h-8" />
              <span>Trên 20 triệu</span>
            </div>
          </label>
          <div class="h-full w-full bg-white font-medium text-2xl py-3 text-left text-[#FFB23F]">
            Theo thương hiệu
          </div>
          <label for="Savilamp" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="Savilamp" class="w-8 h-8" />
              <span>Savilamp</span>
            </div>
          </label>
          <label for="Francoferri" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="Francoferri" class="w-8 h-8" />
              <span>Francoferri</span>
            </div>
          </label>
          <label for="Giorgio Collection" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="Giorgio Collection" class="w-8 h-8" />
              <span>Giorgio Collection</span>
            </div>
          </label>
          <label for="Bentley" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="Bentley" class="w-8 h-8" />
              <span>Bentley</span>
            </div>
          </label>
          <label for="Pandana" class="w-full select-none">
            <div
              class="h-full w-full bg-white font-light text-2xl py-3 pl-[35px] bg-[#F9F9F9] active:shadow-[4px_4px_4px_rgba(0,0,0,0.25)] flex items-center gap-x-[10px]">
              <input type="checkbox" name="" id="Pandana" class="w-8 h-8" />
              <span>Pandana</span>
            </div>
          </label>
        </div>
      </div>
      <div class="lg:flex-1">
        <div class="hidden lg:flex items-center justify-end gap-x-3 cursor-pointer">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 7H21" stroke="#151411" strokeWidth="1.5" strokeLinecap="round" />
            <path d="M6 12H18" stroke="#151411" strokeWidth="1.5" strokeLinecap="round" />
            <path d="M10 17H14" stroke="#151411" strokeWidth="1.5" strokeLinecap="round" />
          </svg>

          <span class="text-[18px] font-medium">Sắp xếp theo</span>
        </div>
        <div id="data-container"
          class="lg:mt-[76px] grid grid-cols-2 md:grid-cols-3 md:gap-x-[25px] lg:gap-y-[45px] gap-x-3 gap-y-[15px]">
          <!-- Product 1 -->
          <a href="{{ route('detail-product') }}" class="hover:-translate-y-2 overflow-hidden rounded-[3px] shadow product-item bg-[#fff]">
            <div class="h-full flex flex-col overflow-hidden">
              <div class="aspect-square  rounded-[3px] ">
                <img class="object-cover h-full" src="../assets/img/product2.png"
                  alt="Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt">
              </div>
              <div class="flex-1 flex flex-col px-[12px] md:px-[17px] md:py-[20px] py-[14px]">
                <p class="flex-1 line-clamp-2 text-gray-700 md:text-[18px] text-[13px] ">
                  Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt
                </p>
                <div class="flex justify-between items-center mt-3 price ">
                  <span class="md:text-[24px] text-[16px] current-price font-semibold color-orange">
                    300.000<span class="md:text-[20px] text-[14px]">đ</span>
                  </span>
                  <span class="md:text-[18px] ml-[4px] text-[13px] old-price line-through text-slate-500">
                    400.000đ
                  </span>
                </div>
                <div class="md:text-[18px] text-[14px] mt-2">
                  Số lượng:
                  <span class="md:text-[18px] text-[14px] font-medium ">100</span>
                </div>
                <!-- <div class="md:text-[18px] text-[14px] mt-1 current-price font-semibold color-orange">
                                
                                  Hết hàng
                                
                              </div> -->
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    </div>
    <!-- <div class="container flex items-center justify-center my-[52px]">
            <div id="pagination" class="flex items-center justify-center">
              <a href="javascript:prevPage()" id="btn_prev" class="p-[10px]">
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 32 32"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20.1201 26.56L11.4268 17.8667C10.4001 16.84 10.4001 15.16 11.4268 14.1333L20.1201 5.44"
                    stroke="#151411"
                    strokeWidth="1.5"
                    strokeMiterlimit="{10}"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                  />
                </svg>
              </a>
              <ul
                id="pages"
                class="flex items-center justify-center text-[18px] font-medium"
              ></ul>
              <a href="javascript:nextPage()" id="btn_next" class="p-[10px]">
                <svg
                  width="32"
                  height="32"
                  viewBox="0 0 32 32"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.8799 26.56L20.5732 17.8667C21.5999 16.84 21.5999 15.16 20.5732 14.1333L11.8799 5.44"
                    stroke="#151411"
                    strokeWidth="1.5"
                    strokeMiterlimit="{10}"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                  />
                </svg>
              </a>
            </div>
          </div> -->



  </main>
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      autoplay: {
        delay: 2000,
      },
      loop: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
      loop: true,
    });
  </script>

  <script src="/javascripts/insertHeaderFooter.js"></script>
</body>
</html>