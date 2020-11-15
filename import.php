

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
            <h4 style="color:white; font-weight: 900;">Delete Details</h4>
            <?php
    require_once('simplexlxs.php');
    if(isset($_POST['import'])){
        
        
        $con= mysqli_connect('remotemysql.com','a4YscOH6O1','DG2ZoOqe3f','a4YscOH6O1');
        if($con){
        // echo "avcjan";
            
        $_xlsx = SimpleXLSX::parse($_FILES['import']['tmp_name']);
      
       
        foreach ($_xlsx->rows() as $key => $row ){
            // print_r($row);
            $q="";
            foreach($row as $key => $value){
                // print_r($value);
                // echo " <br>"
              
                
                    $q.="'".$value."'".", ";
                
                
            }
            $s=substr($q,0,strlen($q)-2);
            // INSERT INTO `details` (`userType`, `userName`, `year_student`, `semester`, `email`, `dateTim`, `ID`, `special`) 
            // VALUES ('student', 'satwik', '1st', '4th', 'abc@abc.com', '2020-11-14 18:51:12', '132456', 'cse');
            // INSERT INTO `details` (`userType`, `userName`, `year_student`, `semester`, `email`, `dateTim`, `ID`, `special`) 
            // VALUES ('errh', 'acsvfbg', 'arvet', 'asre', 'qewrge', 'qefrg', 'qe', 'qfe');
            // INSERT INTO `details` VALUES ('student', 'satwik', '1st', '4th', 'abc@abc.com', '2020-11-14 18:51:12', '132456', 'cse', );
            $sql="INSERT INTO "."`details` "."(`userType`, `userName`, `year_student`, `semester`, `email`, `dateTim`, `ID`, `special`)"." VALUES"." (".$s.");";
            // print_r($query);
            // echo "<br>";
            if($con->query($sql)){
                
            }
            else{
                echo "fail";
            }
        }
        echo "<i id=submsg>Your data is imported successfully</i>";

        }
    }

          ?>  

        <br>
        </div>
        <div class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
        
            <div class="row justify-content-center" >
            <div>
                    <a href='edit.php'><button class="btn btn-info" style="margin: 15px;border-radius:10px;">Enter new details</button></a>
                  </div>
                <div>
                    <a href='edit.php'><button class="btn btn-primary" style="margin: 15px;border-radius:10px;">Edit</button></a>
                  </div>
                  <div>
                    <a href='index.php'><button class="btn btn-danger" style="margin: 15px;border-radius:10px;">Delete</button></a>
                  </div>
            </div>
        </div>

        <div>
            <div id="main" class="container" style="background-color:white;box-shadow: 2px 2px 10px black; border-radius:25px;width: 90%; height: fit-content; padding: 30px; margin-bottom: 30px;">
            <form action="import.php" enctype="multipart/form-data" method="POST">
    <div class="custom-file mb-3">
      <input type="file" class="custom-file-input" id="import" name="import">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    
  
  
    <div class="col-sm-12" >
                <input type="submit" name="import" class="btn btn-success" style="width:100%; margin-top:30px;border-radius:15px;">
     </div>
  </form>
                
            </div>
        </div>
        
        

    </div>
    

<script>
            $('#import').on('change',function(){
                var fileName = $(this).val();
              
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>


</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="index.js"></script>

</html>

<!-- -->