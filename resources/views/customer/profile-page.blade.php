<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Profile</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/slider-product.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        
    </script>

</head>

<body>
    <x-header />

    <main class="container">
        <div class="flex justify-center items-center lg:items-start flex-col lg:flex-row gap-5 my-16">
            <div class="text-white flex justify-center items-center flex-col">
                <span
                    class="myProfile_btn text-center bg-[#518581] w-[200px] p-3 hover:opacity-[0.5] transition-all cursor-pointer">Hồ
                    sơ của tôi</span>
                <span
                    class="myOrder_btn text-center bg-[#518581] w-[200px] p-3 hover:opacity-[0.5] transition-all cursor-pointer">Đơn
                    hàng của tôi</span>
                <span
                    class="changePw_btn text-center bg-[#518581] w-[200px] p-3 hover:opacity-[0.5] transition-all cursor-pointer">Đổi
                    mật khẩu</span>
                <span
                    class="logOut_btn text-center bg-[#518581] w-[200px] p-3 hover:opacity-[0.5] transition-all cursor-pointer">Đăng
                    xuất</span>
            </div>

            <div class="lg:w-[1024px] flex justify-center items-center flex-col">
                <div class="title text-[26px] lg:text-[44px] text-heading text-center">
                    Hồ sơ của tôi
                </div>
                <div class="desc text-[14px] lg:text-[18px] text-desc text-desc__yellow text-center mb-7">
                    Chỉnh sửa hồ sơ tài khoản
                </div>

                <!-- Hồ sơ của tôi -->
                <form class="myProfile w-full flex flex-col-reverse lg:grid gap-x-6 lg:grid-cols-3">
                    <div class="info col-span-2">
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="username">
                                    Tên đăng nhập
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="username" type="text" />
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="email">
                                    Email
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="email" type="email" />
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="phone">
                                    Điện thoại
                                </label>
                            </div>
                            <div>
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="phone" type="number" value="0942121213" />
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="address">
                                    Thành phố
                                </label>
                            </div>
                            <div class="text-[14px] lg:text-[18px] w-full grid grid-cols-2 gap-2">
                                <select
                                    class="text-[14px] lg:text-[18px] block w-full bg-white border px-4 py-2 pr-4 rounded w"
                                    id="city">
                                </select>
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="address-detail">
                                    Địa chỉ cụ thể
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="address-detail" type="text" />
                            </div>
                        </div>
                        <div class="lg:flex items-center">
                            <div class="w-[250px]"></div>
                            <a
                                class="button-primary profile text-[14px] lg:text-[18px] cursor-pointer hover:opacity-[0.5]">
                                Lưu
                            </a>
                        </div>
                    </div>
                    <div class="image border-left text-center mb-8">
                        <div class="mt-2">
                            <img src="{{ asset('img/banlamviec.png') }}" alt = "Image"
                                class="w-[150px] h-[150px] lg:w-[295px] lg:h-[295px] m-auto rounded-[50%] shadow" />
                        </div>

                        <label
                            class="text-[14px] lg:text-[18px] inline-block mt-3 px-4 py-1 bg-white border border-gray-300 rounded cursor-pointer"
                            for="file_input">Chọn ảnh</label>
                        <input class="hidden" id="file_input" type="file" />
                    </div>
                </form>

                <!-- Đơn hàng của tôi -->
                <div class="myOrder hidden table-cart-list flex-col items-centerjustify-center gap-y-10">

                </div>

                <!-- Thay đổi mật khẩu -->
                <form class="changePw w-full hidden flex-col-reverse gap-x-6 lg:grid-cols-3">
                    <div class="info col-span-2">
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="current_password">
                                    Mật khẩu cũ
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="current_password" type="password" />
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="new_password">
                                    Mật khẩu mới
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="new_password" type="password" />
                            </div>
                        </div>
                        <div class="lg:flex items-center mb-6">
                            <div class="min-w-[250px]">
                                <label
                                    class="block text-[16px] lg:text-[18px] text-gray-500 font-bold lg:text-right mb-1 pr-4"
                                    for="new_password_confirmation">
                                    Nhập lại mật khẩu mới
                                </label>
                            </div>
                            <div class="w-full">
                                <input
                                    class="text-[14px] lg:text-[18px] border-2 border-gray-200 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-[#518581]"
                                    id="new_password_confirmation" type="password" />
                            </div>
                        </div>

                        <strong class="change-login lg:text-xl text-sm cursor-pointer text-[red]"
                            style="margin-left: 5%" id="message"></strong>
                        <br><br>
                        <div class="lg:flex items-center">
                            <div class="w-[250px]"></div>
                            <a
                                class="button-primary change_password text-[14px] lg:text-[18px] cursor-pointer hover:opacity-[0.5]">
                                Lưu
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <x-footer />
    <script src="../js/profilePage.js"></script>

    <script>
        let name = sessionStorage.getItem("HoTen");
        let Email = sessionStorage.getItem("email");
        let phone = sessionStorage.getItem("SDT");
        let address = sessionStorage.getItem("DiaChi");
        let City = sessionStorage.getItem("ThanhPho");
        $(document).ready(function() {
            $("#username").val(name)
            $("#email").val(Email)
            $('#phone').val(phone)
            $('#address-detail').val(address)
        })

        fetch('/api/customers')
            .then(response => response.json())
            .then(data => {
                const citySelect = $('#city');
                let arrayCity = []
                $.each(data.data, function(index, city) {
                    arrayCity.push(city.ThanhPho)
                });
                let cities = [...new Set(arrayCity)];
                let str = ""
                $.each(cities, function(index, city) {
                    if (!city) return
                    if (city == City) str += `<option value='${index}' selected>${city}</option>`
                    else str += `<option value='${index}'>${city}</option>`
                });
                citySelect.append(str);

            })
            .catch(error => {
                console.error('Lỗi khi gọi API:', error);
            });
        $(document).ready(function() {
            $('.profile').click(function() {
                let HoTen = $("#username").val()
                let Email = $("#email").val()
                let SDT = $("#phone").val()
                let ThanhPho = $("#city option:selected").text();
                let DiaChi = $("#address-detail").val()
                let data = {
                    HoTen,
                    Email,
                    SDT,
                    ThanhPho,
                    DiaChi
                }
                let customerId = sessionStorage.getItem('id');

                fetch(`/api/customers/${customerId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        return response.json()
                    })
                    .then(data => {
                        Swal.fire({
                            title: 'Bạn đã cập nhật hồ sơ',
                            text: 'Thành công!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    })
                    .catch(error => {
                        if (SDT.length < 10) {
                            Swal.fire({
                                title: 'Số điện thoại phải có ít nhất 10 chữ số',
                                text: 'Thất bại!',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }

                        console.error('Lỗi khi cập nhật thông tin:', error);
                    });
            })

            $('.change_password').click(function() {
                let old_password = $('#current_password').val()
                let password = $('#new_password').val()
                let confirm_password = $('#new_password_confirmation').val()
                let data = {
                    old_password,
                    password,
                    confirm_password
                }
                let str = ""
                fetch(`api/profile/change-password`, {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + sessionStorage.getItem(
                                'token'
                            ), // Include the user's token if you are using token-based authentication
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        return response.json()
                    })
                    .then(data => {
                        // Xử lý kết quả sau khi cập nhật thành công
                        if (data.message == "Validations fails") {
                            if (password != confirm_password) {
                                Swal.fire({
                                    title: 'Mật khẩu không trùng khớp!',
                                    text: 'Thất bại!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });

                            }
                            if (password.length < 6) {
                                Swal.fire({
                                    title: 'Mật khẩu mới phải chứa tối thiểu 6 kí tự!',
                                    text: 'Thất bại!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        } else if (data.message == "Mật khẩu cũ không khớp!") {
                            Swal.fire({
                                title: 'Mật khẩu cũ không khớp!',
                                text: 'Thất bại!',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Mật khẩu đã được cập nhật thành công',
                                text: 'Thành công!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
            })
            let customerId = sessionStorage.getItem('id');
            $('.myOrder_btn').click(function() {
                let str = ""
                fetch(`/api/bills/makh/${customerId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length == 0) {
                            str =
                                `<strong class="lg:text-xl text-sm cursor-pointer text-[red]">Không có đơn hàng nào cả!</strong>`
                            $('.myOrder').html(str);
                            return
                        }
                        $('.order_table').remove();
                        $.each(data, function(index, item) {
                            var dateString = item.NgayHD;
                            var dateObject = new Date(dateString);
                            var day = dateObject.getDate();
                            var month = dateObject.getMonth() + 1;
                            var year = dateObject.getFullYear();
                            var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month <
                                10 ? '0' : '') + month + '/' + year;
                            str +=
                                `<table class="order_table border-collapse border border-black w-full">
                                <!-- tiêu đề bảng -->
                                <thead>
                                    <tr class="border border-gray-400 lg:table-row">
                                        <th class="font-light text-sm lg:text-[18px] py-[12px]">
                                            ID đơn hàng:
                                            <span class="font-bold text-sm lg:text-[18px]">${item.id}</span>
                                        </th>
                                        <th class="font-light text-sm lg:text-[18px] py-[12px]">
                                            Ngày đặt:
                                            <span class="font-bold text-sm lg:text-[18px]">${formattedDate}</span>
                                        </th>
                                        <th class="font-light text-[18px] py-[12px]"></th>
                                        <th class="font-light text-[18px] py-[12px]"></th>
                                        <th class="font-light text-[18px] py-[12px] hidden lg:table-cell"></th>
                                        <th class="font-light text-sm lg:text-[18px] py-[12px]">
                                            <span class="font-bold text-green-500 text-sm lg:text-[18px]">${item.TTDH}</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                <!-- row 1 -->
                                `;

                            $.each(item.cthd, function(index, cthd) {
                                $.each(cthd.sanpham, function(index, spham) {
                                    str += `
                                <tr class="border border-gray-400 lg:table-row">
                                    <td class="flex pl-[16px] lg:pl-[61px] gap-x-[16px] lg:gap-x-[19px] py-[23px] border-spacing-[9px]">
                                        <img src="${spham.HinhAnh}" style="width:112px; height:112px" alt="Image" />
                                        <div class="flex flex-col font-light lg:py-[6px]">
                                            <span class="text-[14px] lg:text-[18px]">${cthd.MaSP}</span>
                                            <span class="text-[14px] lg:text-[18px] font-medium max-w-[300px] truncate">${spham.TenSP}</span>
                                            <span class="text-[14px] lg:text-[18px]">${spham.NSX}</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="hidden lg:table-cell"></td>
                                    <td class="hidden lg:table-cell"></td>
                                    <td class="text-[20px] py-[41px] px-[45px] hidden lg:table-cell">
                                        <span class="font-bold">${cthd.SoLuong}x</span> ${cthd.DonGia} đ
                                    </td>
                                </tr>
                            `;
                                });
                            });
                            str += `</tbody></table>`;
                        });
                        $('.myOrder').html(str);
                    });
            })
            // $('.logOut_btn').click(function() {
            //     alert("gel")
            //     fetch(`/api/logout`, {
            //             // // headers: {
            //             // //     'Content-Type': 'application/json',
            //             // //     'Authorization': 'Bearer ' + sessionStorage.getItem(
            //             // //         'token'
            //             // //     ), // Include the user's token if you are using token-based authentication
            //             // },
            //         })
            //         .then(response => {
            //             console.log("CHECK RESPONSE: ", response);
            //             return response.json()
            //         })

            //         .then(data => {
            //             console.log("CHECK LOGOUT: ", data);
            //         })
            //         .catch(e => {
            //             console.log("ERROR: ", e);
            //         })
            // })
        })
    </script>
</body>


</html>