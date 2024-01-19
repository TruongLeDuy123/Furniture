<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Cart Info</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
  <script>
    var cusId = sessionStorage.getItem("id");
    window.tongThanhToan = 0;

    async function fetchData() {
      // Tiếp tục với yêu cầu fetch('/api/products')
      const cartResponse = await fetch(`/api/cart-detail/makh/${cusId}`);
      // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
      const data = await cartResponse.json();
      console.log("cartResponse: ", data);
      const cartListElement = document.getElementById('cart-item');
      cartListElement.innerHTML = '';

      let row = '';
      data.forEach((cart) => {
        console.log("load data: ", cart.id);
        row += `
        <div class="cart-info md:shadow" id="${cart.id}">
          <div class="border-b md:px-[20px] border-[rgba(0,0,0,0.09)] md:py-[15px] pt-[15px]  text-[14px] min-h-[55px] items-center flex  bg-[#fff] flex-wrap">
            <div class="min-w-[58px] flex items-center justify-center">
              <input name="wannaBuy" class="w-[20px] h-[20px]" type="checkbox" id="check-${cart.id}">
            </div>
            <div class="w-[calc(100%-58px)] lg:w-[calc(50%-58px)]">
              <a href="" class="flex">
                <div class="aspect-square min-w-[80px] max-h-[80px] rounded-[3px] ">
                  <img class="object-cover h-full" srcset="${cart.HinhAnh}" alt="Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt">
                </div>
                <div class="ml-3 flex justify-between px-2 lg:px-0 flex-col gap-y-[3px] ">
                  <span class="lg:text-[14px] md:max-w-[250px] line-clamp-2">${cart.TenSP}</span>
                  <span class="lg:text-[14px] ">Phân loại:
                    <span class="lg:text-[14px] ">${cart.TenDM}</span>
                  </span>
                  <div class="color-orange md:hidden font-semibold ">
                    <span class="amount">${cart.Gia.toLocaleString()}</span>đ
                    <!-- <input value="200000" type="number" class="amount"></input> -->
                  </div>
                </div>
              </a>
            </div>
            <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
              <span class="rate">${cart.Gia.toLocaleString()}</span>đ
              <!-- <input value="200000" type="number" class="amount"></input> -->
            </div>

            <div class="text-center lg:w-[12.5%] pl-[158px] pr-[30px]  md:px-[45px] flex justify-center text-[16px] my-[7px]">

              <button onclick="decrement(${cart.id})" class="flex minus-btn justify-center items-center border border-r-0 border-[rgba(0,0,0,0.09)] aspect-square w-[32px] h-[32px]">
                -
              </button>
              <input value=${cart.SoLuong} class="num text-center w-[45px] border border-[rgba(0,0,0,0.09)]" type="number" id="quantity-${cart.id}">
              <button onclick="increment(${cart.id})" class="plus-btn  flex justify-center items-center border-l-0 border border-[rgba(0,0,0,0.09)] aspect-square w-[32px] h-[32px]">
                +
              </button>


            </div>
            <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
              <span class="amount">${(cart.Gia * cart.SoLuong).toLocaleString()}</span>đ
              <!-- <input value="200000" type="number" class="amount"></input> -->
            </div>
            <button onclick="DeleteCart(${cart.id})" class="p-4 text-center  lg:w-[12.5%]">
              Xóa
            </button>
          </div>

        </div>
                    `;
      })

      // Thêm phần tử <tbody> vào bảng
      cartListElement.innerHTML = row;
    }

    async function fetchRandomData() {
      const proResponse = await fetch(`api/products/get-random-products/4`);
      // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
      const data = await proResponse.json();
      const proListElement = document.getElementById('data-container');
      console.log("data: ", data);
      proListElement.innerHTML = '';

      let row = '';
      data.forEach((product) => {
        row += `<a onclick="detailProduct(${product.id},${product.MaDM})" class="hover:-translate-y-2 overflow-hidden rounded-[3px] shadow product-item bg-[#fff]">
            <div class="h-full flex flex-col overflow-hidden">
              <div class="aspect-square  rounded-[3px] ">
                <img class="object-cover h-full" srcset="${product.HinhAnh}" alt="Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt">
              </div>
              <div class="flex-1 flex flex-col px-[12px] md:px-[17px] md:py-[20px] py-[14px]">
                <p class="flex-1 line-clamp-2 text-gray-700 md:text-[18px] text-[13px] ">
                  ${product.TenSP}
                </p>
                <div class="flex justify-between items-center mt-3 price ">
                  <span class="md:text-[24px] text-[16px] current-price font-semibold color-orange">
                  ${product.Gia.toLocaleString()}<span class="md:text-[20px] text-[14px]">đ</span>
                  </span>
                </div>
                <div class="md:text-[18px] text-[14px] mt-2">
                  Số lượng:
                  <span class="md:text-[18px] text-[14px] font-medium ">${product.TongSL}</span>
                </div>
              </div>
            </div>
          </a>`;
      })
      // Thêm phần tử <tbody> vào bảng
      proListElement.innerHTML = row;
    }

    document.addEventListener('DOMContentLoaded', function() {
      fetchData();
      fetchRandomData();
    });
  </script>
