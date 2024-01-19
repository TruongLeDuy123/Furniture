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
            const response = await fetch('api/products/getlastpage/10');
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
            console.log("load page: ", window.current_page);
        }

        window.categoryList = [];
        async function fetchCategories() {
            const response = await fetch('/api/categories/');
            const data = await response.json();

            data.forEach(category => {
                window.categoryList.push({
                    id: category.id,
                    TenDM: category.TenDM,
                });
            });
        }
        async function fetchData(current_page) {
            // Tiếp tục với yêu cầu fetch('/api/products')
            const productResponse = await fetch(`/api/products/paginate/10?page=${current_page}`);
            // Xử lý phản hồi từ yêu cầu fetch('/api/products') ở đây
            const data = await productResponse.json();
            console.log(data);
            // const productListElement = document.getElementById('SanPhamTable');
            // // Tạo một phần tử <tbody>
            // const tbody = document.createElement('tbody');
            const tbody = document.querySelector('#SanPhamTable tbody');
            tbody.innerHTML = '';

            let row = '';
            const productList = data.data;
            productList.forEach(product => {
                let tenDM = 'null';
                let category = window.categoryList.find(category => category.id == product.MaDM);
                if (category) {
                    tenDM = category.TenDM;
                }
                row = `
                    <tr>
                        <th scope="row">${product.id}</th>
                        <td>${product.TenSP}</td>
                        <td>${tenDM}</td>
                        <td>${product.NSX}</td>
                        <td>${product.ThuongHieu}</td>
                        <td>${product.Gia}</td>
                        <td>${product.TongSL}</td>
                        <td>
                            <div class="d-flex  justify-content-center">
                                <a onclick="detailProduct(${product.id})" class="mr-2 text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a onclick="confirmDelete(${product.id})" class="text-danger">
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
            productListElement.appendChild(tbody);
        }
        document.addEventListener('DOMContentLoaded', function() {
            fetchCategories();
            fetchPagination();
            fetchData(window.current_page);
        });
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
                        <h1 class="h3 mb-2 text-gray-800">Quản lý thông tin sản phẩm</h1>
                        <a href="{{route('create_product')}}" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            
                            <span class="text">Thêm thông tin</span>
                        </a>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="SanPhamTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Mã SP</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục SP</th>
                                            <th>Nước SX</th>
                                            <th>Thương hiệu</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng SL</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>Mã SP</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục SP</th>
                                            <th>Nước SX</th>
                                            <th>Thương hiệu</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng SL</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- One row of data -->
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>1</td>
                                            <td>wfwwfwefwef</td>
                                            <td>fwefwfw</td>
                                            <td>0907009598</td>
                                            <td>2022-11-16</td>
                                            <td>B16 Song hành An phú – An Khánh Q.02 </td>


                                            <td>
                                                <div class="d-flex  justify-content-center">
                                                    <a class="mr-2 text-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                    <a class="text-danger" data-toggle="modal" data-target="#deleteInfo">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> -->
                                        <!-- End of one row -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul id="pagination" class="pagination">
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btndelete" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    </scrip>
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
        function detailProduct(id) {
            console.log("Id", id);
            sessionStorage.setItem("productId", id);
            console.log(sessionStorage.getItem("productId"));
            window.location.assign("/detail_product");
        }

        function confirmDelete(id) {
            console.log("Id", id);
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