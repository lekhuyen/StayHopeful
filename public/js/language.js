var languageStrings = {
    "en": {
        "text1": "Episode 576: Mother in hospital still takes care of her disabled son at homed",
        "text2": "Hospitalized for more than a month at the Viet Anh Infectious Diseases Department - Ho Chi Minh City Tropical Hospital due to Herpes Meningitis and type 2 diabetes, the first thing Ms. taking care of his paralyzed son at home."
    },
    "vi": {
        "text1": "Kỳ 576: Mẹ nằm viện vẫn lo cho con trai khuyết tật ở nhà.",
        "text2": "Nằm viện hơn 1 tháng nay tại Khoa nhiễm Việt Anh  - Bệnh viện Nhiệt đới TP.HCM do Viêm màng não Herpes và đái tháo đường type 2, điều đầu tiên cô G quan tâm sau khi ra khỏi phòng chăm sóc đặc biệt là ai đang chăm sóc người con trai bị liệt ở nhà."
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