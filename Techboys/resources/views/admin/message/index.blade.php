@extends('admin.layouts.master')

@section('main')
<div class="" id="main">
    <div class="container mt-4">
    <div class="row">
        <!-- Danh sách cuộc trò chuyện -->
        <div class="col-md-4">
            <h5>Danh sách tin nhắn</h5>
            <ul class="list-group" id="chat-list">
                @foreach($chats as $chat)
                <li class="list-group-item chat-item {{ request('chat_id') == $chat->id ? 'active' : '' }}"
                    data-chat-id="{{ $chat->id }}">
                    @if ($chat->customer && $chat->customer->role_id != 1)
                        {{ $chat->customer->name }}
                    @elseif ($chat->staff && $chat->staff->role_id ==1)
                        {{ 'Nhân viên: ' . $chat->staff->name }}
                    @else
                        {{ 'Guest ' . $chat->id }}
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        
        <!-- Nội dung tin nhắn -->
        <div class="col-md-8" >
            <h5>Tin nhắn</h5>
            <div class="card">
                <div class="card-body chat-box" id="chat-box">
                    <div id="messages-container">
                        <p class="text-muted">Chọn cuộc trò chuyện để xem tin nhắn.</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="input-group">
                        <input type="text" id="message-input" class="form-control" placeholder="Nhập tin nhắn...">
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
document.addEventListener("DOMContentLoaded", function () {
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
                    displayMessage(sender, data.message);
                } else {
                    alert("Bạn có tin nhắn mới từ khách hàng!");
                }
            });
    }

    document.querySelectorAll(".chat-item").forEach(item => {
        item.addEventListener("click", function () {
            document.querySelectorAll(".chat-item").forEach(el => el.classList.remove("active"));
            this.classList.add("active");
            selectedChatId = this.getAttribute("data-chat-id");
            document.getElementById("message-input").disabled = false;
            loadMessages(selectedChatId);
        });
    });

    function loadMessages(chatId) {
        console.log("Đang tải tin nhắn cho chat:", chatId);
        axios.get(`/admin/chats/${chatId}`)
            .then(response => {
                console.log("Dữ liệu API trả về:", response.data);
                let messagesContainer = document.getElementById("messages-container");
                messagesContainer.innerHTML = "";

                response.data.messages.forEach(msg => {
                    let sender = getSenderName(msg);
                    displayMessage(sender, msg.message);
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
        if (msg.role_id === 1) {
            return "Admin";
        } else if (msg.role_id === 2) {
            if(msg.gender === 1){
            return `Anh ${msg.sender_name || "Không xác định"}`;
            }else{
                return `Chị ${msg.sender_name || "Không xác định"}`;
            }
        } else {
            return "Guest";
        }
    }

    function displayMessage(sender, message) {
        let messagesContainer = document.getElementById("messages-container");
        let msgDiv = document.createElement("div");
        msgDiv.innerHTML = `<strong>${sender}:</strong> ${message}`;
        messagesContainer.appendChild(msgDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    function sendMessage() {
        let messageInput = document.getElementById("message-input");
        let message = messageInput.value.trim();

        if (!message || !selectedChatId) return;

        axios.post(getSendMessageUrl(selectedChatId), { message: message }, {
            headers: { "X-CSRF-TOKEN": csrfToken }
        })
        .then(response => {
            if (response.data.success) {
                messageInput.value = "";
            } else {
                console.error("Lỗi gửi tin nhắn:", response.data);
                alert("Không thể gửi tin nhắn, thử lại!");
            }
        })
        .catch(error => {
            console.error("Lỗi kết nối:", error);
            alert("Lỗi kết nối đến server!");
        });
    }

    document.getElementById("send-message").addEventListener("click", sendMessage);
    
    document.getElementById("message-input").addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            sendMessage();
        }
    });

    document.querySelectorAll(".chat-item").forEach(item => {
        let chatId = item.getAttribute("data-chat-id");
        setupEcho(chatId);
    });
});
</script>


@endsection
