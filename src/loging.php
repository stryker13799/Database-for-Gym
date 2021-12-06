<script type="text/javascript">
function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }

</script>



<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Logs</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
      crossorigin="anonymous"
    />
  </head>
  <body>
   
 <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div
            class="col-12 col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4"
          >
		  
            <h1 class="mb-3 text-center">Daily Log</h1>
		  <div class="alert alert-info small" role="alert"> You log your daily activity here</div>

            <p class="lead">
              <?php echo $_SESSION['name']; ?> 
            </p>
            <form class="mb-3" action="./loging.php" method="POST">
				
				
			  
			   <div class="form-group col-10">
                  <label for="Date">Date</label>
				  <input type="date" id="date" name="date">
                  </select>
                </div>
				
				 <div class="form-group">
                  <label for="carbs">Target Achieved:</label>
			<input type="range" name='achieved' value="24" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
			<output>24</output>
                </div>
				
				  <div class="form-group col-10">
                  <label for="Day" class ="sr-only">Day</label>
                  <select class="form-control" id="day" name ="day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                  </select>
                </div>
				

				
              <div class="row">
                <div class="form-group col-12 col-sm-4">
                  <label for="Fats">Fats:</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Fats"
                    id="fats"
                    name="fats"
                  />
                </div>
                <div class="form-group col-12 col-sm-4">
                  <label for="lastName">Proteins:</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Proteins"
                    id="proteins"
                    name ="proteins"
                  />
                </div>
				<div class="form-group col-12 col-sm-4">
                  <label for="carbs">Carbohydrates:</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Carbs"
                    id="carb"
                    name ="carb"
                  />
                </div>
				
				<div class="form-group col-12 col-sm-4">
                  <label for="musclesize">Muscle Size:</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Muscle Size"
                    id="musclesize"
                    name ="musclesize"
                  />
                </div>
				
				<div class="form-group col-12 col-sm-4">
                  <label for="weight">Weight:</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Muscle Size"
                    id="weight"
                    name ="weight"
                  />
                </div>
				
              </div>
			   
			  <button type="submit" class="btn btn-primary btn-block mb-1" name="B">
                Log
              </button>
            
            </form>
          </div>
        </div>
      </div>
    </div>
	
	<?php
	
	$db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-9DR3CSO)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = daniyal)
    )
  )";            
   $db_user = "system";   
   $db_pass = "dani1239";    
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "connected"; } 
   else 
      {  }
	
	
	
	
	
		
	if (isset($_POST["B"]))
	{
		$date=$_POST['date'];
		$musclesize=$_POST['musclesize'];
		$fats=$_POST['fats'];
		$proteins=$_POST['proteins'];
		$carb=$_POST['carb'];
		$login=$_SESSION['login'];
		$achieved=$_POST['achieved'];
		$weight=$_POST['weight'];
		$day=$_POST['day'];
		$date=date("d-m-Y", strtotime($date));
		//$date=strtotime($date);

		
	  $query1="Select date_time from daily_update where lOGIN_ID ='$login' AND date_time=to_date('$date','DD/MM/YY')";
	  $query1=oci_parse($con, $query1); 
	  $w1=oci_execute($query1);
	  $row1 = oci_fetch_array($query1, OCI_BOTH+OCI_RETURN_NULLS);	
	  
      $query2="Select height from member where lOGIN_ID ='$login'";
	  $query2=oci_parse($con, $query2); 
	  $w2=oci_execute($query2);
	  $row2 = oci_fetch_array($query2, OCI_BOTH+OCI_RETURN_NULLS);		  
	
	  $height=$row2[0];
	  $bmi=$weight/($height*$height);	
		 
		
		echo count($row1);
		if (count($row1)>1)
		{
		$query="UPDATE daily_update SET fats ='$fats',bmi='$bmi',day='$day',weight='$weight',achieved='$achieved',muscle_size='$musclesize',proteins = '$proteins', carbs = '$carb' WHERE login_id ='$login' AND date_time=to_date('$date','dd/mm/yy'";
			
		}
		else{
			$query="insert into daily_update values('$login','$day','$weight','$bmi','$musclesize',to_date('$date','DD/MM/YY'),'$achieved','$fats','$carb','$proteins')";
		}
		
		//$query="BEGIN workout('$login','$day','$fats','$proteins','$carb'); END;";
		
		  $query=oci_parse($con, $query); 
		  $w=oci_execute($query);
		  
		  $query3="UPDATE member SET bmi ='$bmi', weight='$weight' where lOGIN_ID ='$login'";
		  $query3=oci_parse($con, $query3); 
		  $w3=oci_execute($query3);
		  
		  $_SESSION['bmi']=$bmi;
		  $_SESSION['weight']=$weight;
		  //header("Location: temp.php", true, 301);
	
		}
		
	?>
		

		

		
	
	
	
 </body>
</html>