</head>

<body>
  <x-header />
  <main class="container px-8 lg:px-[100px]">
    <div class="mt-8 lg:mt-20 mb-4 lg:mb-16">
      <div class=" gap-y-[50px]">
        <!-- <h1 class="fw-[600] text-center text-[26px] lg:text-[50px] mb-[20px] "> Giỏ hàng</h1> -->
        <!-- Thanh header giỏ hàng -->
        <div class="mb-[12px] px-[20px] shadow text-[14px] h-[55px] shadow items-center hidden lg:flex justify-center bg-[#fff]">
          <div class="min-w-[58px] flex items-center justify-center">
            <input id="wanna-buy-all" class="w-[20px] h-[20px]" type="checkbox">
          </div>
          <div class="w-[calc(100%-58px)] lg:w-[calc(50%-58px)]">
            Sản phẩm
          </div>
          <div class="text-center w-[12.5%]">
            Đơn giá
          </div>
          <div class="text-center  w-[12.5%]">
            Số lượng
          </div>
          <div class="text-center  w-[12.5%]">
            Số tiền
          </div>
          <div class="text-center  w-[12.5%]">
            Thao tác
          </div>
        </div>
        <div id="cart-item"></div>
        <!-- Nội dung giỏ hàng -->
        <!-- <div class="cart-info md:shadow">
          <div class="border-b md:px-[20px] border-[rgba(0,0,0,0.09)] md:py-[15px] pt-[15px]  text-[14px] min-h-[55px] items-center flex  bg-[#fff] flex-wrap">
            <div class="min-w-[58px] flex items-center justify-center">
              <input name="wannaBuy" class="w-[20px] h-[20px]" type="checkbox">
            </div>
            <div class="w-[calc(100%-58px)] lg:w-[calc(50%-58px)]">
              <a href="" class="flex">
                <div class="aspect-square min-w-[80px] max-h-[80px] rounded-[3px] ">
                  <img class="object-cover h-full" srcset="{{asset('img/product3.png')}}" alt="Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt">
                </div>
                <div class="ml-3 flex justify-between px-2 lg:px-0 flex-col gap-y-[3px] ">
                  <span class="lg:text-[14px] md:max-w-[250px] line-clamp-2">Đèn bàn học HY2266 Bóng
                    LED
                    Chống Cận Bảo Vệ Mắt</span>
                  <span class="lg:text-[14px] ">Phân loại:
                    <span class="lg:text-[14px] ">Đèn ngủ</span>
                  </span>
                  <div class="color-orange md:hidden font-semibold ">
                    <span class="amount">200000</span>đ
                  </div>
                </div>
              </a>
            </div>
            <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
              <span class="rate">200000</span>đ
            </div>

            <div class="text-center lg:w-[12.5%] pl-[158px] pr-[30px]  md:px-[45px] flex justify-center text-[16px] my-[7px]">

              <a class="flex minus-btn justify-center items-center border border-r-0 border-[rgba(0,0,0,0.09)] aspect-square w-[32px] h-[32px]">
                -
              </a>
              <input value=1 class="num text-center w-[45px] border border-[rgba(0,0,0,0.09)]" type="number" min="0" id="Quantity">
              <a class="plus-btn  flex justify-center items-center border-l-0 border border-[rgba(0,0,0,0.09)] aspect-square w-[32px] h-[32px]">
                +
              </a>


            </div>
            <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
              <span class="amount">200000</span>đ
            </div>
            <a href="" class="p-4 text-center  lg:w-[12.5%]">
              Xóa
            </a>
          </div>

        </div> -->


      </div>
      <div class="sticky bottom-0 bg-[#fff] border-dotted border-[rgba(0,0,0,.09)] lg:border  lg:py-2 lg:pr-6 lg:pl-[40px] pl-[10px] my-4 flex  items-center justify-between ">

        <!-- Thanh toán -->
        <div class="flex  text-[30px] gap-x-2 items-center">
          <input class=" aspect-square w-[20px] lg:w-[25px] rounded-[5px]" type="checkbox" id="allChecked">
          <div class="hidden md:block text-[16px]">Chọn tất cả</div>
          <div class="lg:hidden block text-[16px]">Tất cả</div>
        </div>
        <div class="result-cart flex items-center ">
          <div class="flex text-[30px] gap-x-2 items-center">
            <!-- <div class="text-[14px] lg:text-[16px]">Tổng thanh toán: </div>
            <span class="text-[18px] lg:text-[24px] text-[#ee4d2d] font-semibold">
              <span id="tongThanhToan" class="sum-cart">3000000</span>đ
            </span> -->
          </div>

          <button onclick="Payment()" class="ml-2 lg:ml-5 rounded-[2px] text-white border bg-[#ee4d2d] h-[56px]  px-[10px] lg:px-[20px]  text-white text-[15px] lg:text-[24px] font-semibold">
            Mua hàng
          </button>

        </div>

      </div>
      <!-- Gợi ý sản phẩm -->
      <div class="md:mt-5">
        <div class="block md:pt-[20px]">
          <h1 class="font-semibold text-[20px] lg:text-[40px] text-[#518581]">Có thể bạn quan tâm</h1>
        </div>
        <div id="data-container" class="lg:mt-[35px] mt-[20px] grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-x-[25px] lg:gap-y-[45px] gap-x-3 gap-y-[15px]">
          <!-- Product 1 -->
          <!-- <a href="" class="hover:-translate-y-2 overflow-hidden rounded-[3px] shadow product-item bg-[#fff]">
            <div class="h-full flex flex-col overflow-hidden">
              <div class="aspect-square  rounded-[3px] ">
                <img class="object-cover h-full" srcset="{{asset('img/product2.png')}}" alt="Đèn bàn học HY2266 Bóng LED Chống Cận Bảo Vệ Mắt">
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
                <div class="md:text-[18px] text-[14px] mt-1 current-price font-semibold color-orange">
                                
                                  Hết hàng
                                
                              </div>
              </div>
            </div>
          </a> -->
        </div>
      </div>
      </a>
    </div>
    </div>

    </div>

    <x-chatbot />
  </main>


  <x-footer />
  <script>
    function decrement(id) {
      const quantityInput = document.getElementById(`quantity-${id}`);
      let quantity = parseInt(quantityInput.value);

      if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
      }
    }

    function increment(id) {
      const quantityInput = document.getElementById(`quantity-${id}`);
      let quantity = parseInt(quantityInput.value);

      quantity++;
      quantityInput.value = quantity;
    }

    async function DeleteCart(id) {
      await fetch(`/api/carts/${id}`, {
        method: 'DELETE'
      });
      Swal.fire({
        title: "Cập nhập giỏ hàng",
        text: "Xóa sản phẩm khỏi giỏ hàng thành công!",
        icon: "success"
      });
      await fetchData();
    }

    document.getElementById('allChecked').addEventListener('change', function() {
      const checkboxes = document.querySelectorAll('[name="wannaBuy"]');

      checkboxes.forEach(function(checkbox) {
        checkbox.checked = allChecked.checked;
      });
    });

    // document.querySelectorAll('[name="wannaBuy"]').forEach(function(checkbox) {
    //   checkbox.addEventListener('change', function() {
    //     console.log("change");
    //   })
    //   console.log("change");
    //   const allCheck = document.getElementById('allChecked');
    //   this.forEach(function(checkbox) {
    //     if(checkbox.checked == false) {
    //       allCheck.checked = checkbox.checked;
    //       return;
    //     }
    //   });
    //   allCheck.checked = true;
    // })

    window.addEventListener('beforeunload', async function(event) {
      event.preventDefault();
      await saveCart();
    });

    async function saveCart() {
      // Tiếp tục với yêu cầu fetch('/api/products')
      const cartResponse = await fetch(`/api/carts/makh/${cusId}`);
      // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
      const data = await cartResponse.json();
      console.log("cartResponse: ", data);

      data.forEach(async function(cart) {
        var SoLuong = document.getElementById(`quantity-${cart.id}`).value;

        var data = {
          SoLuong: SoLuong,
        };

        await fetch(`/api/carts/${cart.id}`, {
            method: "PUT",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(data => {
            // Xử lý phản hồi từ API (nếu cần)
            console.log(data);
          });
      })
    }


    async function Payment() {
      await saveCart();
      // Lấy tất cả các phần tử có lớp "cart-info"
      const cartInfoElements = document.getElementsByClassName('cart-info');

      // Tạo một mảng để lưu các cart.id đã được kiểm tra
      const checkedCartIds = [];

      // Duyệt qua từng phần tử "cart-info"
      Array.from(cartInfoElements).forEach(cartInfoElement => {
        // Kiểm tra trạng thái checkbox
        const checkbox = cartInfoElement.querySelector('input[name="wannaBuy"]');
        if (checkbox.checked) {
          // Lấy giá trị của thuộc tính "id"
          const cartId = cartInfoElement.id;
          console.log(cartId);

          checkedCartIds.push(cartId);
        }
      });

      if (checkedCartIds.length == 0) {
        console.log("rong");
        Swal.fire({
          title: 'Mời chọn sản phẩm cần đặt mua',
          icon: 'warning',
          confirmButtonText: 'OK'
        });
      } else {
        sessionStorage.setItem("paymentList", checkedCartIds);
        console.log("paymentList", checkedCartIds);
        sessionStorage.setItem("beforeHref", "/cart-information");
        window.location.href = "/payment-page";
      }
    }

    function detailProduct(id, maDM) {
      sessionStorage.setItem("productId", id);
      sessionStorage.setItem("maDM", maDM);
      window.location.assign("/detail-product-page");
    }
  </script>
</body>
<script src="../js/cart.js">

</script>

</html>