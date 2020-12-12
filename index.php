<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>contact details</title>
  </head>
  <body>
  <div class="container">
    <h1 style="padding-left:340px;">Contact Details</h1>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <div class="container">
     <div class="row">
      <div class="col">
      <div class="card border-info mb-3" style="max-width: 18rem;">
      <div style="padding-left:35px">
      <p class="fs-3">Add Member</p>
      </div>
        <form style="padding-left:40px" method="post">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="mobile">mobile number:</label><br>
            <input type="text" id="mobile" name="mobile"><br>
            <label for="email"> email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="relation">relation:</label><br>
            <input type="text" id="relation" name="relation"><br>
            <label for="notes"> notes:</label><br>
            <textarea name="message" rows="3" cols="22"></textarea><br><br>
            <button style="margin-bottom:20px" type="submit" class="btn btn-primary">Add</button>
        </form>
        </div>
      </div>
      <div class="col">
      <?php 
      //author:aurkid saha
    //connect to the database

          $servername="localhost";
          $username="root";
          $password="";
          $database="phonebook";
          $con=mysqli_connect($servername,$username,$password,$database);
          if(!$con){
            echo"your connection is failed".mysqli_connect_erroe();
          }
    //insert data into the database

          if($_SERVER['REQUEST_METHOD']=='POST'){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $mnumber=$_POST['mobile'];
            $email=$_POST['email'];
            $relation=$_POST['relation'];
            $note=$_POST['message'];
          $sql="INSERT INTO `mytable` (`slno`, `fname`, `lname`, `mnumber`, `email`, `relation`, `notes`) VALUES (NULL, '$fname', '$lname', '$mnumber', '$email', '$relation','$note')";
          $result=mysqli_query($con,$sql);
          if(!$result){
            echo"not succesfully entered";   
          }
        }
      ?> 
      <?php

      //fetch data from database

        $sql="SELECT * FROM `mytable`";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
            while($rows=mysqli_fetch_assoc($result)){
                 
                //show data

                echo"<div class="."card border-info mb-3" ."style="."max-width: 18rem;".">".
                  "<div class="."card-header bg-transparent border-success".">".$rows['fname']." ".$rows['lname']."</div>
                      <div class="."card-body text-info".">
                          <h5 class="."card-title".">".$rows['relation']."</h5>
                          <p class="."card-text".">".$rows['notes']."</p>".
                          "<p class="."card-text".">"."email: ".$rows['email']."</p>".
                      "</div>
                          <div class="."card-footer bg-transparent border-success".">".$rows['mnumber']."</div>
                </div><br><br>";
                }
        ?>   
      </div> 
     </div>
    </div>
  </body>
</html>
