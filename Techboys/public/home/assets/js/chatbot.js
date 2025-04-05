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

        sendButton.prop('disabled', false);
    });

    $('#bot-chat-input').val('');
}