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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        window.id = sessionStorage.getItem("id");
        window.tong = 0;
        async function fetchUser() {
            console.log("window.id", window.id);
            const cusResponse = await fetch(`/api/customers/${window.id}`);
            const data = await cusResponse.json();
            const info = document.getElementById("info");
            const address = document.getElementById("address");
            info.innerHTML = data.HoTen + " - " + data.SDT;
            address.innerHTML = data.DiaChi;
        }

        async function fetchData() {
            // Tiếp tục với yêu cầu fetch('/api/products')

            var carts = sessionStorage.getItem("paymentList").split(",").map(cart => parseInt(cart));
            // const paymentArray = carts.split(",");
            console.log("carts: ", carts);
            const cartResponse = await fetch(`/api/cart-detail/makh/${window.id}`);
            // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
            const data = await cartResponse.json();
            console.log("cartResponse: ", data);
            const cartListElement = document.getElementById('cart-item');
            cartListElement.innerHTML = '';

            let row = '';
            var tong = 0;
            data.forEach(async (cart) => {
                if (carts.includes(cart.id)) {
                    tong += cart.Gia * cart.SoLuong;
                    row += `
        <div class="cart-info md:shadow">
            <div class="border-b md:px-[20px] border-[rgba(0,0,0,0.09)] md:py-[15px] py-[5px] px-5  text-[14px] min-h-[55px] items-center flex  bg-[#fff] flex-wrap">

              <div class="lg:flex-1">
                <a href="" class="flex">
                  <div class="aspect-square min-w-[80px] max-h-[80px] rounded-[3px] ">
                    <img class="object-cover h-full" srcset="${cart.HinhAnh}" alt="">
                  </div>
                  <div class="ml-3 flex justify-between px-2 lg:px-0 flex-col gap-y-[3px] ">
                    <span class="lg:text-[14px] md:max-w-[250px] line-clamp-2">${cart.TenSP}</span>

                    <div class="md:hidden md:font-semibold flex justify-between">
                      <span class="rate">${cart.Gia.toLocaleString()}</span>đ
                      <span class="ml-[15px] quantity">x${cart.SoLuong}</span>
                      <!-- <input value="200000" type="number" class="amount"></input> -->
                    </div>
                  </div>
                </a>
              </div>
              <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
                <span class="rate">${cart.Gia.toLocaleString()}</span>đ
                <!-- <input value="200000" type="number" class="amount"></input> -->
              </div>

              <div class="num hidden text-center lg:w-[12.5%] lg:block text-[16px]" type="number" min="0" id="Quantity">
              ${cart.SoLuong}</div>
              <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
                <span class="amount">${(cart.Gia * cart.SoLuong).toLocaleString()}</span>đ
                <!-- <input value="200000" type="number" class="amount"></input> -->
              </div>

            </div>
          </div>
                    `;
                }
            })
            // Thêm phần tử <tbody> vào bảng
            cartListElement.innerHTML = row;
            const total = document.getElementById("total");
            total.innerHTML = tong.toLocaleString();
            let usdtovnd = tong / 24250
            let cost = usdtovnd.toFixed(2)
            $('#paypal').val(cost)
            $('#customer_id').val(window.id)
            window.tong = tong;
        }

        async function fetchDataItem() {
            // Tiếp tục với yêu cầu fetch('/api/products')

            var cart = JSON.parse(sessionStorage.getItem("paymentItem"));
            // const paymentArray = carts.split(",");
            console.log("cart: ", cart);
            const proResponse = await fetch(`/api/products/${cart.MaSP}`);
            const data = await proResponse.json();
            const cartListElement = document.getElementById('cart-item');
            cartListElement.innerHTML = '';

            var tong = data.Gia * parseInt(cart.SoLuong);
            let row = `
        <div class="cart-info md:shadow">
            <div class="border-b md:px-[20px] border-[rgba(0,0,0,0.09)] md:py-[15px] py-[5px] px-5  text-[14px] min-h-[55px] items-center flex  bg-[#fff] flex-wrap">

              <div class="lg:flex-1">
                <a href="" class="flex">
                  <div class="aspect-square min-w-[80px] max-h-[80px] rounded-[3px] ">
                    <img class="object-cover h-full" srcset="${data.HinhAnh}" alt="">
                  </div>
                  <div class="ml-3 flex justify-between px-2 lg:px-0 flex-col gap-y-[3px] ">
                    <span class="lg:text-[14px] md:max-w-[250px] line-clamp-2">${data.TenSP}</span>

                    <div class="md:hidden md:font-semibold flex justify-between">
                      <span class="rate">${data.Gia.toLocaleString()}</span>đ
                      <span class="ml-[15px] quantity">x${cart.SoLuong}</span>
                      <!-- <input value="200000" type="number" class="amount"></input> -->
                    </div>
                  </div>
                </a>
              </div>
              <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
                <span class="rate">${data.Gia.toLocaleString()}</span>đ
                <!-- <input value="200000" type="number" class="amount"></input> -->
              </div>

              <div class="num hidden text-center lg:w-[12.5%] lg:block text-[16px]" type="number" min="0" id="Quantity">
              ${cart.SoLuong}</div>
              <div class="hidden text-center lg:flex items-center justify-center color-orange font-semibold w-[12.5%]">
                <span class="amount">${tong.toLocaleString()}</span>đ
                <!-- <input value="200000" type="number" class="amount"></input> -->
              </div>

            </div>
          </div>
                    `;

            // // Thêm phần tử <tbody> vào bảng
            cartListElement.innerHTML = row;
            const total = document.getElementById("total");
            let usdtovnd = tong / 24250
            let cost = usdtovnd.toFixed(2)
            $('#paypal').val(cost)
            $('#customer_id').val(window.id)
            total.innerHTML = tong.toLocaleString();
            window.tong = tong;
        }

        document.addEventListener('DOMContentLoaded', async function() {
            await fetchUser();
            if (sessionStorage.getItem("beforeHref") == "/cart-information") {
                fetchData();
            } else {
                fetchDataItem();
            }
        });
    </script>
