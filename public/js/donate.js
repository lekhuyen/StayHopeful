$(document).ready(function() {
    $("#banktype").change(function() {
        var selectedMethod = $(this).val();
        banktype(selectedMethod);
    });
    $('#bankSelect').ddslick({
        width: "100%",
        imagePosition: "left",
        onSelected: function(selectedData) {
            // Set the value to the hidden input
            $('#selectedBank').val(selectedData.selectedData.value);
        }
    });
    $('#momoSelect').ddslick({
        width: "100%",
        imagePosition: "left",
        onSelected: function(selectedData) {
            // Set the value to the hidden input
            $('#selectedMomo').val(selectedData.selectedData.value);
        }
    });

    // Bạn có thể cũng thêm một sự kiện change cho dropdown để cập nhật giá trị khi người dùng thay đổi chọn
    $('#bankSelect').change(function() {
        var bankValue = $(this).val();
        $('#selectedBank').val(bankValue);
        console.log(bankValue);
    });

    $('#momoSelect').change(function() {
        var momoValue = $(this).val();
        $('#selectedMomo').val(momoValue);
        console.log(momoValue);

    });

    function banktype(selectedMethod) {
        console.log("Selected value: " + selectedMethod);
        if (selectedMethod === "Bank") {
            $('#bankDropdown').show();
            $('#momoDropdown').hide();
            $('#paypalButton').hide();
            $('#bankButton').show();
            $('#momoButton').hide();
            $('#paypalinput').hide();
            $('#vndinput').show();

        } else if (selectedMethod === 'Momo') {
            $('#bankDropdown').hide();
            $('#momoDropdown').show();
            $('#bankButton').hide();
            $('#paypalButton').hide();
            $('#momoButton').show();
            $('#paypalinput').hide();
            $('#vndinput').show();
        } else if (selectedMethod === 'Paypal') {
            $('#bankDropdown').hide();
            $('#momoDropdown').hide();
            $('#paypalButton').show();
            $('#bankButton').hide();
            $('#momoButton').hide();
            $('#paypalinput').show();
            $('#vndinput').hide();
        } else {
            $('#bankDropdown').hide();
            $('#momoDropdown').hide();
            $('#bankButton').show();
            $('#momoButton').hide();
            $('#paypalButton').hide();
            $('#paypalinput').hide();
            $('#vndinput').show();


        }
    }
});