
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Ovulation Predictor Calculator - Vue.js</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css'><link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
       
       <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" rel="stylesheet"/>  
       <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>

        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
  <section class="hero is-primary has-text-centered">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-1">Ovulation Predictor Calculator</h1>
    </div>
  </div>
  </section>
  
  <section id="app" class="section content has-text-centered">
    
<transition name="fade" mode="out-in">
    <div class="content columns level is-centered
" v-if="!calcReturned" key="calendar">

      <div class="column is-one-third level has-text-centered ">
        <p class="subtitle">Please select the first day of your last menstrual period:</p>
        <vuejs-datepicker :inline="true" v-model="date">{{ date }}</vuejs-datepicker>
      </div>

      <div class="column is-one-third has-text-centered level">
        <p>Usual number of days in your cycle:</p>
        <div class="select is-primary">
          <select name="days" v-model="cycleSelected">
            <option v-for="n in 45" v-if="n >= 20">{{ n }}</option>
          </select>
        </div>

        <div class="level-item">
          <button class="button is-large is-primary is-rounded " id="calculate-btn" @click="startCalc(); calculateFertileBegin(); calculateFertileEnds(); calculateDueDate();">Calculate</button>
        </div>
      </div>
    </div>

    <div class="content has-text-centered" v-else key="result">

      <p class="subtitle">Here are the results based on the information you provided:</p>
      <p>Your next most fertile period is <strong>{{ fertileFrom }}</strong> to <strong>{{ fertileUntil }}</strong>.</p>
      <p>If you conceive within this timeframe, your estimated due date will be <strong>{{ dueDate }}</strong>.</p>
      <div class="level-item">
        <button class="button is-large is-primary is-rounded" id="resetCalc" @click="resetCalc">Calculate Again</button>
      </div>

    </div>
</transition>
    
    <div class="notification is-full">*Average length will vary by woman. **A woman's best days to conceive can start at least one day prior and last at least one day after fertile date.
    </div>

  </section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js'></script>
<script src='https://unpkg.com/vuejs-datepicker'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script><script  src="./script.js"></script>
</html>
