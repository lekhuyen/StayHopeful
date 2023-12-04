$(document).ready(function () {
    // Function to update totalAmount
    function updateTotalAmount(data) {
        var totalAmount = data.totalAmount;
        $('#odometer').text(totalAmount); 
    }


    function GetData() {
        $.ajax({
            url: '/admin/totaldonate', 
            type: 'GET',
            success: function (data) {
                updateTotalAmount(data);
            },
            error: function (error) {
                console.error('Error get data:', error);
            }
        });
    }

    setInterval(function () {
        GetData();
    }, 30000); 

    GetData();
});