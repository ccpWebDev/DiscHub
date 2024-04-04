<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | DiscHub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<style>
    .aichat{
        background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
color: white;
padding: 5px 15px;
border-radius: 10px;
    }
</style>
<body>

<div class="flex justify-end fixed bottom-0 right-0 p-4">
    <button id="toggleChat" class="aichat bg-gradient-to-r from-blue-600 to-pink-600 text-white font-bold px-4 py-2 rounded-lg">
        Chat With AI
    </button>
</div>

<div id="chatContainer" class="hidden fixed bottom-0 right-0 bg-white p-4 border border-gray-300 rounded-lg shadow-lg w-150 mb-20 mr-20 z-10">
   <iframe src="https://copilot.microsoft.com/" frameborder="0" height="600px" width="500px" ></iframe>
</div>


<script>
    $(document).ready(function() {
        $("#toggleChat").click(function() {
            $("#chatContainer").toggleClass("hidden");
    });
});</script
</script>

</body>
</html>
