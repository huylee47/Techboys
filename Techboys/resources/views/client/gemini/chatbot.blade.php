<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat với Gemini</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/chat-bot.css" media="all" />
</head>
<body>
    <div id="bot-chat-icon" class="bot-real-time-icon">
        <img src="{{ url('') }}/admin/assets/images/config/{{ $config->favicon }}" alt="" width="50px">
    </div>

    <div id="bot-chat-modal" class="bot-real-time-box">
        <div class="bot-real-time-title">
            <span>Chat với Techboys AI</span>
            <span id="bot-close-chat" class="bot-real-time-close">&times;</span>
        </div>
        <div id="bot-chat-messages" class="bot-real-time-content">
        </div>
        <div class="bot-real-time-sent-content">
            <input type="text" id="bot-chat-input" placeholder="Nhập tin nhắn..." onkeydown="if(event.key === 'Enter') sendMessage()" />
            <button id="bot-send-message" onclick="sendMessage()">Gửi</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('#bot-chat-icon').click(function() {
            $('#bot-chat-modal').toggle();
            $(this).hide();
        });

        $('#bot-close-chat').click(function() {
            $('#bot-chat-modal').hide();
            $('#bot-chat-icon').show();
        });

        function sendMessage() {
            var prompt = $('#bot-chat-input').val();
            var chatMessages = $('#bot-chat-messages');
            var sendButton = $('#bot-send-message');

            if (prompt.trim() === '') return;

            sendButton.prop('disabled', true);

            chatMessages.append('<div class="bot-user-message">' + prompt + '</div>');

            $.post('/ask-gemini', { _token: '{{ csrf_token() }}', prompt: prompt }, function(data) {
                chatMessages.append('<div class="bot-bot-message">' + data.response + '</div>');
                chatMessages.scrollTop(chatMessages[0].scrollHeight);
                console.log(data.response);
                sendButton.prop('disabled', false);
            });

            $('#bot-chat-input').val('');
        }
    </script>
</body>
</html>
