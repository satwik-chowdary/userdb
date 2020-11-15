

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favi.webp">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    #backimg{
        background-image: url('res.jpg');
        width: 100%;
        height: 200vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: sticky;
    }
  
    #submsg{
        color:#4BB543 ;
        font-size:18px;
        font-weight:500;
    }


    
    </style>

    
</head>
<body>
    <div id="backimg">
        <div class="container text-center justify-content-center align-middle" style="padding-top: 40px;padding-bottom: 10px;" >
            <h3 style="color:white; font-weight: 900;font-size: 40px;">User Database Management</h3>
            <?php

if(isset($_POST['submit'])){
  $user=$_POST['user'];
$userName=$_POST['nameUser'];
$email=$_POST['email'];
$ID=$_POST['ID'];
$special=$_POST['special'];

$conn= mysqli_connect('remotemysql.com','a4YscOH6O1','DG2ZoOqe3f','a4YscOH6O1');

if($user == "student"){
    $years=$_POST['years'];
    $sem=$_POST['sem'];
    $sql_query="INSERT INTO `details` (`userType`,`userName`,`year_student`,`semester`,`email`,`dateTim`,`ID`,`special`)
    VALUES ('$user','$userName','$years','$sem','$email',current_timestamp(),'$ID','$special')";
    if($conn->query($sql_query)){
        echo "<i id=submsg>Your Data has been added sucessfully.</i>";
    }
    else{
        echo "fail" . $conn->error;
    }
}
else{
    $sql_query="INSERT INTO `details` (`userType`,`userName`,`year_student`,`semester`,`email`,`dateTim`,`ID`,`special`)
    VALUES ('$user','$userName','NULL','NULL','$email',current_timestamp(),'$ID','$special')";
    if($conn->query($sql_query)){
        echo "<i id=sucmsg>Your Data has been added sucessfully.</i>";
    }
    else{
        echo "fail" . $conn->error;
    }
}
}

?>

        <br>
        </div>
        <div class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
            <div class="text-center">
                <p>To edit or delete your details select these</p>
            </div>
            <div class="row justify-content-center" >
                
            <div>
                    <a href='show.php'><button class="btn btn-primary" style="margin: 15px;border-radius:10px;">Show Database</button></a>
                  </div>

                <div>
                    <a href='edit.php'><button class="btn btn-warning" style="margin: 15px;border-radius:10px;">Edit</button></a>
                  </div>
                                                  
                  <div>
                    <a href="delete.php"><button class="btn btn-danger" style="margin: 15px;border-radius:10px;">Delete</button></a>
                  </div>
                  <div>
                    <a href='import.php'><button class="btn btn-secondary" style="margin: 15px;border-radius:10px;">Import Data</button></a>
                  </div>
                         
            </div>
        </div>
        
        <div>
            <div id="main" class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
                <form class="form-horizontal" method="POST" action="index.php" >
                    <div class="form-group">
                        <label for="user" class="control-label col-sm-6" style="font-weight: 400;">Select type of User</label>
                        <select class="form-control col-sm-12" id="user" style="margin-left:10px ;" name="user" required>
                            <option value="">Select..</option>
                          <option value="super admin">Super Admin</option>
                          <option value="team head">Team Head</option>
                          <option value="admin">Admin</option>
                          <option value="student">Student</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year" class="control-label col-sm-6" style="font-weight: 400;">Year</label>
                        <select class="form-control col-sm-12" id="year" style="margin-left:10px ;" name="years" required>
                            <option value="">Select..</option>
                          <option value="1st">1st</option>
                          <option value="2nd">2nd</option>
                          <option value="3rd">3rd</option>
                          <option value="4th">4th</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sem" class="control-label col-sm-6" style="font-weight: 400;">Semester</label>
                        <select class="form-control col-sm-12" id="sem"  style="margin-left:10px ; " name="sem" required>
                            <option value="">Select..</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6" for="name" style="font-weight: 400;font-size: 16px;">Enter your Name:</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="name" placeholder="Enter name" name="nameUser" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-6" for="email" style=" font-weight: 400;font-size: 16px;" >Enter your email:</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-6" for="ID" style=" font-weight: 400;font-size: 16px;">Enter your University ID:</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="ID" placeholder="Enter university ID" name="ID" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="special" class="control-label col-sm-6" style="font-weight: 400;">Select specialisation</label>
                        <select class="form-control col-sm-12" name="special" id="special" style="margin-left:10px ;" required>
                          <option value="">Select..</option>  
                          <option value="cse">CSE</option>
                          <option value="it">IT</option>
                          <option value="me">ME</option>
                          <option value="ee">EE</option>
                        </select>
                    </div>
                                
                    <div class="form-group">        
                            <div class="col-sm-12" >
                              <input type="submit" name="submit" class="btn btn-success" style="width:100%; margin-top:30px;border-radius:15px;">
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