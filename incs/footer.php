</body>
<footer>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#register").click(function(){
                $("#login").css("background-color", "#ecf0f1");
                $("#login > span").css("color", "#333");
                $("#register").css("background-color", "#e74c3c");
                $("#register > span").css("color", "white");
                $("#l-f").toggle(500);
                $("#r-f").toggle(1000);
            })
            $("#login").click(function(){
                $("#register").css("background-color", "#ecf0f1");
                $("#register > span").css("color", "#333");
                $("#login").css("background-color", "#e74c3c");
                $("#login > span").css("color", "white");
                $("#l-f").toggle(1000);
                $("#r-f").toggle(500);
            })
        });
    </script>
</footer>
</html>