</head>

<body class="bg-[#F9F9F9]">
    <x-header />
    @php
        $successMessage = session('success');
    @endphp
    <div id="success-message" data-success="{{ $successMessage }}"></div>
    <script>
        let successMessage = $('#success-message').attr('data-success');
        if (successMessage) {
            Swal.fire({
                title: 'Thanh toán online bằng PayPal',
                text: 'Thành công!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                OrderOnline();
            });
        }
    </script>
    <main class="container p-0">
        <div class="mt-[50px] lg:mt-[128px] mb-[50px] flex items-center justify-center flex-col gap-y-[40px]">
            <h1 class="text-[26px] lg:text-[64px] font-bold">Thanh toán</h1>
            <div class="flex items-center justify-center w-full flex-col gap-y-[20px]">
                <div
                    class="w-full flex items-center justify-center w-full flex-col p-5 lg:px-[46px] lg:py-[18px] border border-[rgba(21,20,17,0.7)] lg:gap-y-5">
                    <span class="w-full flex items-center justify-center gap-x-2 lg:gap-x-0 text-[#FFB23F] font-medium">
                        <div class="w-[24px] lg:w-[70px]">
                            <svg width="28" height="37" viewBox="0 0 28 37" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.7281 36.075C19.4688 31.4355 28 20.191 28 13.875C28 6.21484 21.7292 0 14 0C6.27083 0 0 6.21484 0 13.875C0 20.191 8.53125 31.4355 12.2719 36.075C13.1687 37.1807 14.8312 37.1807 15.7281 36.075ZM14 18.5C11.426 18.5 9.33333 16.426 9.33333 13.875C9.33333 11.324 11.426 9.25 14 9.25C16.574 9.25 18.6667 11.324 18.6667 13.875C18.6667 16.426 16.574 18.5 14 18.5Z"
                                    fill="#FFB23F" />
                            </svg>
                        </div>
                        <p class="w-full text-base lg:text-[30px]">Địa chỉ nhận hàng</p>
                    </span>
                    <span class="w-full flex items-center justify-between gap-x-3 lg:gap-x-5">
                        <p>
                            <strong id="info" class="leading-normal text-sm lg:text-[25px]"></strong>
                        </p>
                        <p id="address" class="text-sm lg:text-[25px] leading-normal"></p>
                        <a href="{{ route('profile') }}"
                            class="text-base lg:text-[25px] text-[#518581] cursor-pointer leading-normal">
                            Thay đổi
                        </a>
                    </span>
                </div>
                <div class="w-full">
                    <!-- Title -->
                    <div
                        class="mb-[12px] px-[20px] shadow text-[14px] h-[55px] shadow items-center hidden lg:flex justify-center bg-[#fff]">
                        <div class="w-[calc(100%-58px)] lg:flex-1">
                            Sản phẩm
                        </div>
                        <div class="text-center w-[12.5%]">
                            Đơn giá
                        </div>
                        <div class="text-center  w-[12.5%]">
                            Số lượng
                        </div>
                        <div class="text-center  w-[12.5%]">
                            Thành tiền
                        </div>
                    </div>

                    <div id="cart-item"></div>
                    <!-- Product 1 -->

                </div>
            </div>

            <div class="w-full flex items-center justify-end gap-x-[47px]">

            </div>
        </div>

        <div
            class="sticky bottom-0 bg-[#fff] border-dotted border-[rgba(0,0,0,.09)] lg:border  lg:py-2 lg:pr-6 lg:pl-[40px] pl-[10px] my-4 flex  items-center justify-between ">

            <!-- Thanh toán -->
            <div class="flex  text-[30px] gap-x-2 items-center">
                <div class="hidden md:block text-[16px]">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều
                    khoản
                    BiSys</div>

            </div>
            <div class="result-cart flex items-center ">
                <div class="flex text-[30px] gap-x-2 items-center">
                    <div class="text-[14px] lg:text-[16px]">Tổng thanh toán: </div>
                    <span class="text-[18px] lg:text-[24px] text-[#ee4d2d] font-semibold">
                        <span id="total" class="sum-cart"></span>đ
                    </span>
                </div>

                <button onclick="Order()"
                    class="ml-2 lg:ml-5 rounded-[2px] text-white border bg-[#ee4d2d] h-[56px]  px-[10px] lg:px-[20px]  text-white text-[15px] lg:text-[24px] font-semibold">
                    Đặt hàng
                </button>

                <form action="{{ route('processTransaction') }}" method="POST"
                    class="ml-2 lg:ml-5 rounded-[2px] text-white border bg-[#ffc107] h-[56px]  px-[10px] lg:px-[20px]  text-white text-[15px] lg:text-[24px] font-semibold">
                    @csrf
                    <input type="hidden" name="customer" value="" id="customer_id">
                    <input type="hidden" name="price" value="" id="paypal">
                    <button type="submit" style="margin-top: 5px">Thanh toán PayPal</button>
                </form>

                {{-- <form action="{{ url('/vnpay_payment') }}" method="POST">
                    @csrf
                    <button type="submit" class="primary-btn checkout-btn" style="width: 100%">Thanh toán bằng VNPAY</button>
                </form> --}}
            </div>
        </div>
    </main>
    <x-footer />

    <script>
        async function deleteCart(cartId) {
            console.log("delete cart: ", cartId);
            fetch(`/api/carts/${cartId}`, {
                    method: "DELETE",
                })
                .catch(error => {
                    console.log("loi xoa cthd:", cartId);
                });
        }

        async function updateProduct(proId, num) {
            console.log("update pro: ");

            fetch(`/api/products/decrease/${proId}&${num}`, {
                    method: "PUT",
                })
                .catch(error => {
                    console.log("loi update product:", proId);
                });
        }

        async function insertBill() {
            var newData = {
                TTDH: "Đang giao",
                TTTT: "Chưa thanh toán",
                MaKH: window.id,
                TriGia: window.tong,
            };
            console.log("new data: ", newData);
            await fetch("/api/bills", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("insert bill: ", data.id);
                    billId = data.id;
                })
                .catch(error => {
                    console.log("loi insert hoa don");
                });
            console.log("billId trong func: ", billId);
            return billId;
        }

        async function insertBillOnline() {
            var newData = {
                TTDH: "Đang giao",
                TTTT: "Đã thanh toán",
                MaKH: window.id,
                TriGia: window.tong,
            };
            console.log("new data: ", newData);
            await fetch("/api/bills", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("insert bill: ", data.id);
                    billId = data.id;
                })
                .catch(error => {
                    console.log("loi insert hoa don");
                });
            console.log("billId trong func: ", billId);
            return billId;
        }

        async function insertBillDetail(billId, cart) {
            var newData = {
                MaHD: billId,
                MaSP: cart.MaSP,
                SoLuong: cart.SoLuong,
                DonGia: cart.Gia,
            };

            // console.log("newData: ", newData);

            fetch("/api/bill-details", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("insertBillDetail: ", data);
                })
                .catch(error => {
                    console.log("loi insert cthd:", cart.id);
                });

        }
        async function Order() {
            // console.log("Order");
            const billId = await insertBill();
            // console.log("billId: ", billId);
            // const billId = bill.id;

            // console.log("beforeHref", sessionStorage.getItem("beforeHref"));

            if (sessionStorage.getItem("beforeHref") == "/cart-information") {
                var carts = sessionStorage.getItem("paymentList").split(",").map(cart => parseInt(cart));
                const cartResponse = await fetch(`/api/cart-detail/makh/${window.id}`);
                // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
                const data = await cartResponse.json();

                for (let i = 0; i < data.length; i++) {
                    const cart = data[i];
                    if (carts.includes(cart.id)) {
                        await insertBillDetail(billId, cart);
                        await updateProduct(cart.MaSP, cart.SoLuong);
                        await deleteCart(cart.id);
                    }
                }
            } else {
                var cart = JSON.parse(sessionStorage.getItem("paymentItem"));
                const proResponse = await fetch(`/api/products/${cart.MaSP}`);
                const data = await proResponse.json();
                var newCart = {
                    MaSP: parseInt(cart.MaSP),
                    SoLuong: parseInt(cart.SoLuong),
                    Gia: data.Gia,
                }
                await insertBillDetail(billId, newCart);
                await updateProduct(cart.MaSP, cart.SoLuong);
                Swal.fire({
                    title: "Đặt hàng thành công",
                    icon: "success"
                });
            }
            Swal.fire({
                title: "Đặt hàng thành công",
                icon: "success"
            })
            window.location.href = "/product-page";
        }


        async function OrderOnline() {
            console.log("OrderOnline");
            const billId = await insertBillOnline();
            if (sessionStorage.getItem("beforeHref") == "/cart-information") {
                var carts = sessionStorage.getItem("paymentList").split(",").map(cart => parseInt(cart));
                const cartResponse = await fetch(`/api/cart-detail/makh/${window.id}`);
                // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
                const data = await cartResponse.json();
                for (let i = 0; i < data.length; i++) {
                    const cart = data[i];
                    if (carts.includes(cart.id)) {
                        await insertBillDetail(billId, cart);
                        await updateProduct(cart.MaSP, cart.SoLuong);
                        await deleteCart(cart.id);
                    }
                }
            } else {
                var cart = JSON.parse(sessionStorage.getItem("paymentItem"));
                const proResponse = await fetch(`/api/products/${cart.MaSP}`);
                const data = await proResponse.json();
                var newCart = {
                    MaSP: parseInt(cart.MaSP),
                    SoLuong: parseInt(cart.SoLuong),
                    Gia: data.Gia,
                }
                await insertBillDetail(billId, newCart);
                await updateProduct(cart.MaSP, cart.SoLuong);
            }
            Swal.fire({
                title: "Đặt hàng thành công",
                icon: "success"
            })
            window.location.href = "/product-page";
        }
    </script>

</body>

</html>
