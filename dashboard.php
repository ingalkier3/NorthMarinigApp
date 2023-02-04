<style>
	
 .w3-panel  {
  height: 100px;
  margin-left: 10px;
}

.canvas {
	width:100%;max-width:600px;  display: block;
    margin: 0 auto;
}

</style>

<script src="chart/Chart.min.js"></script>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard </b></h5>
  </header>

  	<div style="padding: 15px;">


  	 	<div class="w3-row">
		  <div class="w3-col m3 l3">
		   <div class="w3-panel w3-blue w3-card-4">
			  <p>Total Booking:</p>
			  <h3 id="panel_total_booking">100</h3>
			</div> 
		  </div>

		   <div class="w3-col m3 l3">
		   <div class="w3-panel w3-orange w3-card-4">
			  <p>Pending Booking:</p>
			  <h3  id="panel_pending_booking">100</h3>
			</div> 
		  </div>

		  <div class="w3-col m3 l3">
		   <div class="w3-panel w3-green w3-card-4">
			  <p>Approved Booking:</p>
			  <h3 id="panel_approved_booking" >100</h3>
			</div> 
		  </div>

		   <div class="w3-col m3 l3">
		   <div class="w3-panel w3-red w3-card-4">
			  <p>Disapproved Booking:</p>
			  <h3 id="panel_disapproved_booking">100</h3>
			</div> 
		  </div>

		</div>

		<div >
			
				<canvas id="myChart" class="canvas"></canvas>
		</div>

	

  </div>

 

  <!-- End page content -->
</div>



<script type="text/javascript">
		
	var element = document.getElementById("a_dashboard");
  	element.classList.add("w3-blue");


  	getData();


  	function getData(){

  		var data = new FormData();
	    data.append('a', '1');

	    var xmlhttp = new XMLHttpRequest();

	      xmlhttp.onreadystatechange = function() {

	          if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
	             if (xmlhttp.status == 200) {
	                 
	                viewDashboard(xmlhttp.responseText);
	              
	             }
	             else if (xmlhttp.status == 400) {
	                alert('There was an error 400');
	             }
	             else {
	                 alert('something else other than 200 was returned');
	             }
	          }

	      };

	  	xmlhttp.open("POST", "get_dashboard_data.php", true);
      	xmlhttp.send(data);

  	}

  



	function viewDashboard(valuesNo){

		arr_data = valuesNo.split(",");
	 	var xValues = ["Total Booking", "Pending Booking", "Approved Booking", "Disapproved Booking"];
		var yValues = arr_data;
		var barColors = ["blue", "orange","green","red"];

		new Chart("myChart", {
		  type: "bar",
		  data: {
		    labels: xValues,
		    datasets: [{
		      backgroundColor: barColors,
		      data: yValues
		    }]
		  },
		  options: {
		    legend: {display: false},
		    title: {
		      display: true,
		      text: "Booking Graph"
		    }
		  }
		});

		document.getElementById("panel_total_booking").innerHTML = arr_data[0];
		document.getElementById("panel_pending_booking").innerHTML = arr_data[1];
		document.getElementById("panel_approved_booking").innerHTML = arr_data[2];
		document.getElementById("panel_disapproved_booking").innerHTML = arr_data[3];	  
		  
		  
		

	}

 

</script>