<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Exercise</title>
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
            <h1 class="mb-3 text-center">Add Exercise</h1>
            <p class="lead">
             Set up Exercise Plan
            </p>
            <form class="mb-3" action="./exercise.php" method="POST">
             <div class="form-group col-10">
                  <label for="Exercise" >Exercise</label>
                  <select class="form-control" id="exercise" name ="exercise" placeholder="exercise">
                    <option value="squats">Squats</option>
                    <option value="deadlift">deadlift</option>
                    <option value="legpress">Leg Press</option>
                    <option value="dumbellrows">dumbel rows</option>
                    <option value="running">Running</option>
                    <option value="chestlift">chest lift</option>
                    <option value="shoulderpress">Shoulder Press</option>
					<option value="crunches">chrunches</option>
                  </select>
                </div>
				
				  <div class="form-group col-10">
                  <label for="musclegroup" >Muscle Group </label>
                  <select class="form-control" id="musclegroup" name ="musclegroup">
                    <option value="chestmuscle">Chest muscle</option>
                    <option value="legmuscle">leg muscle</option>
                    <option value="triceps">Triceps</option>
                    <option value="biceps">Biceps</option>
                    <option value="thighs">Thighs</option>
                    <option value="shouldermuscle">Shoulder Muscle</option
					<option value="abs">Abs</option>
                  </select>
                </div>
				
			 <div class="form-group col-10">
                  <label for="Equipment" >Equipment </label>
                  <select class="form-control" id="equipment" name ="equipment">
                    <option value="dumbells">Dumbells</option>
                    <option value="tredmill">Tredmill</option>
                    <option value="butterfly">Butterfly</option>
                    <option value="eliptical">Eliptical</option>
                    <option value="cycle">cycle</option>
                    <option value="leg press">leg press</option>
                    <option value="None">None</option>
                  </select>
                </div>
				
              <div class="form-group">
                <label for="time">Duration:</label>
                <input
                  type="number"
                  class="form-control"
                  id="time"
                  name="time"
				  placeholder="mins"
                  
                />
              </div>
	
              <button type="submit" class="btn btn-primary btn-block mb-3" name="B">
				Add
              </button>
			  </button>
			   
			
			  
            </form>
			
			<form action='temp.php'> 
	 <div class="text-center">
                <p>...</p>
                <button class="btn btn-success" name ='back'>Back</button>
              </div>
	</form>
			
			
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>



	<?php
	
	
	
	
	$db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-9DR3CSO)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = daniyal)
    )
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "system";   // Oracle username e.g "scott"
   $db_pass = "dani1239";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      {  } 
   else 
      { die('Could not connect to Oracle: '); } 
  
  
  
  
	
	if (isset($_POST["B"]))
	{
		
		$exercise=$_POST['exercise'];
		$musclegroup=$_POST['musclegroup'];
		$equipment=$_POST['equipment'];
		$login=$_SESSION['login'];
		$day=$_SESSION['day'];
		$time=$_POST['time'];
	
		
       $query1="Select day from exercise_plan where lOGIN_ID ='$login' AND day ='$day'";
	  $query1=oci_parse($con, $query1); 
	  $w1=oci_execute($query1);
	  $row1 = oci_fetch_array($query1, OCI_BOTH+OCI_RETURN_NULLS);	
		
		if (count($row1)>1)
		{
		$query="UPDATE exercise_plan SET ex_name ='$exercise',workout_time = '$time', muscle_name = '$musclegroup', equip_name='$equipment' WHERE login_id ='$login' AND day='$day'";
			
			
		}
		else{
			
			$query="insert into exercise_plan
			values('$login','$day','$time','$musclegroup','$exercise','$equipment')";
		}
		
		//$query="BEGIN workout('$login','$day','$fats','$proteins','$carb'); END;";
		
		  $query=oci_parse($con, $query); 
		  $w=oci_execute($query);
		  echo "Started";
		  //header("Location: temp.php", true, 301);
	
		}
		
		
	?>

 </body>
</html>

