<html>
    <head>
    <style>
  #chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    padding: top 150px;
  }

  #open-chatbot {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
  }

  #chatbot-frame {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
  }

  #chatbot-iframe {
    border: none;
    height: 502px;
    max-height: 502px;
    width: 300px; /* Adjust the width as needed */
  }
</style>
</head> 
 
 <body>
 <!-- Chatbot Button -->
 <div id="chatbot-button">
  <button id="open-chatbot">Chat with Us</button>
</div>

<!-- Chatbot Iframe -->
<div id="chatbot-frame">
 <iframe src="https://webchat.botframework.com/embed/student-bot?s=kaHvISwkEfE.PX69E6jLiJ7JuS29visa7-hEAXjhXJTVwgkpBIkAo8o" style="height: 400px; max-height: 400px;"></iframe>
</div>
	</div></body></html>