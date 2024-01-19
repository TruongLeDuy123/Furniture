<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

  <!-- Google Fonts Link For Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      fetchProduct();
      fetchData();
    });
    var id = sessionStorage.getItem('productId');
    // console.log("id:", id);
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("MaSP").textContent = id;
      fetchProduct();
    });
    async function fetchProduct() {
      // await fetchCategories();
      // console.log("id:", id);
      const response = await fetch(`/api/products/${id}`);
      const data = await response.json();
      // console.log(data);

      document.getElementById("TenSP").textContent = data.TenSP;
      document.getElementById("THieu").textContent = data.ThuongHieu;
      var TTrang = document.getElementById("TinhTrang");
      window.TongSL = data.TongSL;
      //Xem còn trong kho hay không
      if (data.TongSL > 0) {
        TTrang.textContent = "Còn trong kho";

      } else {
        TTrang.classList.add('text-red-600');
        TTrang.classList.add('font-bold');

        TTrang.classList.remove('font-light');
        TTrang.textContent = "Hết hàng";
      }
      document.getElementById("ChiTiet").innerHTML = data.ChiTiet;
      document.getElementById("Gia").textContent = data.Gia.toLocaleString() + 'đ';
      document.getElementById("HinhAnh").setAttribute("src", data.HinhAnh);
      document.getElementById("HinhAnh").setAttribute("alt", data.TenSP);

      // document.getElementById("NSX").value = data.NSX;

      // document.getElementById("DanhMucSp").value = data.MaDM;
    }

    async function fetchData() {
      let maDM = sessionStorage.getItem('maDM');
      // console.log('Mã danh mục: ', maDM);
      // console.log('type', typeof(maDM));

      fetch(`/api/products/get-similar-products/carId=${maDM}&count=6`)
        .then(response => response.json())
        .then(data => {
          // console.log(data); //NULL

          const recProductListElement = document.getElementById('recProduct');
          let row = '';
          data.forEach(product => {
            row += `
              <a onclick="detailProduct(${product.id},${product.MaDM})" class="cursor-pointer product-item rounded overflow-hidden">
              <div
                class="aspect-square bg-no-repeat bg-center bg-cover"
                style="background-image: url('${product.HinhAnh}')"
              ></div>
              <div class="pt-[12px]">
                <div class=" text-[26px] mt-[6px] mb-[6px]">
                  ${product.TenSP}
                </div>
                <p class="text-desc">${product.ThuongHieu}</p>
                <div class="text-[24px] font-semibold mb-2 mt-[15px]">${product.Gia.toLocaleString()}<span>đ</span></div>
              </div>
            </a> 
              `;
          })
          recProductListElement.innerHTML = row
        })

    }
  </script>
</head>

