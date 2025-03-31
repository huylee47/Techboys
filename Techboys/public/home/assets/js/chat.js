document.addEventListener("DOMContentLoaded", async function() {
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    let chatIcon = document.getElementById("chat-icon");
    let chatModal = document.getElementById("chat-modal");
    let closeChat = document.getElementById("close-chat");
    let chatInput = document.getElementById("chat-input");
    let sendMessage = document.getElementById("send-message");
    let chatMessages = document.getElementById("chat-messages");
    let chatId = null;
    
    if (userRole == 1) {
        chatIcon.style.display = "none";
        chatModal.style.display = "none";
        return;
    } else {
        chatIcon.style.display = "block";
    }

    chatIcon.addEventListener("click", function() {
        chatModal.style.display = "block";
        loadMessages();
    });

    closeChat.addEventListener("click", function() {
        chatModal.style.display = "none";
    });

    sendMessage.addEventListener("click", function() {
        let message = chatInput.value.trim();
        if (message) {
            sendMessageToServer(message);
        }
    });

    async function loadMessages() {
        try {
            let response = await axios.get(loadMessagesUrl);
            let data = response.data;

            chatMessages.innerHTML = "";

            if (data.original && data.original.chat_id) {
                chatId = data.original.chat_id;
            } else {
                console.error("API không trả về chatId.");
                return;
            }

            if (data.original && data.original.messages) {
                data.original.messages.forEach(msg => {
                    let isSender = isCurrentUser(msg);
                    let sender = getSenderName(msg);
                    if (!messageExists(msg.message)) {
                        displayMessage(sender, msg.message, isSender);
                    }
                });
            } else {
                console.error("API không trả về danh sách tin nhắn.");
            }

            chatMessages.scrollTop = chatMessages.scrollHeight;
            setupEcho(chatId);
        } catch (error) {
            console.error("Lỗi tải tin nhắn:", error);
        }
    }

    function getSenderName(msg) {
        if (!msg) return "Không xác định";
        return isCurrentUser(msg) ? "Bạn" : "Admin";
    }

    function isCurrentUser(msg) {
        return (msg.sender_id && msg.sender_id == currentUserId) || (msg.guest_id && msg.guest_id == guestId);
    }

    function setupEcho(chatId) {
        if (window.Echo.connector.channels[`chat.${chatId}`]) {
            console.log(`Kênh chat.${chatId} đã được đăng ký, bỏ qua.`);
            return;
        }

        console.log(`Đăng ký kênh chat.${chatId}`);
        window.Echo.channel(`chat.${chatId}`)
            .listen("MessageSent", (data) => {
                if (!messageExists(data.message)) {
                    let isSender = isCurrentUser(data);
                    let sender = getSenderName(data);
                    displayMessage(sender, data.message, isSender);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
            });
    }

    let isThrottled = false; // Trạng thái throttle

    function sendMessageToServer(message) {
        if (isThrottled) return; // Nếu đang throttle, không gửi tin nhắn
    
        isThrottled = true; // Bắt đầu throttle
        sendMessage.disabled = true; // Vô hiệu hóa nút gửi
    
        axios.post(sendMessageUrl, {
                message: message,
                guest_id: guestId
            }, {
                headers: { "X-CSRF-TOKEN": csrfToken }
            })
            .then(response => {
                if (response.data.message === "Message sent successfully") {
                    if (!messageExists(message)) {
                        displayMessage("Bạn", message, true);
                    }
                    chatInput.value = "";
                    chatMessages.scrollTop = chatMessages.scrollHeight;
    
                    // Hủy throttle sau 2 giây
                    setTimeout(() => {
                        isThrottled = false;
                        sendMessage.disabled = false;
                    }, 2000);
                } else {
                    console.error("Lỗi gửi tin nhắn:", response.data);
                    isThrottled = false;
                    sendMessage.disabled = false;
                }
            })
            .catch(error => {
                console.error("Lỗi kết nối:", error);
                isThrottled = false;
                sendMessage.disabled = false;
            });
    }
    

    function displayMessage(sender, message, isSender) {
        let msgDiv = document.createElement("div");
        msgDiv.classList.add("message", isSender ? "sent" : "received");
        msgDiv.innerHTML = `<div class="content">${message}</div>`;
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function messageExists(message) {
        return Array.from(document.querySelectorAll(".message .content"))
            .some(msg => msg.textContent.trim() === message.trim());
    }

    chatInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter" && !event.shiftKey && !isThrottled) {
            event.preventDefault();
            let message = chatInput.value.trim();
            if (message) {
                sendMessageToServer(message);
            }
        }
    });
    
});
