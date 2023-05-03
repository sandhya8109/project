
<html>
<head>
<link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<style>
  .morris-hover {
  position:absolute;
  z-index:1000;
}

.morris-hover.morris-default-style {     border-radius:10px;
  padding:6px;
  color:#666;
  background:rgba(255, 255, 255, 0.8);
  border:solid 2px rgba(230, 230, 230, 0.8);
  font-family:sans-serif;
  font-size:12px;
  text-align:center;
}

.morris-hover.morris-default-style .morris-hover-row-label {
  font-weight:bold;
  margin:0.25em 0;
}

.morris-hover.morris-default-style .morris-hover-point {
  white-space:nowrap;
  margin:0.1em 0;
}

svg { width: 100%; }
  </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script>
    $(document).ready(function() {
  barChart();
  lineChart();
  areaChart();
  donutChart();

  $(window).resize(function() {
    window.barChart.redraw();
    window.lineChart.redraw();
    window.areaChart.redraw();
    window.donutChart.redraw();
  });
});

function barChart() {
  window.barChart = Morris.Bar({
    element: 'bar-chart',
    data: [
      { y: '2006', a: 100, b: 90 },
      { y: '2007', a: 75,  b: 65 },
      { y: '2008', a: 50,  b: 40 },
      { y: '2009', a: 75,  b: 65 },
      { y: '2010', a: 50,  b: 40 },
      { y: '2011', a: 75,  b: 65 },
      { y: '2012', a: 100, b: 90 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series A', 'Series B'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}

function lineChart() {
  window.lineChart = Morris.Line({
    element: 'line-chart',
    data: [
      { y: '2006', a: 100, b: 90 },
      { y: '2007', a: 75,  b: 65 },
      { y: '2008', a: 50,  b: 40 },
      { y: '2009', a: 75,  b: 65 },
      { y: '2010', a: 50,  b: 40 },
      { y: '2011', a: 75,  b: 65 },
      { y: '2012', a: 100, b: 90 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series A', 'Series B'],
    lineColors: ['#1e88e5','#ff3321'],
    lineWidth: '3px',
    resize: true,
    redraw: true
  });
}

function donutChart() {
  window.donutChart = Morris.Donut({
  element: 'donut-chart',
  data: [
    {label: "Total pad", value: 50},
    {label: "In-Store ", value: 25},
    {label: "Ordered pads", value: 5},
    {label: "upcoming", value: 10},
    {label: "Damaged", value: 10}
  ],
  resize: true,
  redraw: true
});
}

function pieChart() {
  var paper = Raphael("pie-chart");
paper.piechart(
  100, // pie center x coordinate
  100, // pie center y coordinate
  90,  // pie radius
   [18.373, 18.686, 2.867, 23.991, 9.592, 0.213], // values
   {
   legend: ["Windows/Windows Live", "Server/Tools", "Online Services", "Business", "Entertainment/Devices", "Unallocated/Other"]
   }
 );
}
  </script>
<meta charset=utf-8 />
<title>Morris.js Responsive Charts Example + Bootstrap</title>
</head>
<body>
  <section class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div id="bar-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="line-chart"></div>
      </div>
      
      
      
      <div class="col-md-4">
        <div id="donut-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="pie-chart"></div>
      </div>
    </div>
  </section>
</body>
</html>



