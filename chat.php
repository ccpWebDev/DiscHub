<?php
// Start the WebSocket server
$server = new WebSocketServer("0.0.0.0", 8080);

// Handle incoming WebSocket connections
$server->on('open', function($connection) {
    // Connection opened
});

// Handle incoming WebSocket messages
$server->on('message', function($connection, $data) use ($server) {
    // Broadcast the received message to all connected clients
    foreach ($server->getConnections() as $client) {
        $client->send($data);
    }
});

// Handle WebSocket connection close
$server->on('close', function($connection) {
    // Connection closed
});

// Start the WebSocket server
$server->run();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Chat</title>
</head>
<body>
    <div id="chatMessages"></div>
    <input type="text" id="messageInput" placeholder="Type your message...">
    <button id="sendMessageBtn">Send</button>

    <script>
        const ws = new WebSocket("ws://localhost:8080");

        ws.onmessage = function(event) {
            const message = event.data;
            const chatMessages = document.getElementById("chatMessages");
            const messageElement = document.createElement("div");
            messageElement.textContent = message;
            chatMessages.appendChild(messageElement);
        };

        document.getElementById("sendMessageBtn").addEventListener("click", function() {
            const messageInput = document.getElementById("messageInput");
            const message = messageInput.value;
            ws.send(message);
            messageInput.value = "";
        });
    </script>
</body>
</html>
