$(document).ready(function () {
  var config = {
    type: "line",
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Math",
          data: [10, 25, 11, 32, 20, 28, 22],
          backgroundColor: "#A3A3FE",
          borderColor: "#A3A3FE",
          fill: false,
          borderDash: [5, 5],
          pointRadius: 4,
          pointHoverRadius: 5,
        },
        {
          label: "Science",
          data: [8, 38, 21, 40, 25, 34, 22],
          backgroundColor: "#A5A5A5",
          borderColor: "#A5A5A5",
          fill: false,
          pointRadius: 4,
          pointHoverRadius: 5,
        },
        {
          label: "Geography",
          data: [12, 33, 24, 36, 21, 38, 22],
          backgroundColor: "#ED7D31",
          borderColor: "#ED7D31",
          fill: false,
          pointRadius: 4,
          pointHoverRadius: 5,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: "bottom",
      },
      hover: {
        mode: "index",
      },
      scales: {
        x: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: "Month",
          },
          ticks: {
            color: "#9aa0ac",
          },
        },
        y: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: "Value",
          },
          ticks: {
            color: "#9aa0ac",
          },
        },
      },
      title: {
        display: false,
      },
    },
  };

  window.onload = function () {
    var ctx = document.getElementById("bar-chart").getContext("2d");
    ctx.height = 100;
    window.myLine = new Chart(ctx, config);
  };
});
