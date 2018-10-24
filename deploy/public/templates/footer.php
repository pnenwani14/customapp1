<html>
<head>
<script type="text/javascript">
function init ( )
{
  timeDisplay = document.createTextNode ( "" );
  document.getElementById("clock").appendChild ( timeDisplay );
}

function updateVisit ()
{
  visitDisplay = document.createTextNode ( "" );
  document.getElementById("visits").appendChild(visitDisplay);

  var counter = Cookies.get('counter');
  if (counter==null){
  console.log(counter);
  	counter = 1;
  }else{
  	counter = Number(counter) + 1;
  }
  Cookies.set('counter', counter);
  document.getElementById("visits").firstChild.nodeValue = counter;
}

function updateClock ()
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Choose either "AM" or "PM" as appropriate
  var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

  // Convert the hours component to 12-hour format if needed
  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}
</script>
</head>
<body  onload="updateVisit(); updateClock(); setInterval('updateClock()', 1000 )">
    <!-- Fixed navbar -->
    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <hr/>
      <div class="footer">
        <p>Visits:&nbsp;<span id="visits">&nbsp;</span>,&nbsp;&nbsp;<span id="clock">&nbsp;</span></p>
      </div>
    </div> <!-- /container -->
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.1/js.cookie.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>