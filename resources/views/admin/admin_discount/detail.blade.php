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
        window.id = sessionStorage.getItem('discountId');
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("MaKM").value = window.id;

        });

        function formatDate(dateString) {
            const [year, month, day] = dateString.split(' ')[0].split('-');
            return `${year}-${month}-${day}`;

        }
        fetch(`/api/discounts/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("TenKM").value = data.TenKM;
                document.getElementById("NgBD").value = formatDate(data.NgayBD);
                document.getElementById("NgKT").value = formatDate(data.NgayKT);
                document.getElementById("PTKM").value = data.PhanTramKM;
                document.getElementById("DMuc").value = data.DinhMuc;
                document.getElementById("Max").value = data.ToiDa;


            })
            .catch(error => console.error(error));

        function confirmDelete(ID) {
            console.log("Id", ID);
            $("#deleteInfo").modal("show");
            $("#deleteBtn").on("click", function() {
                console.log("Delete button clicked", ID);

                //Hành động xóa thông tin tại đây
                fetch(`api/discounts/${ID}`, {
                    method: "DELETE"
                });
                window.location.href = "/discount_manager";
            });
            console.log(ID);
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
                        <h1 class="h3 mb-2 text-gray-800">Thông tin khuyến mãi</h1>
                        <!------ Button Xóa ------>
                        <!-- <a onclick="confirmDelete(window.id)" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteInfo">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Xóa thông tin</span>
                        </a> -->
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="MaKM">Mã khuyến mãi </label>
                                        <input readonly type="text" class="form-control" id="MaKM"></input>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="TenKM">Tên khuyến mãi</label>
                                        <input readonly type="text" class="form-control" id="TenKM">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgBD">Ngày bắt đầu</label>
                                        <input readonly type="date" class="form-control" id="NgBD">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgKT">Ngày kết thúc</label>
                                        <input readonly type="date" class="form-control" id="NgKT">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="PTKM">Phần trăm khuyến mãi</label>
                                        <input readonly type="text" class="form-control" id="PTKM">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="DMuc">Định mức</label>
                                        <input readonly type="text" class="form-control" id="DMuc">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="Max">Tối đa</label>
                                        <input readonly type="text" class="form-control" id="Max">
                                    </div>
                                </div>


                            </form>
                            <hr class="my-12" />

                            <!--------------------Button--------------------------->
                            <div class="d-grid d-flex justify-content-between">
                                <!------ Button Quay Lại ------>
                                <a href="{{ route('discount_manager') }}" class="form-group btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Quay lại</span>
                                </a>

                                <!------ Button Lưu ------>
                                <a class="form-group btn btn-info btn-icon-split" href="{{route('edit_discount')}}">
                                    <span class="icon text-white-50">
                                        <i class="fas  fa-info-circle"></i>
                                    </span>
                                    <input type="submit" value="Chỉnh sửa" class="btn btn-info" />
                                </a>
                            </div>
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
                    <a id="deleteBtn" class="btn btn-danger">Delete</a>
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