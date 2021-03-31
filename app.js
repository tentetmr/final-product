$(document).ready(function () {
  $('#records-limit').change(function () {
      $('form').submit();
  })
});

var ctx = $("#myChart");
var Bar = new Chart(ctx, {
  type: "bar",
  data: {
    // PHPから持ってきたい
    labels: js_array,
    datasets: [
      {
        label: "学習時間",
        borderWidth: 1,
        backgroundColor: "rgb(80, 192, 142, 0.4)",
        borderColor: "rgb(80, 192, 142)",
        // PHPから持ってきたい
        data: js_arraytime,
      },
    ],
  },
  options: {
    scales: {
      xAxes: [
        {
          // stacked: true,
        },
      ],
      yAxes: [
        {
          // stacked: true,
          ticks: {
            min: 0
          }
        },
      ],
    },
  },
});
