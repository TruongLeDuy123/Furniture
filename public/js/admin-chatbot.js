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
        className === "outgoing"
            ? `<p></p>`
            : `<span class="material-symbols-outlined">person</span>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;

    return chatLi; // return chat <li> element
};

const handleChat = () => {
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
sendChatBtn.addEventListener("click", handleChat);
chatbotToggler.addEventListener("click", () =>
    document.body.classList.toggle("show-chatbot")
);
closeBtn.addEventListener("click", () =>
    document.body.classList.remove("show-chatbot")
);
