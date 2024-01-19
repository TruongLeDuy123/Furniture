<img hidden id="truong" src="https://nguyencongnam.id.vn/wp-content/uploads/2023/11/ft.png" alt="">
<footer class="hidden lg:block container bg-white py-[60px] border-t border-t-[#ECE4DE]">
  <img hidden id="truong1" src="https://nguyencongnam.id.vn/wp-content/uploads/2023/11/bottomleft.png">
  <div class="flex items-center justify-center gap-y-[23px] flex-col">
    <div class="flex items-center justify-center gap-x-2 cursor-pointer">
      <img srcset="{{asset('img/logo.png')}} 2x" alt="logo" />
      <span class="font-medium text-[18px]">
        BiSys - Yêu ngôi nhà của bạn
      </span>
    </div>
    <div class="flex items-center justify-center gap-x-[41px] cursor-pointer">
      <img src="{{asset('icons/facebook.png')}}" alt="facebook" />
      <img src="{{asset('icons/instagram.png')}}" alt="instagram" />
      <img src="{{asset('icons/twitter.png')}}" alt="twitter" />
    </div>
    <span class="font-medium text-2xl">Hãy theo dõi chúng tôi để cập nhật tin mới nhất !</span>
  </div>
</footer>

<footer class="block lg:hidden p-5">
  <div class="border-t border-t-[#AD7E5C]">
    <div class="flex items-center justify-start gap-x-2 cursor-pointer my-5">
      <img srcset="{{asset('img/logo.png')}} 2.5x" alt="#" />
      <span class="font-medium text-[18px]"> BiSys </span>
    </div>
    <p class="font-medium text-sm text-[#AFADB5] my-5">
      BiSys is digital agency that help you make better experience iaculis
      cras in.
    </p>

    <div class="flex items-start justify-between gap-x-[35px]">
      <div class="flex flex-col items-start justify-center gap-y-[14px]">
        <span class="font-bold">Product</span>
        <div class="flex flex-col items-start justify-center gap-y-[6px]">
          <span class="font-medium text-sm text-[#AFADB5]">New Arrivals</span>
          <span class="font-medium text-sm text-[#AFADB5]">Best Selling</span>
          <span class="font-medium text-sm text-[#AFADB5]">Home Decor</span>
          <span class="font-medium text-sm text-[#AFADB5]">Kitchen Set</span>
        </div>
      </div>

      <div class="flex flex-col items-start justify-center gap-y-[14px]">
        <span class="font-bold">Services</span>
        <div class="flex flex-col items-start justify-center gap-y-[6px]">
          <span class="font-medium text-sm text-[#AFADB5]">Catalog</span>
          <span class="font-medium text-sm text-[#AFADB5]">Blog</span>
          <span class="font-medium text-sm text-[#AFADB5]">Faq</span>
          <span class="font-medium text-sm text-[#AFADB5]">Pricing</span>
        </div>
      </div>

      <div class="flex flex-col items-start justify-center gap-y-[14px]">
        <span class="font-bold">Follow Us</span>
        <div class="flex flex-col items-start justify-center gap-y-[6px]">
          <span class="font-medium text-sm text-[#AFADB5]">Facebook</span>
          <span class="font-medium text-sm text-[#AFADB5]">Instagram</span>
          <span class="font-medium text-sm text-[#AFADB5]">Twitter</span>
        </div>
      </div>
    </div>
  </div>
</footer>
<script>
  if (window.location.pathname === "/") {
    var LeftImg = document.getElementById("truong");
    var RightImg = document.getElementById("truong1");
    LeftImg.removeAttribute("hidden");
    RightImg.removeAttribute("hidden");
  }
</script>