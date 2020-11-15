


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
    #sucmsg{
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
        echo "<i id=sucmsg>Your Data has been added sucessfully.</i>";
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

?>

        <br>
        </div>
        <div class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
            <div class="text-center">
                <p>All the records</p>
            </div>
            <div class="row justify-content-center" >

            <div>
                    <a href='index.php'><button class="btn btn-info" style="margin: 15px;border-radius:10px;">Enter new details</button></a>
                  </div>
                <div>
                    <a href='edit.php'><button class="btn btn-primary" style="margin: 15px;border-radius:10px;">Edit</button></a>
                  </div>
                                                  
                  <div>
                    <a href="delete.php"><button class="btn btn-danger" style="margin: 15px;border-radius:10px;">Delete</button></a>
                  </div>
                  <div>
                    <a href='index.php'><button class="btn btn-secondary" style="margin: 15px;border-radius:10px;">Import Data</button></a>
                  </div>
                <div>
            </div>
        </div><div class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
        <div class="justify-content-center text-center">
        <div class="table-responsive table-hover">
        <?php 
 
 $conn= mysqli_connect('remotemysql.com','a4YscOH6O1','DG2ZoOqe3f','a4YscOH6O1'); 
 $query = "SELECT * FROM details";
 
 
 echo '<table class=table> 
        <thead>
       <tr> 
           <th> userType </th> 
           <th> userName </th> 
           <th> year_student </th> 
           <th> semester </th> 
           <th> email </th>
           <th> dateTime </th>
           <th> ID </th>
           <th> specialisation </th> 
       </tr>
       </thead>';
 
 if ($result = $conn->query($query)) {
     echo '<tbody>';
     while ($row = $result->fetch_assoc()) {
         echo '<tr> 
                   <td>'.$row["userType"].'</td> 
                   <td>'.$row["userName"].'</td> 
                   <td>'.$row["year_student"].'</td> 
                   <td>'.$row["semester"].'</td> 
                   <td>'.$row["email"].'</td>
                   <td>'.$row["dateTim"].'</td>
                   <td>'.$row["ID"].'</td>
                   <td>'.$row["special"].'</td> 
               </tr>';
     }
     echo '</tbody>';
     $result->free();
     echo '</table>';
 } 
 ?>    
    </div>
        </div>
        </div>
        
    </div>

    
    


</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</html>

<!-- -->