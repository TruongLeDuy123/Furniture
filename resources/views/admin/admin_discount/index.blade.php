<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .max-height-td {
            max-height: 10px;
            /* Đặt chiều cao tối đa cho td tại đây */
            overflow: hidden;
        }
    </style>
    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->

    <link href="{{asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script>
        window.type = 0;
        window.id = "tatCa";
        async function fetchData(type) {
            const discountResponse = await fetch(`/api/discounts/type/${type}`);

            const data = await discountResponse.json();
            const discountListElement = document.getElementById('DiscountTable');
            const tbody = discountListElement.querySelector('tbody');
            tbody.innerHTML = '';

            let row = '';
            data.forEach(discount => {
                row = `
                    <tr>
                                            <th scope="row">${discount.id}</th>
                                            <td>${discount.TenKM}</td>
                                            <td>${discount.NgayBD}</td>
                                            <td>${discount.NgayKT}</td>
                                            <td>${discount.PhanTramKM}</td>
                                            <td>${discount.DinhMuc}</td>
                                            <td class="overflow-y-auto">${discount.ToiDa}</td>

                                            <td>
                                                <div class="d-flex  justify-content-center">
                                                    <a class="mr-2 text-success" onclick="detailDiscount(${discount.id})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                    <a class="text-danger" data-toggle="modal" data-target="#deleteInfo" onclick="confirmDelete(${discount.id})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                    `;
                // Tạo một phần tử <tr> từ chuỗi HTML
                const rowElement = document.createElement('tr');
                rowElement.innerHTML = row;

                // Thêm phần tử <tr> vào phần tử <tbody>
                tbody.appendChild(rowElement);
            });

            // Thêm phần tử <tbody> vào bảng
            discountListElement.appendChild(tbody);
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchData(window.type);
        });
        // fetch('/api/discounts')
        //     .then(response => response.json())
        //     .then(data => {
        //         const discountListElement = document.getElementById('DiscountTable');
        //         // Tạo một phần tử <tbody>
        //         const tbody = document.createElement('tbody');
        //         let row = '';
        //         data.forEach(discount => {
        //             row = `
        //             <tr>
        //                                     <th scope="row">${discount.id}</th>
        //                                     <td>${discount.TenKM}</td>
        //                                     <td>${discount.NgayBD}</td>
        //                                     <td>${discount.NgayKT}</td>
        //                                     <td>${discount.PhanTramKM}</td>
        //                                     <td>${discount.DinhMuc}</td>
        //                                     <td class="overflow-y-auto">${discount.ToiDa}</td>

        //                                     <td>
        //                                         <div class="d-flex  justify-content-center">
        //                                             <a class="mr-2 text-success" onclick="detailDiscount(${discount.id})">
        //                                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
        //                                                     <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
        //                                                     <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
        //                                                 </svg>
        //                                             </a>
        //                                             <a class="text-danger" data-toggle="modal" data-target="#deleteInfo" onclick="confirmDelete(${discount.id})">
        //                                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
        //                                                     <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
        //                                                 </svg>
        //                                             </a>
        //                                         </div>
        //                                     </td>
        //                                 </tr>
        //             `;
        //             // Tạo một phần tử <tr> từ chuỗi HTML
        //             const rowElement = document.createElement('tr');
        //             rowElement.innerHTML = row;

        //             // Thêm phần tử <tr> vào phần tử <tbody>
        //             tbody.appendChild(rowElement);
        //         });
        //         // Xóa nội dung hiện tại của bảng
        //         // categoryListElement.innerHTML = '';

        //         // Thêm phần tử <tbody> vào bảng
        //         discountListElement.appendChild(tbody);
        //     })

        //     .catch(error => console.error(error));

        function confirmDelete(id) {
            $("#deleteInfo").modal("show");
            $("#deleteBtn").on("click", function() {

                //Hành động xóa thông tin tại đây
                fetch(`api/discounts/${id}`, {
                    method: "DELETE"
                });
                window.location.href = "discount_manager";
            });
        }

        function loadType(idLink, type) {
            if (window.id != idLink) {
                oldTypeLink = document.getElementById(window.id);
                oldTypeLink.classList.remove("active");

                window.id = idLink;
                typesLink = document.getElementById(window.id);
                typesLink.classList.add("active");

                window.type = type;
                fetchData(window.type);
            }
        }
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Side bar -->
        <x-sidebar></x-sidebar>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <x-topbar></x-topbar>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-2 text-gray-800">Quản lý khuyến mãi</h1>
                        <div class="list-group list-group-horizontal">
                            <a id="tatCa" onclick="loadType('tatCa', 0)" style="width: auto !important" class="list-group-item list-group-item-action active">Tất cả</a>
                            <a id="chuaKichHoat" onclick="loadType('chuaKichHoat', 1)" style="width: auto !important" class="list-group-item list-group-item-action" aria-current="true">
                                Mã chưa kích hoạt
                            </a>
                            <a id="dangApDung" onclick="loadType('dangApDung', 2)" style="width: auto !important" href="#" class="list-group-item list-group-item-action">Đang áp dụng</a>
                            <a id="daHetHan" onclick="loadType('daHetHan', 3)" style="width: auto !important" class="list-group-item list-group-item-action">Mã hết hạn</a>
                        </div>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="DiscountTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-nowrap">Mã khuyến mãi</th>
                                            <th class="text-nowrap">Tên khuyến mãi</th>
                                            <th class="text-nowrap">Ngày bắt đầu</th>
                                            <th class="text-nowrap">Ngày kết thúc</th>
                                            <th class="text-nowrap">Phần trăm khuyến mãi</th>
                                            <th class="text-nowrap">Định mức</th>
                                            <th class="text-nowrap">Tối đa</th>
                                            <th class="text-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>Mã khuyến mãi</th>
                                            <th>Tên khuyến mãi</th>
                                            <th>Ngày bắt đầu</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Phần trăm khuyến mãi</th>
                                            <th>Định mức</th>
                                            <th>Tối đa</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('create_discount')}}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Thêm thông tin</span>
                        </a>
                    </div>


                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteInfo" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Xóa thông tin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có chắc chắn muốn xóa thông tin này? Sau khi xóa thì không thể hoàn tác.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="deleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    </script>

    <script>
        function detailDiscount(id) {
            sessionStorage.setItem("discountId", id);
            // Điều hướng đến trang edit.blade.php với ID được truyền qua URL
            window.location.href = `/detail_discount`;
        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin_assets/vendor/jquery-easing/jquery.easing.js')}}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin_assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin_assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin_assets/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>