document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("my-keen-slider");
    const keenSlider = new KeenSlider(slider, {
        loop: true, // Enable looping
        vertical: true
      });

    setInterval(() => {
      keenSlider.next();
    }, 3000);
  });