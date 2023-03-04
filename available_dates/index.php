<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="fonts/icomoon/style.css">
  
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Available Dates</title>
  </head>
  <body>
  

  <div class="content">
    <div class="text-right mb-2">
      <a class="btn btn-success" href="../"> < Back to Home page</a>
    </div>
    <div id='calendar'></div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {


          var data = new FormData();
          data.append('1', 1);
          var xmlhttp = new XMLHttpRequest();
          var events = [];

          xmlhttp.onreadystatechange = function() {

          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
             if (xmlhttp.status == 200) {
                  
                var data = JSON.parse(xmlhttp.responseText.toString());

                 for (const key in data) {
                  if (data.hasOwnProperty(key)) {
                      
                    events.push({'start':data[key].start, 'title':'Available: '+(Number(data[key].title)-Number(data[key].occupied))});
        

                  }
                }

                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid' ],
                defaultDate: '2023-03-01',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: events
                });

                calendar.render();
          
             }
             else if (xmlhttp.status == 400) {
                alert('There was an error 400');
             }
             else {
                 alert('something else other than 200 was returned');
             }
          }
      };

      xmlhttp.open("POST", "../get_appointment.php", true);
      xmlhttp.send(data);

        

    });

    </script>


  </body>
</html>