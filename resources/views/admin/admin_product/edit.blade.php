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

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <script>
        var id = sessionStorage.getItem('productId');
        console.log("id:", id);

        window.chiTiet = "";
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("id").value = id;
            fetchProduct();
        });

        async function fetchProduct() {
            await fetchCategories();
            console.log("id fepro:", id);
            const response = await fetch(`/api/products/${id}`);
            const data = await response.json();
            console.log(data);
            document.getElementById("TenSP").value = data.TenSP;
            document.getElementById("NSX").value = data.NSX;
            document.getElementById("THieu").value = data.ThuongHieu;
            document.getElementById("Gia").value = data.Gia;
            document.getElementById("TongSL").value = data.TongSL;
            document.getElementById("HinhAnh").value = data.HinhAnh;
            document.getElementById("DanhMucSp").value = data.MaDM;
            // document.getElementById("ChiTiet").value = data.ChiTiet;
            if (data.ChiTiet != null) {
                window.chiTiet = data.ChiTiet;
            }

            ClassicEditor
                .create(document.querySelector('#ChiTiet'))
                .then(editor => {
                    editor.setData(window.chiTiet);
                    // Bắt sự kiện khi trình soạn thảo mất focus (blur)
                    editor.editing.view.document.on('blur', () => {
                        window.chiTiet = editor.getData();
                    });

                    // Bắt sự kiện khi trình soạn thảo thay đổi (change)
                    editor.model.document.on('change', () => {
                        window.chiTiet = editor.getData();
                        console.log("window.chiTiet: ", window.chiTiet);
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }

        async function fetchCategories() {
            const response = await fetch('/api/categories/');
            const data = await response.json();

            const categorySelect = document.getElementById('DanhMucSp');

            data.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.text = category.TenDM;
                categorySelect.appendChild(option);
            });
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
                        <h1 class="h3 mb-2 text-gray-800">Chỉnh sửa thông tin sản phẩm</h1>
                        <!------ Button Xóa ------>
                        <a onclick="confirmDelete()" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteInfo">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Xóa thông tin</span>
                        </a>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <form id="input-form">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="MaSP">Mã sản phẩm</label>
                                        <input readonly type="text" class="form-control" id="id">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="TenSP">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="TenSP">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="NSX">Nhà sản xuất</label>
                                        <input type="text" class="form-control" id="NSX">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="THieu">Thương hiệu</label>
                                        <input type="text" class="form-control" id="THieu">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="DMSP">Danh mục SP</label>
                                        <select name="DanhMucSp" id="DanhMucSp" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Gia">Giá</label>
                                        <input type="number" min="0" class="form-control" id="Gia">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="TongSL">Tổng SL</label>
                                        <input type="number" min="0" class="form-control" id="TongSL">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="HinhAnh">Url hình ảnh</label>
                                        <input type="text" class="form-control" id="HinhAnh">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="ChiTiet">Chi tiết</label>
                                        <textarea type="text" class="form-control" rows="6" id="ChiTiet"></textarea>
                                    </div>
                                </div>
                                <hr class="my-12" />

                                <!--------------------Button--------------------------->
                                <div class="d-grid d-flex justify-content-between">
                                    <!------ Button Quay Lại ------>
                                    <a href="javascript:history.back()" asp-action="Index" class="form-group btn btn-secondary btn-icon-split">
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
                                        <input type="submit" value="Lưu thông tin" class="btn btn-success" />
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
                    Sửa danh mục sản phẩm thành công!
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

    <script>
        document.querySelector('#input-form').addEventListener("submit", function(event) {
            event.preventDefault();
            var id = document.querySelector("#id").value;
            var tensp = document.querySelector("#TenSP").value;
            var nsx = document.querySelector("#NSX").value;
            var thieu = document.querySelector("#THieu").value;
            var gia = document.querySelector("#Gia").value;
            var sl = document.querySelector("#TongSL").value;
            var hinhanh = document.querySelector("#HinhAnh").value;
            var madm = document.querySelector("#DanhMucSp").value;
            // var chitiet = document.querySelector("#ChiTiet").value;

            var newData = {
                TenSP: tensp,
                NSX: nsx,
                ThuongHieu: thieu,
                Gia: gia,
                TongSL: sl,
                HinhAnh: hinhanh,
                MaDM: madm,
                ChiTiet: window.chiTiet,
            };

            console.log("new : ", newData);

            fetch(`/api/products/${id}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    // Xử lý phản hồi từ API (nếu cần)
                    console.log(data);
                    $("#successModal").modal("show");
                    $("#successModal").on("hidden.bs.modal", function() {
                        // window.location.replace("/product_manager");
                        window.location.href = "/detail_product"; // Thay đổi "/index" thành URL của trang index
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        });

        function confirmDelete() {
            var id = document.querySelector("#id").value;
            $("#deleteInfo").modal("show");
            $("#btndelete").on("click", function() {
                console.log("Delete button clicked", id);
                // Thực hiện các hành động xóa thông tin tại đây
                fetch(`/api/products/${id}`, {
                    method: 'DELETE'
                });
                window.location.href = "product_manager";
            });
        }
    </script>
</body>

</html>