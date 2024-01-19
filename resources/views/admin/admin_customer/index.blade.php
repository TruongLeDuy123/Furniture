<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->

    <link href="{{asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">


    <script>
        window.current_page = 1;
        async function fetchPagination() {
            var pagination = document.getElementById('pagination');
            // <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            // <li class="page-item"><a class="page-link" href="#">1</a></li>
            // <li class="page-item"><a class="page-link" href="#">Next</a></li>
            const response = await fetch('api/customers/getlastpage/10');
            const totalPage = await response.json();
            var pageNumbersHTML = `<li class="page-item"><a class="page-link" onClick="loadPage(0, ${totalPage})">Previous</a></li>`;
            for (var i = 1; i <= totalPage; i++) {
                pageNumbersHTML += `<li class="page-item"><a class="page-link" onClick="loadPage(${i}, ${totalPage})">${i}</a></li>`;
            }
            pageNumbersHTML += `<li class="page-item"><a class="page-link" onClick="loadPage(${totalPage + 1}, ${totalPage})">Next</a></li>`;
            pagination.insertAdjacentHTML('afterbegin', pageNumbersHTML);
        }

        function loadPage(i, totalPage) {
            if (i == 0) {
                if (window.current_page > 1) {
                    window.current_page -= 1;
                }
            } else if (i == totalPage + 1) {
                if (window.current_page < totalPage) {
                    window.current_page += 1;
                }
            } else {
                window.current_page = i;
            }
            fetchData(window.current_page);
            // console.log("load page: ", window.current_page);
        }

        async function fetchData(current_page) {
            const customerRes = await fetch(`api/customers?page=${current_page}`);
            const data = await customerRes.json();
            // console.log(data);

            const customerListElement = document.getElementById('DanhSachKhachHangTable');
            const tbody = document.createElement('tbody');

            let row = '';
            const customerList = data.data;
            // console.log(data);
            console.log("data:" , customerList);
            customerList.forEach(customer => {
                row = `
                    <tr>
                        <th scope="row">${customer.id}</th>
                            <td>${customer.HoTen}</td>
                            <td>${customer.GioiTinh}</td>
                            <td>${customer.Email}</td>
                            <td>${customer.SDT}</td>
                            <td>${customer.NgayTao}</td>                            
                            <td>${customer.DiaChi}</td>
                            <td>${customer.ThanhPho}</td>                                                                    
                            
                            <td>
                            <div class="d-flex  justify-content-center">
                                <a onclick="detailCustomer(${customer.id})" class="mr-2 text-success" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
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
            // Xóa nội dung hiện tại của bảng
            // categoryListElement.innerHTML = '';

            // Thêm phần tử <tbody> vào bảng
            customerListElement.appendChild(tbody);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // fetchCategories();
            fetchPagination();
            fetchData(window.current_page);
        });


        // fetch('/api/customers')
        //     .then(response => response.json())
        //     .then(data => {
        //         const categoryListElement = document.getElementById('DanhSachKhachHangTable');
        //         // Tạo một phần tử <tbody>
        //         const tbody = document.createElement('tbody');


        //     .catch(error => console.error(error));

        // document.addEventListener("DOMContentLoaded", function() {
        //     console.log("index: 1");
        //     document.getElementsByClassName("editLink").addEventListener("click", function(event) {
        //         event.preventDefault();
        //         var id = this.getAttribute("categoryId");
        //         console.log("index: 2");
        //         sessionStorage.setItem("categoryId", 1);
        //         console.log(sessionStorage.getItem("categoryId"));
        //         window.location.href = this.getAttribute("href");
        //     });
        // });
    </script>

    <script>
        function detailCustomer(id) {
            console.log("Id", id);
            sessionStorage.setItem("customerId", id);
            console.log(sessionStorage.getItem("customerId"));
            window.location.assign("/detail_customer");
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
                        <h1 class="h3 mb-2 text-gray-800">Quản lý thông tin khách hàng</h1>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="DanhSachKhachHangTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-nowrap">Mã</th>
                                            <th scope="col" class="text-nowrap">Họ tên</th>
                                            <th scope="col" class="text-nowrap">Giới tính</th>
                                            <th scope="col" class="text-nowrap">Email</th>
                                            <th scope="col" class="text-nowrap">Sđt</th>
                                            <th scope="col" class="text-nowrap">Ngày tạo</th>
                                            <th scope="col" class="text-nowrap">Địa chỉ</th>
                                            <th scope="col" class="text-nowrap">Thành phố</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-nowrap">Mã</th>
                                            <th scope="col" class="text-nowrap">Họ tên</th>
                                            <th scope="col" class="text-nowrap">Giới tính</th>
                                            <th scope="col" class="text-nowrap">Email</th>
                                            <th scope="col" class="text-nowrap">Sđt</th>
                                            <th scope="col" class="text-nowrap">Ngày tạo</th>
                                            <th scope="col" class="text-nowrap">Địa chỉ</th>
                                            <th scope="col" class="text-nowrap">Thành phố</th>
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
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="pagination">
                                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                            </ul>
                        </nav>
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
                    <button id="confirm" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.html">Delete</a>
                </div>
            </div>
        </div>
    </div>



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