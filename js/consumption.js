
var options = {
    chart: {
      height: 280,
      type: "area"
    },
    dataLabels: {
      enabled: false
    },
    series: [
      {
        name: "Cubic",
        data: [11, 9, 14, 13, 14, 12, 15]
      }
    ],
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.7,
        opacityTo: 0.9,
        stops: [0, 90, 100]
      }
    },
    xaxis: {
      categories: [
        "01 Jan",
        "02 Feb",
        "03 March",
        "04 April",
        "05 May",
        "06 June",
        "07 July",
        "08 June",
        "09 Aug",
        "10 Sep",
        "11 Oct",
        "12 Nov",
        "13 Dec",

      ]
    }
  };
  
  var chart = new ApexCharts(document.querySelector("#chart"), options);
  
  chart.render();