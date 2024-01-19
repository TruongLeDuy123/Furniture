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

    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
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
                        <h1 class="h3 mb-2 text-gray-800">Tạo thông tin nhân viên</h1>

                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <!-- DataTales -->
                    <div class="row">
                        <div class="col-md-8">
                            <form id="input-form" onsubmit="sConsole(event)">
                                @csrf

                                <div class="form-row">
                                    <div class=" form-group col-md-8">
                                        <label for="HoTen">Họ tên</label>
                                        <input type="text" id="HoTen" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Giới tính</label>
                                        <!-- <input type="text" id="GTinh" class="form-control"> -->
                                        <select class="form-control" id="GTinh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                    </div>
                                    <div class=" form-group col-md-8">
                                        <label>Email</label>
                                        <input type="email" id="Email" class="form-control">
                                    </div>
                                    <!-- <div class=" form-group">
                                    <label>Password</label>
                                    <input readonly type="password" id="Password" class="form-control">
                                    </div> -->
                                    <div class="form-group col-md-4">
                                        <label>Số điện thoại</label>
                                        <input type="text" id="SDT" class="form-control">
                                    </div>
                                    
                                    <div class="form-group col-md-8">
                                        <label>Địa chỉ</label>
                                        <input type="text" id="DChi" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Thành Phố</label>
                                        <input type="text" id="TPho" class="form-control">
                                    </div>
                                </div>

                                <hr class="my-12" />

                                <!--------------------Button--------------------------->
                                <div class="d-grid d-flex justify-content-between">
                                    <!------ Button Quay Lại ------>
                                    <a href="/staff_manager" class="form-group btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Quay lại</span>
                                    </a>

                                    <!------ Button Lưu ------>
                                    <a class="form-group btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <button id="submitBtn" type="submit" class="btn btn-success">Lưu thông tin</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
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

    <!-- Ghi dữ liệu lên db -->
    <script>
        document.querySelector('#input-form').addEventListener("submit", function(event) {

            // event.preventDefault();
            var hoten = document.querySelector("#HoTen").value;
            var email = document.querySelector("#Email").value;
            // var pass = document.querySelector("#Password").value;
            var sdt = document.querySelector("#SDT").value;
            var dchi = document.querySelector("#DChi").value;
            var tpho = document.querySelector("#TPho").value;
            var gtinh = document.querySelector("#GTinh").value;

            var newData = {
                HoTen: hoten,
                Email: email,
                // Password: pass,
                SDT: sdt,
                DiaChi: dchi,
                ThanhPho: tpho,
                GioiTinh: gtinh
            };

            fetch("/api/staffs", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    // Xử lý phản hồi từ API (nếu cần)
                    console.log(data);
                });
            $("#successModal").modal("show");
            $("#successModal").on("hidden.bs.modal", function() {
                window.location.href = "staff_manager"; // Thay đổi "/index" thành URL của trang index
            });
            // .catch(error => {
            //     console.error(error);
            // });
        });
    </script>


    <!-- Thông báo thêm thành công -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thêm thông tin nhân viên thành công!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function sConsole(event) {
            event.preventDefault();
            var data = document.getElementById("input-form");
            console.log(data.value);
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.js') }}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin_assets/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Post method -->

</body>

</html>