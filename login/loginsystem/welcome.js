
var calendars = {
    first: null,
    second: null,
    third: null
};

const periodTracker = function () {
    return { 
		lastPeriod: new Date().toDateString(),
		periodLength: false,
		cycleLength: false,
        showCalendar: false,
        calendarsRendered: false,
        startDate: null,
        /* calendars: {
            first: null,
            second: null,
            third: null
        }, */

        calculateCalendars() {
                this.startDate = new Date(this.lastPeriod.replace(/-/g, '\/'));
                

                if(!this.calendarsRendered) {
    
                    try {
                        
                        this.renderCalendars();

                    } catch(e) {
                        console.log(`calculateCalendars() error: ${e}`);
                    }
    
                } else {
                    console.log(`refresher startDate: ${this.startDate}, lastPeriod: ${this.lastPeriod}, formatShift: ${this.lastPeriod.replace(/-/g, '\/')}`);
                  
                    // updateCalendars();
                    console.log(typeof this.startDate);
                    console.log(this.startDate);

                    console.log(calendars.first.refresh(this.startDate));

                    // this.renderCalendars();
                    
                    // this.renderCalendars();
                    // this.calendars.first.next();
                    // this.refreshCalendars();
                }
        },

        refreshCalendars() {
            // console.log(calendars.first.refresh());
        },

        renderCalendars() {
            console.log(`renderCalendars(): ${this.startDate}`);

            var pre_period = this.calculatePrePeriod(this.startDate);
            var length_period = this.calculatePeriodLength(this.startDate, this.periodLength);

            // console.log(this.periodLength);

            calendars.first = new jsCalendar('.three-calendars', this.startDate, {
                navigator: false
            });

            calendars.first.colorfulSelect(pre_period, 'period-tracker-prePeriod');
            calendars.first.colorfulSelect(length_period, 'period-tracker-periodLength');


            this.calendarsRendered = true;

            this.showCalendars();
        },

        calculatePrePeriod(startingDate) {
            var pre_start = new Date(startingDate);
            pre_start.setDate(pre_start.getDate() - 2);

            var pre_end   = new Date(startingDate);
            pre_end.setDate(pre_end.getDate() - 1);

            // console.log(`pre_start: ${pre_start}, pre_end: ${pre_end}`);
            // preperiod.setDate(tomorrow.getDate() - 2);
            return this.createDateArray(pre_start, pre_end);
        },

        calculatePeriodLength(startingDate, length) {
            var period_length_start = new Date(startingDate);
            var period_length_end   = new Date(period_length_start.getFullYear(),period_length_start.getMonth(),period_length_start.getDate() + parseInt(length));

            // console.log(period_length_start.getFullYear(),period_length_start.getMonth(),period_length_start.getDate() + parseInt(length));
            // period_length_end.setDate(period_length_end.getDate() + parseInt(length));
            // period_length_end.addDays(length);

            console.log(`period_length_start: ${period_length_start}, period_length_end: ${period_length_end}`);
            return this.createDateArray(period_length_start, period_length_end);
        },

        createDateArray(start, end) {
            var arr = new Array(), dt = new Date(start);
        
            while (dt <= end) {
                arr.push(new Date(dt));
                dt.setDate(dt.getDate() + 1);
            }
        
            return arr;
        },

        showCalendars() {
            this.showCalendar = true;
        },

        printCalendars() {
            var prtContent = document.getElementById("print");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(document.querySelector('head').innerHTML + prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
        },

        testPdf() {
            /* var periodCal = new jsPDF({
                orientation: "p",
                unit: 'px',
                hotfixes: ["px_scaling"]
            });

            var test = document.querySelector('#print');

            console.log(test);

            var snapshot = html2canvas(test, {
                ignoreElements: function( element ) {
    
                    if( element.id == 'wpadminbar' ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'FibroidHeader' ) ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'period-tracker-header' ) ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'period-tracker-form-main' ) ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'Newsletter' ) ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'FibroidFooter' ) ) {
                        return true;
                    }
                    
                    // Remove all elements with class="MyClassNameHere"
                    if( element.classList.contains( 'PeriodCalendar-buttons' ) ) {
                        return true;
                    }
                }
            }).then(canvas => {
                console.log(canvas);
                document.body.appendChild(canvas);
                periodCal.addImage(canvas, 0, 0, canvas.scrollWidth, canvas.scrollHeight);
                periodCal.save('test.pdf');
            }); */
        }
	}
}

window.periodTracker = periodTracker;


$(document).ready(function () {
    // Colorful Select
    jsCalendar.prototype.colorfulSelect = function(dates, color){
        // If no arguments
        if (typeof dates === 'undefined') {
            // Return
            return this;
        }

        // If dates not array
        if (!(dates instanceof Array)) {
            // Lets make it an array
            dates = [dates];
        }

        // Save colors
        this._colorful_saveDates(dates, color);
        // Select dates
        this._selectDates(dates);

        if (!this._colorful_patched) {
            this._colorful_patched = this.refresh;
            this.refresh = function(date) {
                // Call original refresh
                this._colorful_patched(date);
                // Refresh select Colors
                this._colorful_update();
                // Return
                return this;
            };
        }
        // Refresh
        this.refresh();

        // Return
        return this;
    };

    // Save dates colors
    jsCalendar.prototype._colorful_saveDates = function(dates, color) {
        // Copy array instance
        dates = dates.slice();

        // Parse dates
        for (var i = 0; i < dates.length; i++) {
            dates[i] = jsCalendar.tools.parseDate(dates[i]);
            dates[i].setHours(0, 0, 0, 0);
            dates[i] = dates[i].getTime();
        }

        if (typeof this._colorful_colors == "undefined") {
            this._colorful_colors = {};
        }

        // Save each date color
        for (i = dates.length - 1; i >= 0; i--) {
            this._colorful_colors[dates[i]] = color;
        }
    };

    // Refresh colors
    jsCalendar.prototype._colorful_update = function() {
        // Get month info
        var month = this._getVisibleMonth(this._date);

        // Check days
        var timestamp;
        for (var i = month.days.length - 1; i >= 0; i--) {
            // If date is selected
            timestamp = month.days[i].getTime();
            if (this._selected.indexOf(timestamp) >= 0 && this._colorful_colors.hasOwnProperty(timestamp)) {
                this._elements.bodyCols[i].className = 'jsCalendar-selected' + ' ' + this._colorful_colors[timestamp];
            }
        }
    }

});


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

function areaChart() {
  window.areaChart = Morris.Area({
    element: 'area-chart',
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
    {label: "Download Sales", value: 50},
    {label: "In-Store Sales", value: 25},
    {label: "Mail-Order Sales", value: 5},
    {label: "Uploaded Sales", value: 10},
    {label: "Video Sales", value: 10}
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