<body>
  <x-header />

  <div class="container pt-[84px]">
    <div class="flex grid lg:grid-cols-2 grid-cols-1 gap-x-[50px]">
      <div>
        <!-- Đường dẫn -->
        <div class="flex gap-x-2 pb-[13px]">
          <span class="pt-[5px]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[26px]">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
          </span>
          <p class="lg:text-2xl text-xs">
            <span class="lg:text-2xl text-xs text-gray-500"> <span> <a href="{{route('landing-page')}}">Trang chủ</a></span> /
              <span> <a href="{{route('product')}}">Sản phẩm</a></span> /
              <span><a href="{{route('detail-product')}}"> Thông tin sản phẩm</a></span>
            </span>
          </p>
        </div>
        <!-- Ảnh sản phẩm -->
        <div>
          <img id="HinhAnh" />
        </div>
      </div>

      <div class="pt-[45px] gap-y-3">
        <p id="TenSP" class="font-bold lg:text-[44px] text-[24px]"></p>
        <!-- <p
            class="font-medium text-gray-500 lg:text-[18px] text-[14px] pt-[10px]"
          >
            Sự kết hợp của gỗ và len
          </p> -->
        <p class="leading-[180%] pt-[10px]">
          <span class="font-medium text-[#AD7E5C] lg:text-[18px] text-[14px]">Mã sản phẩm</span>
          :
          <span id="MaSP" class="font-light lg:text-[18px] text-[14px]"></span>
          <br />
          <span class="font-medium text-[#AD7E5C] lg:text-[18px] text-[14px]">Thương hiệu</span>
          :
          <span id="THieu" class="font-light lg:text-[18px] text-[14px]"></span>
          <br />
          <span class="font-medium text-[#AD7E5C] lg:text-[18px] text-[14px]">Tình trạng</span>
          :
          <span id="TinhTrang" class=" font-light lg:text-[18px] text-[14px]">Còn trong kho</span>
          <br />
          <br />
          <span id="ChiTiet" class="text-gray-500 pt-[10px] lg:text-[18px] text-[14px] w-[590px] h-[96px]">
          </span>
          <!-- ĐỌC THÊM -->
          <!-- <span class="text-[#518581] lg:text-[18px] text-[14px] font-medium"
              >Đọc thêm</span
            > -->
        </p>
        <!-- Giá sản phẩm -->
        <div class="gap-x-3 pt-[19px]">
          <p>
            <span id="Gia" class="font-bold lg:text-4xl text-2xl">đ</span>

            <!-- DISCOUNT -->
            <!-- <span class="lg:text-4xl text-2xl text-gray-500">-</span> -->
            <!-- <span
                class="font-normal lg:text-4xl text-2xl text-gray-400 italic line-through align-bottom"
                >2.500.000đ</span
              > -->
          </p>
        </div>
        <!-- Số lượng -->
        <div class="flex gap-x-[50px] pt-[27px]">
          <span>
            <p class="font-normal lg:text-3xl text-lg text-gray-400">
              Số lượng
            </p>
          </span>
          <!-- Button số lượng -->
          <div class="wrapper lg:h-[40px] h-[32px] lg:w-[180px] w-[150px] flex justify-center items-center rounded shadow-[0_5px_5px_rgba(0,0,0,0.2)]">
            <span class="minus">-</span>
            <span id="quantity" class="num">1</span>
            <span class="plus">+</span>
          </div>
        </div>

        <div class="flex grid grid-cols-2 gap-x-[20px] pt-[24px]">
          <div>
            <button onclick="Payment()" class="bg-[#518581] lg:w-[285px] w-36 lg:h-[58px] h-10 border">
              <span class="font-bold lg:text-[18px] text-[14px] text-[#F9F9F9]">Mua ngay</span>
            </button>
          </div>
          <div>
            <button onclick="handleAddProduct()" class="lg:w-[285px] w-36 lg:h-[58px] h-10 border">
              <span class="font-bold lg:text-[18px] text-[14px]">Thêm vào giỏ hàng</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="pt-[50px] pb-[100px]">
      <p class="font-bold lg:text-[32px] text-[24px] text-[#151411]">
        Sản phẩm tương tự
      </p>
      <div class="pt-[30px]">
        <div id="recProduct" class="product-list grid grid-cols-3 gap-x-8 gap-y-8">
          <!-- 1 row -->
          <!-- <div class="product-item rounded overflow-hidden">
              <div
                class="aspect-square bg-no-repeat bg-center bg-cover"
                style="background-image: url('{{asset(`img/brown-chair.png`)}}')"
              ></div>
              <div class="pt-[12px]">
                <p class="text-desc font-bold">Sofa</p>
                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">
                  Sofa Empuk Banget
                </div>
                <p class="text-desc">Using kapuk randu material</p>
                <div class="text-[24px] font-bold mb-2 mt-[18px]">$58.39</div>
              </div>
            </div> -->

          <!-- <div class="product-item rounded overflow-hidden">
              <div
                class="aspect-square bg-no-repeat bg-center bg-cover"
                style="background-image: url('{{asset(`img/brown-chair.png`)}}')"
              ></div>
              <div class="pt-[12px]">
                <p class="text-desc font-bold">Sofa</p>
                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">
                  Sofa Empuk Banget
                </div>
                <p class="text-desc">Using kapuk randu material</p>
                <div class="text-[24px] font-bold mb-2 mt-[18px]">$58.39</div>
              </div>
            </div> -->
          <!-- <div class="product-item rounded overflow-hidden">
              <div
                class="aspect-square bg-no-repeat bg-center bg-cover"
                style="background-image: url('{{asset(`img/brown-chair.png`)}}')"
              ></div>
              <div class="pt-[12px]">
                <p class="text-desc font-bold">Sofa</p>
                <div class="font-bold text-[26px] mt-[6px] mb-[6px]">
                  Sofa Empuk Banget
                </div>
                <p class="text-desc">Using kapuk randu material</p>
                <div class="text-[24px] font-bold mb-2 mt-[18px]">$58.39</div>
              </div>
            </div> -->
        </div>
      </div>
    </div>
  </div>

  <x-chatbot />

  <script>
    const plus = document.querySelector(".plus"),
      minus = document.querySelector(".minus"),
      num = document.querySelector(".num");
    let a = 1;
    plus.addEventListener("click", () => {
      if (a < window.TongSL) {
        a++;
      } else {
        Swal.fire({
          title: "Sản phẩm không đủ số lượng",
          text: "Số lượng hiện có: " + window.TongSL,
          icon: "warning"
        });
      }
      num.textContent = a;
    });

    minus.addEventListener("click", () => {
      if (a > 2) {
        a--;
        num.textContent = a;
      }
    });

    async function handleAddProduct() {
      if (sessionStorage.getItem("email") == null) {
        window.location.href = "/login-register";
      }
      var total = parseInt(sessionStorage.getItem("totalCart"));

      const sl = parseInt(document.getElementById("quantity").textContent);
      var newData = {
        MaSP: sessionStorage.getItem('productId'),
        MaKH: sessionStorage.getItem("id"),
        SoLuong: sl
      };
      // console.log("newData: ", newData)
      await fetch("/api/insert-cart", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(newData)
        })
        .then(response => response.json())
        .then(data => {
          Swal.fire({
            title: "Thêm sản phẩm vào giỏ hàng thành công!",
            icon: "success"
          }).then((result) => {
            if (result.isConfirmed) {
              // location.reload();
            }
          });
        })
        .catch(error => {
          Swal.fire({
            title: "Thêm sản phẩm vào giỏ hàng thất bại",
            text: error,
            icon: "error"
          });
        });
    }

    function Payment() {
      const sl = document.getElementById("quantity").textContent;
      let paymentItem = {
        MaSP: sessionStorage.getItem('productId'),
        SoLuong: sl
      }
      // console.log("paymentItem", paymentItem);
      sessionStorage.setItem("paymentItem", JSON.stringify(paymentItem));
      sessionStorage.setItem("beforeHref", "/detail-product-page");
      // console.log("paymentItem ss", sessionStorage.getItem("paymentItem"));
      window.location.href = "/payment-page";
    }

    function detailProduct(id, maDM) {
      sessionStorage.setItem("productId", id);
      sessionStorage.setItem("maDM", maDM);
      window.location.assign("/detail-product-page");
    }
  </script>
  <x-footer />
</body>

</html>