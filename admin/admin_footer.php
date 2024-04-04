<footer class="fixed bottom-0 w-full bg-gray-800 text-white py-2">
    <div class="container mx-auto text-center">
        <strong class="block">Copyright © DiscHub - SMIT <script>document.write(new Date().getFullYear());</script></strong>
        <p>Devloped by Chandan & Team</p>
    </div>
</footer>

<button id="goToTopBtn" class="fixed bottom-10 right-10 bg-gray-800 text-white p-2 rounded-full cursor-pointer hidden">
    <i class="fa fa-arrow-up"></i>
</button>

<script>
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("goToTopBtn").style.display = "block";
        } else {
            document.getElementById("goToTopBtn").style.display = "none";
        }
    }

    document.getElementById("goToTopBtn").addEventListener("click", function () {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    });
</script>
