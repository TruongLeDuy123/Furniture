<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Tạo sự kiện và tạo kiểu cho chatbot -->
    <link rel="stylesheet" href="{{asset('css/chatbot.css')}}" />
    <script src="{{asset('js/chatbot.js')}}" defer></script>
    <script>
        const id = sessionStorage.getItem("id");
        fetch(`/api/chat/cus-id/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log("data: ", data);
                const chatbox = document.getElementById('chatbox');
                let row = '';
                data.forEach(message => {
                    if (message.sender == "customer") {
                        row += `
                            <li class="chat outgoing">
                                <p>${message.message}</p>
                            </li>
                        `;
                    } else {
                        row += `
                            <li class="chat incoming">
                                <span class="material-symbols-outlined">smart_toy</span>
                                <p>${message.message}</p>
                            </li>
                        `;
                    }

                });
                row += `<li class="chat incoming">
                                <span class="material-symbols-outlined">smart_toy</span>
                                <p>Xin chào 👋Tôi có thể giúp gì cho bạn?</p>
                            </li>`;
                chatbox.innerHTML = row;
            })

            .catch(error => console.error(error));
    </script>
</head>

<body>
    <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <div class="header">
            <h2>Chatbot</h2>
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
            <span id="send-btn" class="material-symbols-rounded">send</span>
        </div>
    </div>

    <script>
        const pusher = new Pusher('{{config("broadcasting.connections.pusher.key")}}', {
            cluster: 'ap1'
        });
        const channel = pusher.subscribe('public');

        document.getElementById('inputMessage').addEventListener('keydown', async function(event) {
            if (event.key === 'Enter') {
                console.log('Enter key pressed!');
                var message = this.value;

                var newData = {
                    cus_id: sessionStorage.getItem("id"),
                    message: message,
                    seen: false,
                    sender: "customer",
                };

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
                        console.log(data);
                    })

                const params = new URLSearchParams({
                    message: message,
                    customerId: parseInt(sessionStorage.getItem("id")),
                    sender: "customer",
                });
                await fetch(`/api/sendmessage?${params}`)
                    .then(response => response.json())
                    .then(data => {
                        // Xử lý phản hồi từ API (nếu cần)
                        console.log(data);
                    })
            }

        });

        // Nhận tin từ máy chủ trên máy khách
        channel.bind('chat-event', function(data) {
            // Lấy nội dung tin nhắn từ dữ liệu nhận được
            const id = parseInt(sessionStorage.getItem("id"));
            const message = data.message;
            const customerId = data.customerId;
            const sender = data.sender;
            console.log("data nhận: ", data);
            if (customerId == id & sender != 'customer') {
                const chatbox = document.querySelector(".chatbox");
                chatbox.appendChild(createChatLi(message, "incoming"));

                //Thanh trượt xuống tự động khi nội dung  chatbot nhiều
                chatbox.scrollTo(0, chatbox.scrollHeight);
            }
        });
    </script>
</body>

</html>