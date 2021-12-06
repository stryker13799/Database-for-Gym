<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Plan</title>
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
            <h1 class="mb-3 text-center">Create a Plan</h1>
            <p class="lead">
              <?php echo $_SESSION['name']; ?> 
            </p>
            <form class="mb-3" action="./plan.php" method="POST">
				
				
			  
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
              </div>
			  
              
			 
              <button type="submit" class="btn btn-primary btn-block mb-3" name="B">
                Add Exercise
              </button>
              <div class="alert alert-info small" role="alert">
				You can add multiple exercises for each day
              </div>
              <div class="text-center">
                <p>...</p>
                <button class="btn btn-success" name="C">Submit</button>
              </div>
			  
			  
			  
			  
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
	
	
	
	
	
		
	if (isset($_POST["C"]))
	{
		$day=$_POST['day'];
		$fats=$_POST['fats'];
		$proteins=$_POST['proteins'];
		$carb=$_POST['carb'];
		$login=$_SESSION['login'];
	  $query1="Select day from workout_plan where lOGIN_ID ='$login' AND day ='$day'";
	  $query1=oci_parse($con, $query1); 
	  $w1=oci_execute($query1);
	  $row1 = oci_fetch_array($query1, OCI_BOTH+OCI_RETURN_NULLS);	
		
		echo count($row1);
		if (count($row1)>1)
		{
		$query="UPDATE workout_plan SET fats ='$fats',proteins = '$proteins', carbs = '$carb' WHERE login_id ='$login' AND day='$day'";
			
			
		}
		else{
			$query="insert into workout_plan
			values('$login','$day','$fats','$carb','$proteins')";
		}
		
		//$query="BEGIN workout('$login','$day','$fats','$proteins','$carb'); END;";
		
		  $query=oci_parse($con, $query); 
		  $w=oci_execute($query);
		  echo "Started";
		  //header("Location: temp.php", true, 301);
	
		}
		elseif (isset($_POST["B"]))
		{
			
			$day=$_POST['day'];
		$fats=$_POST['fats'];
		$proteins=$_POST['proteins'];
		$carb=$_POST['carb'];
		$login=$_SESSION['login'];
	  $query1="Select day from workout_plan where lOGIN_ID ='$login' AND day ='$day'";
	  $query1=oci_parse($con, $query1); 
	  $w1=oci_execute($query1);
	  $row1 = oci_fetch_array($query1, OCI_BOTH+OCI_RETURN_NULLS);	
		
		echo count($row1);
		if (count($row1)>1)
		{
		$query="UPDATE workout_plan SET fats ='$fats',proteins = '$proteins', carbs = '$carb' WHERE login_id ='$login' AND day='$day'";
			
			
		}
		else{
			$query="insert into workout_plan
			values('$login','$day','$fats','$carb','$proteins')";
		}
		
		//$query="BEGIN workout('$login','$day','$fats','$proteins','$carb'); END;";
		
		  $query=oci_parse($con, $query); 
		  $w=oci_execute($query);
		  echo "Started";
			
			
			$_SESSION['day']=$_POST['day'];
			header("Location: exercise.php", true, 301);
			
		}
		
		
	?>
		

		

		
	
	
	
 </body>
</html>

