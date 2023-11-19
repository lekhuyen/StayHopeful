<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .navbar-language {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        #language-selector {
            font-size: 16px;
            padding: 8px;
            padding-right: 50px;
        }
    </style>
</head>

<body>
    <div class="navbar-language" style="margin-left: 50px;">
        <select id="language-selector" onchange="changeLanguage()">
            <option value="en">English</option>
            <option value="vi">Tiếng Việt</option>
        </select>
    </div>
    <span data-i18n="text1">Hello</span>
</body>
<script>
    var languageStrings = {
        "en": {
            "text1": "Hello"
        },
        "vi": {
            "text1": "xin chào"
        }
    }
    var currentLanguage = "en";

    function changeLanguage() {
        var select = document.getElementById("language-selector");
        currentLanguage = select.value;
        updateLanguage();
    }

    function updateLanguage() {
        var elements = document.querySelectorAll("[data-i18n]");
        for (var i = 0; i < elements.length; i++) {
            var key = elements[i].getAttribute("data-i18n");
            var value = languageStrings[currentLanguage][key];
            elements[i].innerHTML = value;
        }
    }

    // Initial language update
    updateLanguage();
</script>

</html>