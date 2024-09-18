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

    <link rel="stylesheet" href="{{asset('css/admin-chatbot.css')}}" />
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script>
        window.cusId = 0;
        async function fetchData() {
            await fetch('/api/chatlist')
            .then(response => response.json())
            .then(data => {
                // const chatListElement = document.getElementById('ChatListTable');
                // Tạo một phần tử <tbody>
                const tbody = document.querySelector('#ChatListTable tbody');
                // const tbody = chatListElement.querySelector('tbody');
                tbody.innerHTML = "";

                let row = '';
                console.log("data: ", data);
                data.forEach(cus => {
                    let seen = `<td id='seen-${cus.id}' class='text-danger'>Chưa xem</td>`;
                    if (cus.seen) {
                        seen = `<td id='seen-${cus.id}' class='text-success'>Đã xem</td>`;
                    }
                    console.log("seen: ", seen);
                    row = `
                    <tr>
                        <th scope="row">${cus.id}</th>
                            <td>${cus.TenKH}</td>
                            ${seen}
                            <div class="d-flex  justify-content-center">
                                <a class="mr-2 text-primary" onclick="seenChatbox(${cus.id}, '${cus.TenKH}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
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
                // chatListElement.appendChild(tbody);
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchData();
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
                        <h1 class="h3 mb-2 text-gray-800">Chatbox</h1>
                    </div>

                    <hr class="my-12" />

                    <div class="mt-10"></div>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="ChatListTable" class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Mã khách hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Tác vụ</th>

                                        </tr>
                                    </thead>
                                    <tfoot class="thead-dark">
                                        <tr>
                                            <th>Mã khách hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Tác vụ</th>

                                        </tr>
                                    </tfoot>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <button class="chatbot-toggler">
                        <span class="material-symbols-rounded">mode_comment</span>
                        <span class="material-symbols-outlined">close</span>
                    </button>
                    <div class="chatbot">
                        <div class="header">
                            <h2 id="cusName">Chatbot</h2>
                            <span class="close-btn material-symbols-outlined">close</span>
                        </div>
                        <ul id="chatbox" class="chatbox">
                            <!-- <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there 👋<br>How can I help you today?</p>
            </li>

            <li class="chat outgoing">
                <p>ss</p>
            </li> -->
                        </ul>

                        <div class="chat-input">
                            <textarea id="inputMessage" placeholder="Enter a message..." spellcheck="false" required></textarea>
                            <span id="send-btn" class="material-symbols-rounded">Send</span>
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
        const chatbox = document.querySelector(".chatbox");
        const chatInput = document.querySelector(".chat-input textarea");
        const sendChatBtn = document.querySelector(".chat-input span");
        const chatbotToggler = document.querySelector(".chatbot-toggler");
        const closeBtn = document.querySelector(".close-btn");
        const adminChatbox = document.getElementById("admin-chatbox");

        let userMessage = null; // Variable to store user's message
        const inputInitHeight = chatInput.scrollHeight;

        const createChatLi = (message, className) => {
            // Create a chat <li> element with passed message and className
            const chatLi = document.createElement("li");
            chatLi.classList.add("chat", className);
            let chatContent =
                className === "outgoing" ?
                `<p></p>` :
                `<span class="material-symbols-outlined">person</span><p></p>`;
            chatLi.innerHTML = chatContent;
            chatLi.querySelector("p").textContent = message;

            return chatLi; // return chat <li> element
        };

        const pusher = new Pusher('{{config("broadcasting.connections.pusher.key")}}', {
            cluster: 'ap1'
        });
        const channel = pusher.subscribe('public');

        async function handleChat() {
            userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
            if (!userMessage) return;
            // Clear the input textarea and set its height to default
            chatInput.value = "";

            chatbox.appendChild(createChatLi(userMessage, "outgoing"));
            //Thanh trượt xuống tự động khi nội dung  chatbot nhiều
            chatbox.scrollTo(0, chatbox.scrollHeight);

            // setTimeout(() => {
            //     // Display "Thinking..." message while waiting for the response
            //     chatbox.appendChild(createChatLi("Xin đợi phản hồi từ người bán", "incoming"));
            //     chatbox.scrollTo(0, chatbox.scrollHeight);
            // }, 600);

            var newData = {
                cus_id: window.cusId,
                message: userMessage,
                seen: false,
                sender: "admin",
            };

            console.log("newdata: ", newData);

            await fetch("/api/chat", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(newData)
                })
                .then(response => response.json())
                .then(data => {
                    // Xử lý phản hồi từ API (nếu cần)
                    // console.log(data);
                })

            const params = new URLSearchParams({
                message: userMessage,
                customerId: window.cusId,
                sender: "admin",
            });
            await fetch(`/api/sendmessage?${params}`)
                .then(response => response.json())
                .then(data => {
                    // Xử lý phản hồi từ API (nếu cần)
                    console.log(data);
                })
        };

        chatInput.addEventListener("input", () => {
            // Adjust the height of the input textarea based on its content
            chatInput.style.height = `${inputInitHeight}px`;
            chatInput.style.height = `${chatInput.scrollHeight}px`;
        });

        chatInput.addEventListener("keydown", (e) => {
            // If Enter key is pressed without Shift key and the window
            // width is greater than 800px, handle the chat
            if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
                e.preventDefault();
                handleChat();
            }
        });
        sendChatBtn.addEventListener("click", handleChat());
        chatbotToggler.addEventListener("click", function() {
            if (window.cusId != 0) {
                document.body.classList.toggle("show-chatbot")
            }
        });
        closeBtn.addEventListener("click", () =>
            document.body.classList.remove("show-chatbot")
        );

        async function seenChatbox(id, tenkh) {
            window.cusId = id;
            // console.log("tenkh: ", tenkh);
            document.getElementById("cusName").textContent = tenkh;
            document.body.classList.toggle("show-chatbot");
            const seen = document.getElementById(`seen-${id}`);
            seen.classList.remove("text-danger");
            seen.classList.add("text-success");
            seen.textContent = "Đã xem";

            await fetch(`/api/update-chat/${id}`, {
                    method: "PUT",
                })
                .then(response => response.json())
                .then(data => {
                    // Xử lý phản hồi từ API (nếu cần)
                    console.log(data);
                })

            await fetch(`/api/chat/cus-id/${id}`)
                .then(response => response.json())
                .then(data => {
                    const chatbox = document.getElementById('chatbox');
                    let row = '';
                    data.forEach(message => {
                        if (message.sender == "admin") {
                            row += `
                            <li class="chat outgoing">
                                <p>${message.message}</p>
                            </li>
                        `;
                        } else {
                            row += `
                            <li class="chat incoming">
                                <span class="material-symbols-outlined">account_circle</span>
                                <p>${message.message}</p>
                            </li>
                        `;
                        }
                    });
                    chatbox.innerHTML = row;
                })

                .catch(error => console.error(error));

        }

        // Nhận tin từ máy chủ trên máy khách
        channel.bind('chat-event', function(data) {
            // Lấy nội dung tin nhắn từ dữ liệu nhận được
            const message = data.message;
            const customerId = data.customerId;
            const sender = data.sender;
            console.log("data kh gửi: ", data);
            if (customerId == window.cusId & sender != 'admin') {
                // const chatbox = document.querySelector(".chatbox");
                chatbox.appendChild(createChatLi(message, "incoming"));

                //Thanh trượt xuống tự động khi nội dung  chatbot nhiều
                chatbox.scrollTo(0, chatbox.scrollHeight);
            }

            fetchData();
        });
    </script>

</body>

</html>