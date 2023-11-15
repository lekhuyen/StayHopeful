$(document).ready(function () {
    var amount;

    $('#usd').on('input', function () {
        amount = $(this).val();
        console.log(amount);
    });
   
    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                alert('Cảm ơn ' + details.payer.name.given_name + ' Siêu Báo đã quyên góp: ' + amount);
            });
        },
        style: {
            color: 'blue',
            shape: 'pill',
        }
    }).render('#paypal-button-container');
});