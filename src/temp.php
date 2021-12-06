<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome Page</title>
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
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div
            class="col-12 col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4"
          >
            <h1 class="mb-3 text-center">FIT ME</h1>
            <p class="lead">
              WELCOME  <?php echo $_SESSION["name"]; ?>
            </p>
            <form class="mb-3" action="./temp.php" method="POST">
			   <button type="submit" class="btn btn-primary btn-block mb-3" name="plan">
                Create a Plan
              </button>
			   <button type="submit" class="btn btn-primary btn-block mb-3" name="view_log">
                View log
              </button>
			   <button type="submit" class="btn btn-primary btn-block mb-3" name="log">
                Add log
              </button>
			    <button type="submit" class="btn btn-primary btn-block mb-3" name="Plan">
                View Plan
              </button>
			    <div class="text-center">
                <p>...</p>
                <button class="btn btn-success" name ='signout'>Sign Out</button>
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
 if (isset($_POST["plan"]))
 {
	
	 
	 header("Location: plan.php", true, 301);
	 
 }
 elseif (isset($_POST['log']))
 {
	 header("Location: loging.php", true, 301);
	 
 }
 elseif (isset($_POST['view_log']))
 {
	 	 header("Location: view_log.php", true, 301);
 }
 elseif (isset($_POST['signout']))
 {
	 $_SESSION['name']='';
	 $_SESSION['login']='';
	 $_SESSION['bmi']='';
	 $_SESSION['weight']='';
	 	 header("Location: login.php", true, 301);
 }
  elseif (isset($_POST['Plan']))
 {
	 	 header("Location: view_plan.php", true, 301);
 }
 
 
 ?>

 </body>
</html>

