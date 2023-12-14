<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #myBackToTopBtn {
            display: none;
            position: fixed;
            bottom: 3px;
            right: 20px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background: linear-gradient(0deg, rgba(98,92,223,1) 4%, rgba(57,85,201,1) 55%, rgba(57,146,233,1) 93%);
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <button onclick="topFunction()" id="myBackToTopBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBackToTopBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>

</html>
