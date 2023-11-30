document.addEventListener("DOMContentLoaded", function () {
    const sliderElement = document.getElementById("my-keen-slider");
    let keenSlider = new KeenSlider(sliderElement, {
        loop: true,
        vertical: true,
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
                            <span style="color: #27AE60;">${user.amount} USD</span>
                        </span>
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
            vertical: true,
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
    setInterval(fetchData,60000);

    setInterval(() => {
        keenSlider.next();
    },3000);
});
