
document.addEventListener("DOMContentLoaded", function () {
    const sliderElement = document.getElementById("my-keen-slider");
    let keenSlider = new KeenSlider(sliderElement, {
        loop: true,
        vertical: false,
    });

    function updateSlider(data) {
        sliderElement.innerHTML = '';
        data.userinfoCollection.forEach(function (user) {
            var slideHtml = `
                <div class="keen-slider__slide transaction-info">
                    <div class="img-donate">
                        <img src="${user.imageURL}" alt="User Image">
                    </div>
                    <div class="text-name-donate">
                        <span>${user.name}</span>
                        <span class="text-info">Just Donated 
                        </span>
                        <div style="color:#27AE60; font-weight: 800; margin-left: 10px;">${user.amount} USD</div>
                    </div>
                    <div class="donate-time">
                        <span>${user.formattedTime}</span>
                    </div>
                </div>
            `;

            sliderElement.innerHTML += slideHtml;
        });
        keenSlider = new KeenSlider(sliderElement, {
            loop: true,
            vertical: false,
        });
    }

    function fetchData() {
        $.ajax({
            url: "/admin/getuserdonate",
            type: "GET",
            success: function (data) {
                updateSlider(data);
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
    fetchData();
    setInterval(fetchData, 60000);

    setInterval(() => {
        keenSlider.next();
    }, 3000);
});
