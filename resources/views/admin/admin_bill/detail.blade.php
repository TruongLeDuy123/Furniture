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
        var id = sessionStorage.getItem('billId');
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("MaHD").value = id;
            
        });
        function formatDate(dateString) {
            const [year, month, day] = dateString.split(' ')[0].split('-');
            return `${year}-${month}-${day}`;

        }
        fetch(`/api/bills/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("MaKH").value = data.MaKH;
                document.getElementById("MaNV").value = data.MaNV;
                document.getElementById("MaKH").value = data.MaKH;
                var selectTTDH = document.getElementById("TTDH");
                for (var i = 0; i < selectTTDH.options.length; i++) {

                    var optionText = selectTTDH.options[i].text.trim();
                    var dataTTDH = data.TTDH.trim();

                    // console.log(optionText);
                    // console.log(dataTTDH);

                    // console.log(optionText === dataTTDH);
                    if (optionText === dataTTDH) {
                        selectTTDH.options[i].selected = true;
                    }
                }  
                var selectTTTT = document.getElementById("TTTT");
                for (var i = 0; i < selectTTTT.options.length; i++) {
                    var optionText = selectTTTT.options[i].text.trim();
                    var dataTTTT = data.TTTT.trim();

                    // console.log(optionText);
                    // console.log(dataTTTT);

                    // console.log(optionText === dataTTTT);
                    if (optionText === dataTTTT) {
                        selectTTTT.options[i].selected = true;
                    }
                }              

                console.log(formatDate(data.NgayHD))
                document.getElementById("NgayHD").value = formatDate(data.NgayHD);
                document.getElementById("NgayGH").value = formatDate(data.NgayGH);
                document.getElementById("Sdt").value = data.SDT;
                document.getElementById("Tp").value = data.ThanhPho;
                document.getElementById("Diachi").value = data.DiaChi;
                document.getElementById("MaKM").value = data.MaKM;
                document.getElementById("Trigia").value = data.TriGia;
                var maKH=String(data.MaKH);
                var maKM=String(data.MaKM);
                var maNV = String(data.MaNV); 
                fetch(`/api/customers/${maKH}`)
                    .then(response => response.json())
                    .then(customer => {
                        document.getElementById("TenKH").value = customer.HoTen;
                    })
                    .catch(error => console.error(error));

                    fetch(`/api/staffs/${maNV}`)
                    .then(response => response.json())
                    .then(staff => {
                        document.getElementById("TenNV").value = staff.HoTen;
                    })
                    .catch(error => console.error(error));
                    fetch(`/api/discounts/${maKM}`)
                    .then(response => response.json())
                    .then(discount => {
                        document.getElementById("TenKM").value = discount.TenKM;
                    })
                    .catch(error => console.error(error));
                
            })
            .catch(error => console.error(error));
           
    </script>
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
                        <h1 class="h3 mb-2 text-gray-800">Thông tin hóa đơn</h1>
                        <!------ Button Xóa ------>
                        <!-- <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteInfo">
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
                            <form id="input-form"> 
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="MaHD">Mã hóa đơn</label>
                                        <input readonly type="text" class="form-control" id="MaHD">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="MaKH">Mã khách hàng</label>
                                        <input readonly type="text" class="form-control" id="MaKH">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="TenKH">Tên khách hàng</label>
                                        <input readonly type="text" class="form-control" id="TenKH">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="MaNV">Mã nhân viên</label>
                                        <input readonly type="text" class="form-control" id="MaNV">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="TenNV">Tên nhân viên</label>
                                        <input readonly type="text" class="form-control" id="TenNV">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="TTDH">Thông tin đơn hàng</label>
                                        <select class="form-control" id="TTDH">
                                            <option value="Dangcho">Đang chờ</option>
                                            <option value="Danggiao">Đang giao</option>
                                            <option value="Dagiao">Đã giao</option>
                                            <option value="Huy">Bị hủy</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="TTTT">Trạng thái thanh toán</label>
                                        <select class="form-control" id="TTTT">
                                            <option value="Chua">Chưa thanh toán</option>
                                            <option value="Xong">Đã thanh toán</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgayHD">Ngày hóa đơn</label>
                                        <input readonly type="date" class="form-control" id="NgayHD" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NgayGH">Ngày giao hàng</label>
                                        <input readonly type="date" class="form-control" id="NgayGH" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Sdt">Số điện thoại</label>
                                        <input readonly type="number" class="form-control" id="Sdt" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Tp">Thành phố</label>
                                        <input readonly type="text" class="form-control" id="Tp">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="Diachi">Địa chỉ</label>
                                        <input readonly type="text" class="form-control" id="Diachi" >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="MaKM">Mã khuyến mãi</label>
                                        <input readonly type="text" class="form-control" id="MaKM" >
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="TenKM">Tên khuyến mãi</label>
                                        <input readonly type="text" class="form-control" id="TenKM" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="Trigia">Trị giá</label>
                                        <input readonly type="number" class="form-control" id="Trigia">
                                    </div>
                                </div>   
                                 <!--------------------Button--------------------------->
                            <div class="d-grid d-flex justify-content-between">
                                <!------ Button Quay Lại ------>
                                <a href="{{route('bill_manager')}}" class="form-group btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span class="text">Quay lại</span>
                                </a>

                                <!------ Button Sửa ------>
                                <a href="{{route('edit_bill')}}" class="form-group btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas  fa-info-circle"></i>
                                    </span>
                                    <!-- <input type="submit" value="Chỉnh sửa" class="btn btn-info" /> -->
                                    <span class="btn btn-info">Chỉnh sửa</span>
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