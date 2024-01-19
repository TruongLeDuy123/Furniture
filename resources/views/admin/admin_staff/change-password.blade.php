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
        // Truy xuất ID từ Session Storage
        var id = sessionStorage.getItem('email');
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        <!-- End of Sidebar -->

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
                        <h1 class="h3 mb-2 text-gray-800">Thay đổi mật khẩu</h1>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-4">
                            <form id="input-form">
                                <div class=" form-group">
                                    <label for="HoTen">Mật khẩu cũ</label>
                                    <input type="password" id="HoTen" class="form-control">
                                </div>
                                <div class=" form-group">
                                    <label>Mật khẩu mới</label>
                                    <input type="password" id="Email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" id="SDT" class="form-control">
                                </div>

                                <hr class="my-12" />

                                <!--------------------Button--------------------------->
                                <div class="d-grid d-flex justify-content-between">
                                    <!------ Button Quay Lại ------>
                                    <a class="form-group btn btn-secondary btn-icon-split" href="/staff_manager">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-left">
                                            </i>
                                        </span>

                                        <span class="text">
                                            Quay lại
                                        </span>
                                    </a>

                                    <!------ Button Lưu ------>
                                    <a class="form-group btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <button type="submit" class="btn btn-success">Lưu</button>
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
                    Sửa thông tin nhân viên thành công!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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