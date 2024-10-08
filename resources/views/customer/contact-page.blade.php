<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Page</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/slider-product.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
  </head>
  <body>
  <x-header />
    <main>
        <div
          class="mt-8 lg:mt-20 mb-4 lg:mb-16 flex items-center justify-center flex-col gap-y-[10px]"
        >
          <h1 class="text-[26px] lg:text-[44px] font-bold">Liên hệ</h1>
          <p class="text-[14px] lg:text-[18px] font-medium text-[#AFADB5]">
            Những góp ý của các bạn là động lực của chúng tôi
          </p>
        </div>
        <form class="container w-full lg:grid gap-x-6 grid-cols-12 mb-16 px-8 lg:px-[100px]">
            <div class="info col-span-7 relative">
                <div class="lg:flex items-center mb-6">
                    <div class="min-w-[140px]">
                        <label class="block text-[16px] lg:text-[20px] font-bold lg:text-right mb-1 pr-12" for="full-name">
                            Tên
                        </label>
                    </div>
                    <div class="w-full">
                        <input
                            class="text-[16px] lg:text-[20px] border-2 border-gray-200 rounded w-full py-2 px-4  focus:outline-none focus:bg-white focus:border-[#518581]"
                            id="full-name" type="text" value="">
                    </div>
                </div>
                <div class="lg:flex items-center mb-6">
                    <div class="min-w-[140px]">
                        <label class="block text-[16px] lg:text-[20px] font-bold lg:text-right mb-1 pr-12" for="email">
                            Email
                        </label>
                    </div>
                    <div class="w-full">
                        <input
                            class="text-[16px] lg:text-[20px] border-2 border-gray-200 rounded w-full py-2 px-4  focus:outline-none focus:bg-white focus:border-[#518581]"
                            id="email" type="email" value="">
                    </div>
                </div>
                <div class="lg:flex mb-6">
                    <div class="min-w-[140px]">
                        <label class="block text-[16px] lg:text-[20px] font-bold lg:text-right mb-1 pr-12" for="email">
                            Lời nhắn
                        </label>
                    </div>
                    <div class="w-full">
                        <textarea
                            type="textarea" rows="6"
                            class="h-[170px] text-[16px] lg:text-[20px] border-2 border-gray-200 rounded w-full py-2 px-4  focus:outline-none focus:bg-white focus:border-[#518581]"
                            id="message"></textarea>
                    </div>
                </div>
                <button
                    class="rounded-[10px] hover:drop-shadow-[5px_5px_4px_rgba(0, 0, 0, 0.25)] text-white border bg-[#FFB23F] h-[46px] w-full lg:w-[265px] lg:absolute right-0 bottom-0 mb-6 lg:mb-0">
                    <span class="text-white font-black text-[20px]">
                    Gửi
                    </span>
                </button>
            </div>
            <div class="grid-cols-1 flex justify-center items-center">
                <div class="bg-gray-400 w-[1px] h-4/5"></div>
            </div>
            <div class="col-span-4 rounded-[16px] bg-[#1E1E1E] aspect-square flex items-center">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="ml-5 mr-3" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36.75 7.5H5.25C4.55381 7.5 3.88613 7.76339 3.39384 8.23223C2.90156 8.70107 2.625 9.33696 2.625 10V30C2.625 30.663 2.90156 31.2989 3.39384 31.7678C3.88613 32.2366 4.55381 32.5 5.25 32.5H36.75C37.4462 32.5 38.1139 32.2366 38.6062 31.7678C39.0984 31.2989 39.375 30.663 39.375 30V10C39.375 9.33696 39.0984 8.70107 38.6062 8.23223C38.1139 7.76339 37.4462 7.5 36.75 7.5ZM33.8625 10L21 18.475L8.1375 10H33.8625ZM5.25 30V11.1375L20.2519 21.025C20.4716 21.1702 20.7326 21.2479 21 21.2479C21.2674 21.2479 21.5284 21.1702 21.7481 21.025L36.75 11.1375V30H5.25Z" fill="#F9F9F9"/>
                            </svg>
                        <span class="text-white text-[14px] lg:text-[18px]">tmmyphuong92@gmail.com</span>        
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="ml-5 mr-3" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30.9866 21.5127C30.8242 21.3501 30.6314 21.221 30.4191 21.133C30.2068 21.045 29.9792 20.9996 29.7494 20.9996C29.5195 20.9996 29.292 21.045 29.0797 21.133C28.8674 21.221 28.6745 21.3501 28.5121 21.5127L25.7226 24.3022C24.4294 23.9172 22.0161 23.0422 20.4866 21.5127C18.9571 19.9832 18.0821 17.57 17.6971 16.2767L20.4866 13.4872C20.6493 13.3249 20.7783 13.132 20.8664 12.9197C20.9544 12.7074 20.9997 12.4798 20.9997 12.25C20.9997 12.0202 20.9544 11.7926 20.8664 11.5803C20.7783 11.368 20.6493 11.1751 20.4866 11.0127L13.4866 4.01274C13.3242 3.85008 13.1314 3.72104 12.9191 3.633C12.7068 3.54495 12.4792 3.49963 12.2494 3.49963C12.0195 3.49963 11.792 3.54495 11.5796 3.633C11.3673 3.72104 11.1745 3.85008 11.0121 4.01274L6.26611 8.75874C5.60111 9.42374 5.22661 10.3372 5.24061 11.27C5.28086 13.762 5.94061 22.4175 12.7621 29.239C19.5836 36.0605 28.2391 36.7185 30.7329 36.7605H30.7819C31.7059 36.7605 32.5791 36.3965 33.2406 35.735L37.9866 30.989C38.1493 30.8266 38.2783 30.6338 38.3664 30.4215C38.4544 30.2092 38.4997 29.9816 38.4997 29.7517C38.4997 29.5219 38.4544 29.2943 38.3664 29.082C38.2783 28.8697 38.1493 28.6769 37.9866 28.5145L30.9866 21.5127ZM30.7644 33.2587C28.5804 33.222 21.1079 32.6357 15.2366 26.7627C9.34611 20.8722 8.77561 13.3735 8.74061 11.2332L12.2494 7.72449L16.7749 12.25L14.5121 14.5127C14.3064 14.7183 14.1552 14.9718 14.0721 15.2505C13.989 15.5291 13.9766 15.8241 14.0361 16.1087C14.0781 16.31 15.1054 21.0822 18.0104 23.9872C20.9154 26.8922 25.6876 27.9195 25.8889 27.9615C26.1733 28.0227 26.4686 28.0113 26.7475 27.9284C27.0264 27.8455 27.28 27.6938 27.4849 27.4872L29.7494 25.2245L34.2749 29.75L30.7644 33.2587Z" fill="#F9F9F9"/>
                            </svg>                        
                        <span class="text-white text-[14px] lg:text-[18px]">(+84) 904 824 936</span>        
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="ml-5 mr-3" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36.0938 38.0625V1.3125H5.90625V38.0625H1.3125V40.6875H40.6875V38.0625H36.0938ZM33.4688 38.0625H22.3125V32.8125H19.6875V38.0625H8.53125V3.9375H33.4688V38.0625Z" fill="#F9F9F9"/>
                            <path d="M13.125 24.9375H15.75V27.5625H13.125V24.9375ZM19.6875 24.9375H22.3125V27.5625H19.6875V24.9375ZM26.25 24.9375H28.875V27.5625H26.25V24.9375ZM13.125 17.0625H15.75V19.6875H13.125V17.0625ZM19.6875 17.0625H22.3125V19.6875H19.6875V17.0625ZM26.25 17.0625H28.875V19.6875H26.25V17.0625ZM13.125 9.1875H15.75V11.8125H13.125V9.1875ZM19.6875 9.1875H22.3125V11.8125H19.6875V9.1875ZM26.25 9.1875H28.875V11.8125H26.25V9.1875Z" fill="#F9F9F9"/>
                            </svg>                        
                        <span class="text-white text-[14px] lg:text-[18px]">Trường Đại học Công nghệ Thông tin</span>        
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="ml-5 mr-3" width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_217_4592)">
                            <path d="M21 9.1875C21 8.8394 20.8617 8.50556 20.6156 8.25942C20.3694 8.01328 20.0356 7.875 19.6875 7.875C19.3394 7.875 19.0056 8.01328 18.7594 8.25942C18.5133 8.50556 18.375 8.8394 18.375 9.1875V23.625C18.3751 23.8563 18.4363 24.0836 18.5525 24.2836C18.6686 24.4837 18.8356 24.6495 19.0365 24.7643L28.224 30.0143C28.5255 30.1772 28.8788 30.2157 29.2083 30.1217C29.5379 30.0276 29.8176 29.8083 29.9876 29.5108C30.1576 29.2132 30.2045 28.8609 30.1183 28.5293C30.032 28.1976 29.8195 27.9128 29.526 27.7357L21 22.8638V9.1875Z" fill="#F9F9F9"/>
                            <path d="M21 42C26.5695 42 31.911 39.7875 35.8492 35.8492C39.7875 31.911 42 26.5695 42 21C42 15.4305 39.7875 10.089 35.8492 6.15076C31.911 2.21249 26.5695 0 21 0C15.4305 0 10.089 2.21249 6.15076 6.15076C2.21249 10.089 0 15.4305 0 21C0 26.5695 2.21249 31.911 6.15076 35.8492C10.089 39.7875 15.4305 42 21 42V42ZM39.375 21C39.375 25.8734 37.4391 30.5471 33.9931 33.9931C30.5471 37.4391 25.8734 39.375 21 39.375C16.1266 39.375 11.4529 37.4391 8.00691 33.9931C4.56093 30.5471 2.625 25.8734 2.625 21C2.625 16.1266 4.56093 11.4529 8.00691 8.00691C11.4529 4.56093 16.1266 2.625 21 2.625C25.8734 2.625 30.5471 4.56093 33.9931 8.00691C37.4391 11.4529 39.375 16.1266 39.375 21V21Z" fill="#F9F9F9"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_217_4592">
                            <rect width="42" height="42" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>                        
                        <span class="text-white">08.00 - 16.00</span>        
                    </div>
                </div>
        </form>
    </main>
    <script src="{{ asset('js/snowy.js') }}"></script>

    <x-footer />
    
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
    <script src="../js/pagination.js"></script>
    
  </body>
</html>