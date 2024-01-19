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
                        <h1 class="h3 mb-2 text-gray-800">Tạo khuyến mãi mới</h1>

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
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <form id="input-form">
                                @csrf

                                <div class="form-row">
                                    <!-- <div class="form-group col-md-6">
                                    <label for="MaKM">Mã khuyến mãi</label>
                                    <input type="text" class="form-control" id="MaKM">
                                </div> -->
                                    <div class="form-group col-md-12">
                                        <label for="TenKM">Tên khuyến mãi</label>
                                        <input type="text" class="form-control" id="TenKM">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgBD">Ngày bắt đầu</label>
                                        <input type="date" class="form-control" id="NgBD">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgKT">Ngày kết thúc</label>
                                        <input type="date" class="form-control" id="NgKT">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="PTKM">Phần trăm khuyến mãi</label>
                                        <input type="number" step="0.1" class="form-control" id="PTKM">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="DMuc">Định mức</label>
                                        <input type="number" class="form-control" id="DMuc">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Max">Tối đa</label>
                                        <input type="number" class="form-control" id="Max">
                                    </div>
                                </div>

                                <!--------------------Button--------------------------->
                                <div class="d-grid d-flex justify-content-between">
                                    <!------ Button Quay Lại ------>
                                    <a href="/discount_manager" class="form-group btn btn-secondary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Quay lại</span>
                                    </a>

                                    <!------ Button Tạo ------>
                                    <a class="form-group btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <button id="submitBtn" type="submit" class="btn btn-success">Lưu thông tin</button>
                                    </a>
                                </div>
                            </form>
                            <hr class="my-12" />


                        </div>
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
                    <a class="btn btn-danger" href="login.html">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông báo sửa thành công -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">s
                    Sửa thông tin khuyến mãi thành công!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#input-form').addEventListener("submit", function(event) {
            event.preventDefault();

            //DATA đã update
            var discountId = document.getElementById('MaKM').value; // Lấy ID từ trường ẩn trong form
            var tenKM = document.getElementById('TenKM').value;
            var ngayBD = document.getElementById('NgBD').value;
            var ngayKT = document.getElementById('NgKT').value;
            var ptkm = document.getElementById('PTKM').value;
            var dmuc = document.getElementById('DMuc').value;
            var max = document.getElementById('Max').value;

            var updatedData = {
                TenKM: tenKM,
                NgayBD: ngayBD,
                NgayKT: ngayKT,
                PhanTramKM: ptkm,
                DinhMuc: dmuc,
                ToiDa: max,
            };

            fetch(`/api/discounts`, {
                    method: "POST", // Hoặc "PATCH" tùy thuộc vào cấu hình của bạn
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(updatedData)
                })
                .then(response => response.json())
                .then(data => {

                });
            // Hiển thị thông báo khi lưu thành công
            $("#successModal").modal("show");
            $("#successModal").on("hidden.bs.modal", function() {
                // Quay về trang detail
                window.location.href = "/";
            });

            // .catch(error => {
            //     console.error(error);
            // });

        });

        document.getElementById("NgBD").addEventListener("change", function() {
            const ngBDInput = document.getElementById('NgBD');
            const ngKTInput = document.getElementById('NgKT');
            ngKTInput.min = ngBDInput.value;
        })
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