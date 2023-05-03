// Ovulation Predictor Calculator using Vue.js + Vue Datepicker + MomentJS + Bulma CSS

new Vue({
  el: '#app',
  components: {
  	vuejsDatepicker
  },
  data() {
    return {
      calcReturned: false,
      date: new Date(),
      cycleSelected: 28,
      fertileFrom: "",
      fertileUntil: "",
      dueDate: "",
      fullDate: "",
    };
  },
  methods: {
    startCalc: function() {
      this.calcReturned = true;
    },
    calcDate: function() {
      var day = parseInt(document.querySelector("span.day.selected").innerHTML);
      var month = document.querySelector("span.month.selected").innerHTML;
      var year = parseInt(document.querySelector("span.year.selected").innerHTML);

      var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ];
      
      months.forEach(function (value, i) {
      if (value === month && i <= 8 ) {
        i ++;
        month = "0" + i.toString();
      } else if (value === month && i >= 9 ) {
          i ++;
        month = i.toString();
      }
      });
      
      this.fullDate = year + "" + month + "" + day;
    },
    calculateFertileBegin: function() {
      this.calcDate();
      if ( this.cycleSelected === 28) {
        this.fertileFrom = moment(this.fullDate, 'YYYYMMDD').add(12, 'days').format('MMMM Do YYYY');
      } else {
          this.fertileFrom = moment(this.fullDate, 'YYYYMMDD').add(this.cycleSelected - 28 + 12, 'days').format('MMMM Do YYYY');  
      }
    },    
    calculateFertileEnds: function() {
      //this.calcDate(); is called from calculateFertileBegin
      if ( this.cycleSelected === 28) {
        this.fertileUntil = moment(this.fullDate, 'YYYYMMDD').add(16, 'days').format('MMMM Do YYYY');
      } else {
          this.fertileUntil = moment(this.fullDate, 'YYYYMMDD').add(this.cycleSelected - 28 + 16, 'days').format('MMMM Do YYYY');  
      }
    },
    calculateDueDate: function() {
      //this.calcDate(); is called from calculateFertileBegin
      if ( this.cycleSelected === 28) {
        this.dueDate = moment(this.fullDate, 'YYYYMMDD').add(280, 'days').format('MMMM Do YYYY');
      } else {
          this.dueDate = moment(this.fullDate, 'YYYYMMDD').add(this.cycleSelected - 28 + 280, 'days').format('MMMM Do YYYY');  
      }
    },
    resetCalc: function() {
      this.calcReturned = false;
      this.date = new Date();
      this.cycleSelected = 28;
      this.fertileFrom = "";
      this.fertileUntil = "";
      this.dueDate = "";
      this.fullDate = "";
    },
  },
});

