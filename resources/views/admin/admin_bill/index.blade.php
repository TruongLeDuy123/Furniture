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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script>
        window.current_page = 1;
        window.id = "allData";
        window.status = "all";

        async function fetchPagination(status) {
            var pagination = document.getElementById('pagination');
            pagination.innerHTML = "";
            // <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            // <li class="page-item"><a class="page-link" href="#">1</a></li>
            // <li class="page-item"><a class="page-link" href="#">Next</a></li>
            const response = await fetch(`api/bills/getlastpage/${status}`);
            const totalPage = await response.json();
            if (totalPage > 1) {
                var pageNumbersHTML = `<li class="page-item"><a class="page-link" onClick="loadPage(0, ${totalPage})">Previous</a></li>`;
                for (var i = 1; i <= totalPage; i++) {
                    pageNumbersHTML += `<li class="page-item"><a class="page-link" onClick="loadPage(${i}, ${totalPage})">${i}</a></li>`;
                }
                pageNumbersHTML += `<li class="page-item"><a class="page-link" onClick="loadPage(${totalPage + 1}, ${totalPage})">Next</a></li>`;
                pagination.insertAdjacentHTML('afterbegin', pageNumbersHTML);
            }
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
            fetchData(window.status, window.current_page);
        }

        function exportToExcel() {
            var table = document.getElementById("BillTable");
            var wb = XLSX.utils.table_to_book(table, {
                sheet: "Hoa Don"
            });
            var wbout = XLSX.write(wb, {
                bookType: "xlsx",
                bookSST: true,
                type: "binary"
            });

            function s2ab(s) {
                var buf = new ArrayBuffer(s.length);
                var view = new Uint8Array(buf);
                for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
                return buf;
            }

            saveAs(new Blob([s2ab(wbout)], {
                type: "application/octet-stream"
            }), "hoa_don.xlsx");
        }


        async function fetchData(status, current_page) {
            // Tiếp tục với yêu cầu fetch('/api/products')
            const billResponse = await fetch(`/api/bills/status/${status}?page=${current_page}`);
            // Xử lý phản hồi từ yêu cầu fetch('/api/bills') ở đây
            const data = await billResponse.json();

            const tbody = document.querySelector('#BillTable tbody');
            tbody.innerHTML = '';

            let row = '';
            const billList = data.data;
            billList.forEach(bill => {
                // let tenDM = 'null';
                // let category = window.categoryList.find(category => category.id == bill.MaDM);
                // if (category) {
                //     tenDM = category.TenDM;
                // }
                row = `
                <tr>
                                            <th scope="row">${bill.id}</th>
                                            <td>${bill.TTTT}</td>
                                            <td>${bill.MaKH}</td>
                                            <td>${bill.MaNV}</td>
                                            <td class="overflow-y-auto">${bill.NgayHD}</td>
                                            <td class="overflow-y-auto">${bill.NgayGH}</td>
                                            <!--<td>${bill.SDT}</td>
                                            <td class="overflow-y-auto">${bill.DiaChi}</td>
                                            <td>${bill.ThanhPho}</td>-->
                                            <td>${bill.MaKM}</td>
                                            <td>${bill.TriGia}</td>
                                            <td>
                                                <div class="d-flex  justify-content-center">
                                                    <a class="mr-2 text-success" onclick="detailBill(${bill.id})">
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
            billListElement.appendChild(tbody);
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchPagination(window.status);
            fetchData(window.status, window.current_page);
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
                        <h1 class="h3 mb-2 text-gray-800">Quản lý thông tin đơn hàng</h1>
                        <div class="list-group list-group-horizontal">
                            <a id="allData" onclick="loadStatus('all')" style="width: auto !important" class="list-group-item list-group-item-action active">Tất cả</a>

                            <a id="pending" onclick="loadStatus('pending')" style="width: auto !important" class="list-group-item list-group-item-action">Đang chờ</a>
                            <a id="inTransit" onclick="loadStatus('inTransit')" style="width: auto !important" class="list-group-item list-group-item-action">Đang giao</a>
                            <a id="delivered" onclick="loadStatus('delivered')" style="width: auto !important" class="list-group-item list-group-item-action">Đã giao</a>
                            <a id="cancelled" onclick="loadStatus('cancelled')" style="width: auto !important" class="list-group-item list-group-item-action">Bị hủy</a>
                        </div>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="BillTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-nowrap">Mã DM</th>
                                            <th class="text-nowrap">Tình trạng TT</th>
                                            <th class="text-nowrap">Mã KH</th>
                                            <th class="text-nowrap">Mã NV</th>
                                            <th class="text-nowrap">Ngày HD</th>
                                            <th class="text-nowrap">Ngày GH</th>
                                            <!-- <th class="text-nowrap">SĐT</th>
                                            <th class="text-nowrap">Địa chỉ</th>
                                            <th class="text-nowrap">Thành phố</th> -->
                                            <th class="text-nowrap">Mã KM</th>
                                            <th class="text-nowrap">Trị giá</th>
                                            <th class="text-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>Mã DM</th>
                                            <th>Tình trạng TT</th>
                                            <th>Mã KH</th>
                                            <th>Mã NV</th>
                                            <th>Ngày HD</th>
                                            <th>Ngày GH</th>
                                            <!-- <th>SĐT</th>
                                            <th>Địa chỉ</th>
                                            <th>Thành phố</th> -->
                                            <th class="text-nowrap">Mã KM</th>
                                            <th>Trị giá</th>
                                            <th></th>
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
                                            <td class="overflow-y-auto">B16 Song hành An phú – An Khánh Q.02 </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
                            <div class="d-flex justify-content-end">
                                <button onclick="exportToExcel()" class="btn btn-primary">Export Hóa Đơn</button>
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
                    <a class="btn btn-danger" href="login.html">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function detailBill(id) {
            sessionStorage.setItem("billId", id);
            window.location.assign("/detail_bill");
        }

        function loadStatus(idLink) {
            if (window.id != idLink) {
                oldStatusLink = document.getElementById(window.id);
                oldStatusLink.classList.remove("active");

                window.id = idLink;
                statusLink = document.getElementById(window.id);
                statusLink.classList.add("active");

                var content = "all";
                if (idLink != "allData") {
                    content = statusLink.textContent;
                }

                window.status = content;
                window.current_page = 1;
                fetchPagination(window.status);
                fetchData(window.status, window.current_page);
            }
        }
    </script>
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