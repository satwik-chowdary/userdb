<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="data.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@400;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@1,600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    #backimg {
      background-image: url('res.jpg');
      width: 100%;
      height: 280vh;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      position: sticky;
    }

    #submsg {
      color: #F32013;
      font-size: 18px;
      font-weight: 500;
      font-family: 'Vollkorn', serif;
    }
  </style>


</head>

<body>
  <div id="backimg">
    <div class="container text-center justify-content-center align-middle" style="padding-top: 40px;padding-bottom: 10px;">
      <h3 style="color:white; font-weight: 900;font-size: 40px;font-family: 'Vollkorn', serif;">User Database Management</h3>
      <h4 style="color:white; font-weight: 900;font-family: 'Vollkorn', serif;font-size:24px;">Delete Details</h4>
      <i style="color:white; font-weight: 900;font-family:'Vollkorn', serif;font-size:24px;">Details deleted based on email ID</i>

      <?php
      $con = mysqli_connect('remotemysql.com', 'a4YscOH6O1', 'DG2ZoOqe3f', 'a4YscOH6O1');
      if (isset($_POST['delete'])) {
        $email = $_POST['email'];
        $sql = "DELETE FROM details WHERE email='$email'";
        if ($con->query($sql)) {
          echo "<br> 
      <i id=submsg >Your data has been deleted successfully</i>";
        } else {
          echo "failed" . $con->error;
        }
      }
      $con->close();
      ?>
      <br>
    </div>
    <div class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">

      <div class="row justify-content-center">

        <div>
          <a href='show.php'><button class="btn btn-primary" style="margin: 7px;border-radius:10px;font-family: 'Vollkorn', serif;">Show Database</button></a>
        </div>
        <div>
          <a href='import.php'><button class="btn btn-secondary" style="margin: 7px;border-radius:10px;font-family: 'Vollkorn', serif;">Import Data</button></a>
        </div>

        <div>
          <a href='index.php'><button class="btn btn-info" style="margin: 7px;border-radius:10px;font-family: 'Vollkorn', serif;">Enter New Details</button></a>
        </div>

        <div>
          <a href="edit.php"><button class="btn btn-warning" style="margin: 7px;border-radius:10px;font-family: 'Vollkorn', serif;">Edit</button></a>
        </div>


      </div>
    </div>

    <div>
      <div id="main" class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
        <form class="form-horizontal" method="POST" action="delete.php">


          <div class="form-group">
            <label class="control-label col-sm-6" for="email" style=" font-weight: 400;font-size: 16px;">Enter your email:</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <input type="submit" name="delete" class="btn btn-danger" style="width:100%; margin-top:30px;border-radius:15px;">
            </div>



          </div>

        </form>
      </div>
    </div>



  </div>



</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="index.js"></script>

</html>

<!-- -->
