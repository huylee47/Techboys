@extends('admin.layouts.master')

@section('main')
    <div class="" id="main">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>Danh sách tin nhắn</h5>
                    <ul class="list-group" id="chat-list">
                        @foreach ($chats as $chat)
                            <li class="list-group-item chat-item" data-chat-id="{{ $chat->id }}">
                                <span class="chat-name">
                                    @if ($chat->customer && $chat->customer->role_id == 2)
                                        @if ($chat->customer->gender == 1)
                                            Anh {{ $chat->customer->name }}
                                        @else
                                            Chị {{ $chat->customer->name }}
                                        @endif
                                    @elseif ($chat->staff && $chat->staff->role_id == 1)
                                        {{ 'Staff: ' . $chat->staff->name }}
                                    @else
                                        {{ 'Guest ' . $chat->id }}
                                    @endif
                                </span>
                                <span class="badge bg-danger new-message-count" data-chat-id="{{ $chat->id }}"
                                    style="display: none;">0</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-8">
                    <h5>Tin nhắn </h5>
                    <div class="card">
                        <div class="card-body chat-box" id="chat-box">
                            <div id="messages-container">
                                <p class="text-muted">Chọn cuộc trò chuyện để xem tin nhắn.</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <input type="text" id="message-input" class="form-control"
                                    placeholder="Nhập tin nhắn...">
                                <button class="btn btn-primary" id="send-message">Gửi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    @vite(['resources/js/app.js'])

    <script>
        window.adminId = {{ auth()->id() }};
        document.addEventListener("DOMContentLoaded", function() {
            let selectedChatId = null;
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let registeredChannels = new Set();

            console.log("CSRF Token:", csrfToken);

            function getSendMessageUrl(chatId) {
                return `/admin/chats/${chatId}/send`;
            }

            function setupEcho(chatId) {
                if (registeredChannels.has(chatId)) return;
                registeredChannels.add(chatId);

                console.log(`Đăng ký Echo('chat.${chatId}')`);

                window.Echo.channel(`chat.${chatId}`)
                    .listen("MessageSent", (data) => {
                        console.log("Tin nhắn mới:", data);

                        if (selectedChatId == data.chat_id) {
                            let sender = getSenderName(data);

                            if (data.sender_id !== window.adminId) {
                                displayMessage(sender, data.message, false);
                            }
                        } else {
                            updateNewMessageCount(data.chat_id);
                        }
                    });
            }

            function updateNewMessageCount(chatId) {
                let badge = document.querySelector(`.new-message-count[data-chat-id="${chatId}"]`);
                if (badge) {
                    let count = parseInt(badge.innerText) || 0;
                    badge.innerText = count + 1;
                    badge.style.display = "inline-block";
                }
            }
            document.querySelectorAll(".chat-item").forEach(item => {
                item.addEventListener("click", function() {
                    document.querySelectorAll(".chat-item").forEach(el => el.classList.remove(
                        "active"));
                    this.classList.add("active");
                    selectedChatId = this.getAttribute("data-chat-id");
                    document.getElementById("message-input").disabled = false;
                    loadMessages(selectedChatId);
                });
            });

            function loadMessages(chatId) {
                axios.get(`/admin/chats/${chatId}`)
                    .then(response => {
                        let messagesContainer = document.getElementById("messages-container");
                        messagesContainer.innerHTML = "";

                        response.data.messages.forEach(msg => {
                            let sender = getSenderName(msg);
                            let isSender = msg.sender_id === window.adminId; // So sánh với adminId
                            displayMessage(sender, msg.message, isSender);
                        });

                        setupEcho(chatId);
                    })
                    .catch(error => {
                        console.error("Lỗi tải tin nhắn:", error);
                        alert("Lỗi khi tải tin nhắn, vui lòng thử lại.");
                    });
            }



            function getSenderName(msg) {
                if (!msg) return "Không xác định";

                if (msg.sender_id) {
                    if (msg.role_id === 1) {
                        return "Admin";
                    }
                    if (msg.role_id === 2) {
                        return msg.gender === 1 ?
                            `Anh ${msg.customer_name || "Không xác định"}` :
                            `Chị ${msg.customer_name || "Không xác định"}`;
                    }
                } else if (msg.guest_id) {
                    return `Guest ${msg.chat_id}`;
                }

                return "Không xác định";
            }


            function displayMessage(sender, message, isSender) {
                let messagesContainer = document.getElementById("messages-container");
                let msgDiv = document.createElement("div");

                let messageClass = isSender ? "sent" : "received";

                msgDiv.classList.add("message", messageClass);
                msgDiv.innerHTML = `<div class="content">${message}</div>`;

                messagesContainer.appendChild(msgDiv);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }

            let isThrottled = false;

            function sendMessage() {
                let messageInput = document.getElementById("message-input");
                let sendButton = document.getElementById("send-message");
                let message = messageInput.value.trim();

                if (!message || !selectedChatId || isThrottled) return;

                isThrottled = true; 
                sendButton.disabled = true;

                let sender = getSenderName({
                    role_id: 1
                });
                displayMessage(sender, message, true);

                axios.post(getSendMessageUrl(selectedChatId), {
                    message: message
                }, {
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    }
                }).then(response => {
                    if (response.data.success) {
                        messageInput.value = "";

                        // Hủy throttle sau 2 giây
                        setTimeout(() => {
                            isThrottled = false;
                            sendButton.disabled = false;
                        }, 2000);
                    } else {
                        console.error("Lỗi gửi tin nhắn:", response.data);
                        alert("Không thể gửi tin nhắn, thử lại!");
                        isThrottled = false;
                        sendButton.disabled = false;
                    }
                }).catch(error => {
                    console.error("Lỗi kết nối:", error);
                    alert("Lỗi kết nối đến server!");
                    isThrottled = false;
                    sendButton.disabled = false;
                });
            }


            document.getElementById("send-message").addEventListener("click", sendMessage);

            document.getElementById("message-input").addEventListener("keypress", function(event) {
    if (event.key === "Enter" && !isThrottled) {
        event.preventDefault();
        sendMessage();
    }
});


            document.querySelectorAll(".chat-item").forEach(item => {
                let chatId = item.getAttribute("data-chat-id");
                setupEcho(chatId);
            });
            document.querySelectorAll(".chat-item").forEach(item => {
                item.addEventListener("click", function() {
                    document.querySelectorAll(".chat-item").forEach(el => el.classList.remove(
                        "active"));
                    this.classList.add("active");
                    selectedChatId = this.getAttribute("data-chat-id");
                    document.getElementById("message-input").disabled = false;
                    loadMessages(selectedChatId);

                    let badge = document.querySelector(
                        `.new-message-count[data-chat-id="${selectedChatId}"]`);
                    if (badge) {
                        badge.innerText = "0";
                        badge.style.display = "none";
                    }
                });
            });
            window.Echo.channel("admin.chats")
                .listen("NewChatCreated", (data) => {
                    console.log("Chat mới được tạo:", data);

                    let chatList = document.getElementById("chat-list");

                    if (document.querySelector(`.chat-item[data-chat-id="${data.chat_id}"]`)) {
                        return;
                    }

                    let senderName = getSenderName({
                        sender_id: data.customer_id,
                        guest_id: data.guest_id,
                        chat_id: data.chat_id,
                        role_id: data.role_id,
                        gender: data.gender,
                        customer_name: data.customer_name
                    });

                    let newChatItem = document.createElement("li");
                    newChatItem.classList.add("list-group-item", "chat-item");
                    newChatItem.setAttribute("data-chat-id", data.chat_id);

                    let chatName = document.createElement("span");
                    chatName.classList.add("chat-name");
                    chatName.innerText = senderName;
                    newChatItem.appendChild(chatName);

                    let badge = document.createElement("span");
                    badge.classList.add("badge", "bg-danger", "new-message-count");
                    badge.setAttribute("data-chat-id", data.chat_id);
                    badge.style.display = "none";
                    badge.innerText = "0";
                    newChatItem.appendChild(badge);

                    newChatItem.addEventListener("click", function() {
                        document.querySelectorAll(".chat-item").forEach(el => el.classList.remove(
                            "active"));
                        this.classList.add("active");
                        selectedChatId = data.chat_id;
                        document.getElementById("message-input").disabled = false;
                        loadMessages(selectedChatId);

                        let badge = document.querySelector(
                            `.new-message-count[data-chat-id="${selectedChatId}"]`);
                        if (badge) {
                            badge.innerText = "0";
                            badge.style.display = "none";
                        }
                    });

                    chatList.prepend(newChatItem);

                    setupEcho(data.chat_id);
                });

        });
    </script>
@endsection
