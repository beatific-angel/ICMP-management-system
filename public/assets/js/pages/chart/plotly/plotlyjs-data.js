jQuery(document).ready(function () {
  barChart();
  barChart2();
  stackedBarChart();
  watterfallBarChart();
  basicLine();
  basicPieChart();
  basicDonut();
  bubbleChart();
});

function barChart() {
  var data = [
    {
      x: [
        "jan",
        "feb",
        "mar",
        "apr",
        "may",
        "jun",
        "jul",
        "aug",
        "sep",
        "oct",
        "nov",
        "dec",
      ],
      y: [20, 14, 23, 28, 31, 25, 35, 28, 31, 25, 33, 27],
      marker: {
        color: [
          "rgba(204,204,204,1)",
          "rgba(222,45,38,0.8)",
          "rgba(204,204,204,1)",
          "rgba(222,45,38,0.8)",
          "rgba(204,204,204,1)",
          "rgba(204,204,204,1)",
          "rgba(222,45,38,0.8)",
          "rgba(204,204,204,1)",
          "rgba(204,204,204,1)",
          "rgba(222,45,38,0.8)",
          "rgba(204,204,204,1)",
          "rgba(204,204,204,1)",
        ],
      },
      type: "bar",
    },
  ];
  Plotly.newPlot("barchart", data);
}
function barChart2() {
  var trace1 = {
    x: ["2010", "2011", "2012", "2013", "2014", "2015"],
    y: [20, 14, 23, 18, 22, 28],
    name: "data 1",
    type: "bar",
  };

  var trace2 = {
    x: ["2010", "2011", "2012", "2013", "2014", "2015"],
    y: [12, 18, 29, 22, 24, 18],
    name: "data 2",
    type: "bar",
  };

  var data = [trace1, trace2];

  var layout = { barmode: "group" };

  Plotly.newPlot("barchart2", data, layout);
}
function stackedBarChart() {
  var trace1 = {
    x: ["2010", "2011", "2012", "2013", "2014", "2015"],
    y: [20, 14, 23, 18, 22, 28],
    name: "data 1",
    type: "bar",
  };

  var trace2 = {
    x: ["2010", "2011", "2012", "2013", "2014", "2015"],
    y: [12, 18, 29, 22, 24, 18],
    name: "data 2",
    type: "bar",
  };

  var data = [trace1, trace2];

  var layout = { barmode: "stack" };

  Plotly.newPlot("stackedbarchart", data, layout);
}
function watterfallBarChart() {
  var xData = [
    "Product<br>Revenue",
    "Services<br>Revenue",
    "Total<br>Revenue",
    "Fixed<br>Costs",
    "Variable<br>Costs",
    "Total<br>Costs",
    "Total",
  ];

  var yData = [400, 660, 660, 590, 400, 400, 340];

  var textList = [
    "$430K",
    "$260K",
    "$690K",
    "$-120K",
    "$-200K",
    "$-320K",
    "$370K",
  ];

  //Base

  var trace1 = {
    x: xData,
    y: [0, 430, 0, 570, 370, 370, 0],
    marker: {
      color: "rgba(1,1,1,0.0)",
    },
    type: "bar",
  };

  //Revenue

  var trace2 = {
    x: xData,
    y: [430, 260, 690, 0, 0, 0, 0],
    type: "bar",
    marker: {
      color: "rgba(55,128,191,0.7)",
      line: {
        color: "rgba(55,128,191,1.0)",
        width: 2,
      },
    },
  };

  //Cost

  var trace3 = {
    x: xData,
    y: [0, 0, 0, 120, 200, 320, 0],
    type: "bar",
    marker: {
      color: "rgba(219, 64, 82, 0.7)",
      line: {
        color: "rgba(219, 64, 82, 1.0)",
        width: 2,
      },
    },
  };

  //Profit

  var trace4 = {
    x: xData,
    y: [0, 0, 0, 0, 0, 0, 370],
    type: "bar",
    marker: {
      color: "rgba(50,171, 96, 0.7)",
      line: {
        color: "rgba(50,171,96,1.0)",
        width: 2,
      },
    },
  };

  var data = [trace1, trace2, trace3, trace4];

  var layout = {
    title: "Annual Profit 2015",
    barmode: "stack",
    paper_bgcolor: "rgba(245,246,249,1)",
    plot_bgcolor: "rgba(245,246,249,1)",
    showlegend: false,
    annotations: [],
  };

  for (var i = 0; i < 7; i++) {
    var result = {
      x: xData[i],
      y: yData[i],
      text: textList[i],
      font: {
        family: "Arial",
        size: 14,
        color: "rgba(245,246,249,1)",
      },
      showarrow: false,
    };
    layout.annotations.push(result);
  }

  Plotly.newPlot("watterfallBarChart", data, layout);
}
function basicLine() {
  var trace1 = {
    x: [1, 2, 3, 4],
    y: [10, 15, 13, 17],
    type: "scatter",
  };

  var trace2 = {
    x: [1, 2, 3, 4],
    y: [16, 5, 11, 9],
    type: "scatter",
  };

  var data = [trace1, trace2];

  Plotly.newPlot("basicLine", data);
}
function basicPieChart() {
  var data = [
    {
      values: [19, 26, 55],
      labels: ["Residential", "Non-Residential", "Utility"],
      type: "pie",
    },
  ];

  Plotly.newPlot("basicPieChart", data);
}
function basicDonut() {
  var data = [
    {
      values: [16, 15, 12, 6, 5, 4, 42],
      labels: [
        "US",
        "China",
        "European Union",
        "Russian Federation",
        "Brazil",
        "India",
        "Rest of World",
      ],
      domain: { column: 0 },
      name: "GHG Emissions",
      hoverinfo: "label+percent+name",
      hole: 0.4,
      type: "pie",
    },
    {
      values: [27, 11, 25, 8, 1, 3, 25],
      labels: [
        "US",
        "China",
        "European Union",
        "Russian Federation",
        "Brazil",
        "India",
        "Rest of World",
      ],
      text: "CO2",
      textposition: "inside",
      domain: { column: 1 },
      name: "CO2 Emissions",
      hoverinfo: "label+percent+name",
      hole: 0.4,
      type: "pie",
    },
  ];

  var layout = {
    title: "Global Emissions 1990-2011",
    annotations: [
      {
        font: {
          size: 20,
        },
        showarrow: false,
        text: "GHG",
        x: 0.17,
        y: 0.5,
      },
      {
        font: {
          size: 20,
        },
        showarrow: false,
        text: "CO2",
        x: 0.82,
        y: 0.5,
      },
    ],
    showlegend: false,
    grid: { rows: 1, columns: 2 },
  };

  Plotly.newPlot("basicDonut", data, layout);
}
function bubbleChart() {
  var trace1 = {
    x: [1, 2, 3, 4, 2, 4, 1, 3],
    y: [5, 17, 12, 20, 9, 11, 18, 5],
    text: ["A<br>size: 40", "B<br>size: 60", "C<br>size: 80", "D<br>size: 100"],
    mode: "markers",
    marker: {
      color: [
        "rgb(93, 164, 214)",
        "rgb(255, 144, 14)",
        "rgb(44, 160, 101)",
        "rgb(214, 165, 54)",
        "rgb(255, 65, 54)",
        "rgb(25, 185, 44)",
        "rgb(110, 268, 88)",
        "rgb(187, 257, 32)",
      ],
      size: [20, 40, 20, 30, 50, 10, 35, 40],
    },
  };

  var data = [trace1];

  Plotly.newPlot("bubbleChart", data);
}
