<?php 
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Remote Control</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="remote-control">
        <div class="remote-header">
            <div class="remote-brand">Sony TV Remote</div>
            <div class="battery-status" id="battery">100%</div>
        </div>
        
        <div class="remote-output" id="output">
            <!-- Messages appear here -->
        </div>

        <div class="button-grid">
            <button onclick="sendCommand('turnOn')">Power ON</button>
            <button onclick="sendCommand('turnOff')">Power OFF</button>
            <button onclick="sendCommand('changeBattery')">Replace Battery</button>
            
            <button onclick="sendCommand('pressButton', 'VolumeUp')">Vol +</button>
            <button onclick="sendCommand('pressButton', 'VolumeDown')">Vol -</button>
            <button onclick="sendCommand('pressButton', 'ChannelUp')">Ch +</button>
            <button onclick="sendCommand('pressButton', 'ChannelDown')">Ch -</button>
            <button onclick="sendCommand('pressButton', 'Mute')">Mute</button>
            
            <button onclick="sendCommand('checkBattery')">Battery</button>
        </div>
    </div>

    <script>
        function sendCommand(action, button = null) {
            const formData = new FormData();
            formData.append('action', action);
            if (button) formData.append('button', button);

            fetch('server.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const output = document.getElementById('output');
                output.innerHTML += `<div class="command-result">${data.output}</div>`;
                output.scrollTop = output.scrollHeight;
                
                document.getElementById('battery').textContent = data.battery;
            });
        }
    </script>
   
</body>
</html>