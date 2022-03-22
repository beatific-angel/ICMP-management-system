$(function () {
  chart3();
});

function chart3() {
  var options = {
    series: [
      {
        data: [344, 345, 333, 323, 322, 342, 383, 353, 343, 376],
      },
    ],
    annotations: {
      points: [
        {
          x: 5,
          y: 322,
          label: {
            text: "Lowest: 322",
            offsetY: 2,
          },
          image: {
            path: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/512px-Flat_tick_icon.svg.png",
            width: undefined,
            height: undefined,
            offsetX: 0,
            offsetY: -18,
          },
        },
        {
          x: 7,
          y: 383,
          label: {
            text: "Highest: 383",
            offsetY: 2,
          },
        },
      ],
    },
    chart: {
      height: 340,
      type: "area",
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    xaxis: {
      labels: {
        style: {
          colors: "#9aa0ac",
        },
      },
    },
    yaxis: {
      labels: {
        style: {
          colors: "#9aa0ac",
        },
      },
    },
    tooltip: {
      theme: "dark",
      marker: {
        show: true,
      },
      x: {
        show: true,
      },
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
    },
  };

  var chart = new ApexCharts(document.querySelector("#schart1"), options);
  chart.render();
}

