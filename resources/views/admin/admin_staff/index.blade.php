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
        fetch('/api/staffs')
            .then(response => response.json())
            .then(data => {
                const categoryListElement = document.getElementById('DanhSachNhanVienTable');
                // Tạo một phần tử <tbody>
                const tbody = document.createElement('tbody');
                let row = '';
                data.forEach(staff => {

                    row = `
                    <tr>
                        <th scope="row">${staff.id}</th>
                            <td>${staff.HoTen}</td>
                            <td>${staff.Email}</td>
                            <td>${staff.SDT}</td>
                            <td>${staff.NgayTao}</td>
                            <td>${staff.DiaChi}</td>
                            <td>${staff.ThanhPho}</td>                       
                            <td>${staff.GioiTinh}</td>
                            <td>
                            <div class="d-flex  justify-content-center">
                                <a class="mr-2 text-success" onclick="detailStaff(${staff.id})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a class="text-danger" data-toggle="modal" data-target="#deleteInfo" onclick="confirmDelete(${staff.id})">
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
                categoryListElement.appendChild(tbody);
            })
            .catch(error => console.error(error));

        const rowElement = document.createElement('tr');
        rowElement.innerHTML = row;

        function confirmDelete(id) {
            console.log("Id", id);
            $("#deleteInfo").modal("show");
            $("#deleteBtn").on("click", function() {
                console.log("Delete button clicked", id);

                //Hành động xóa thông tin tại đây
                fetch(`api/staffs/${id}`, {
                    method: "DELETE"
                });
                window.location.href = "staff_manager";
            });
        }

        function detailStaff(id) {
            sessionStorage.setItem("staffId", id);
            console.log(sessionStorage.getItem("staffId"));
            window.location.assign("/detail_staff");
        }

        tbody.appendChild(rowElement);
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
                        <h1 class="h3 mb-2 text-gray-800">Quản lý nhân viên</h1>
                        <a href="create_staff" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Thêm nhân viên</span>
                        </a>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="DanhSachNhanVienTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-nowrap">Mã nhân viên</th>
                                            <th scope="col" class="text-nowrap">Họ tên</th>
                                            <th scope="col" class="text-nowrap">Email</th>
                                            <th scope="col" class="text-nowrap">Sđt</th>
                                            <th scope="col" class="text-nowrap">Ngày tạo</th>
                                            <th scope="col" class="text-nowrap">Địa chỉ</th>
                                            <th scope="col" class="text-nowrap">Thành phố</th>
                                            <th scope="col" class="text-nowrap">Giới tính</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th scope="col" class="text-nowrap">Mã nhân viên</th>
                                            <th scope="col" class="text-nowrap">Họ tên</th>
                                            <th scope="col" class="text-nowrap">Email</th>
                                            <th scope="col" class="text-nowrap">Sđt</th>
                                            <th scope="col" class="text-nowrap">Ngày tạo</th>
                                            <th scope="col" class="text-nowrap">Địa chỉ</th>
                                            <th scope="col" class="text-nowrap">Thành phố</th>
                                            <th scope="col" class="text-nowrap">Giới tính</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div> -->

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
                    <button id="cancelBtn" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="deleteBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    {{-- </script> --}}
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