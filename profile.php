<?php

session_start();
$id =   $_SESSION['id'];
$database = "DMR";
$host = 'localhost';
$login = 'root';
$passwordDTB = 'root';

$conn = new mysqli($host,$login,$passwordDTB,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clients WHERE ID =  '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        $ID = $row["ID"];
        $email = $row["Mail"];
        $username = $row["Pseudo"];
        $_SESSION['nom'] = $row["Nom"];
        $_SESSION['prenom'] = $row["Prenom"];
    }
    
$sql2="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=1";
        
$result2=$conn->query($sql2); 

    while ($row = $result2->fetch_assoc()) {
    $date1=$row['Date'];
    $cont1=$row['Contenu'];
        
    }
$sql3="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=2";
        
$result3=$conn->query($sql3); 

    while ($row = $result3->fetch_assoc()) {
    $date2=$row['Date'];
    $cont2=$row['Contenu'];
        
    }
$sql4="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=3";
        
$result4=$conn->query($sql4); 

    while ($row = $result4->fetch_assoc()) {
    $date3=$row['Date'];
    $cont3=$row['Contenu'];
        
    }
$sql5="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=4";
        
$result5=$conn->query($sql5); 

    while ($row = $result5->fetch_assoc()) {
    $date4=$row['Date'];
    $cont4=$row['Contenu'];
        
    }
$sql6="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=5";
        
$result6=$conn->query($sql6); 

    while ($row = $result6->fetch_assoc()) {
    $date5=$row['Date'];
    $cont5=$row['Contenu'];
        
    }
$sql8="SELECT * FROM Post WHERE ID_auteur= '$ID' AND ID=7";
        
$result8=$conn->query($sql8); 

    while ($row = $result8->fetch_assoc()) {
    $date7=$row['Date'];
    $cont7=$row['Contenu'];
        
    }
            
} else {

}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
body {
    background-color:#00AFFF;
}
</style>


    <script type="text/javascript"  >


        var id= "<?php Print($ID); ?>";
        var email= "<?php Print($email); ?>";
        var username= "<?php Print($username); ?>";
        var name= "<?php Print($name); ?>";



        window.onload = function() {

            alert(name + fname);
            document.getElementById("completeName").innerHTML = fname + " " + name;
            document.getElementById("details").innerHTML = "User: " + username + "   Mail: " + email;
        }
        alert(name + fname);

    </script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="feed.php">Feed</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
            <li><a href="jobs.html">Jobs</a></li>
            <li><a href="reseaut.php">Network</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

    </div>
</nav>



<div class="container">
  <div class="row">
      <div class="col-md-12 text-center ">
          <div class="panel panel-default">
              <div class="userprofile social ">
                  <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
                  <label type="text" id="details" name="details" >
<?php
                        echo "MON PROFILE";
                      echo "<br><br><br>";
                echo '<div class="userpic"> <img src="images/photo'.$ID.'.jpg" alt=""class="userpicimg" height="150" width="150"> </div>';
             //       <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
             echo $_SESSION['prenom'];
            echo" ";
             echo $_SESSION['nom']. '<br>';
             echo"<br>";
            $_SESSION['id']=$ID;
?>
            <form NAME ="formulaire" METHOD ="POST" Action=post.php>
            <INPUT TYPE ="TEXT" Name = "post" id="post"> 
            <INPUT TYPE ="Submit" Name = "Submit1" VALUE="Publier">
		</form>
                
                                 </div>
                          </h3>
                      </li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
        <!-- /.col-md-12 -->
        
        
    </div>
</div>

<div class="container">
  <div class="row">
      <div class="col-md-12 text-center ">
          <div class="panel panel-default">
              <div class="userprofile social ">
                  <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
                  <label type="text" id="details" name="details" >
      <?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','root');
    $database='DMR';
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);
session_start();
$ID =  $_SESSION['id'];


    if($db_found){

        
        $sql="SELECT*FROM Post";
        
        $result=mysqli_query($db_handle,$sql);  

        $data = mysqli_fetch_assoc($result);
        $date=$data['Date'];

         
        $sql2="SELECT * FROM Post WHERE ID_auteur = $ID ORDER BY ID DESC";
        
        $result2=mysqli_query($db_handle,$sql2);  

        while ($data2 = mysqli_fetch_assoc($result2)) {
        echo $data2['Contenu']. "<br><br>";
        
        }
        
  //      echo " est ami avec ID2: " . $data['ID2'] . '<br>';
        
               }
?>
                                 </div>
              <div class="col-md-12 border-top border-bottom">
                  <ul class="nav nav-pills pull-left countlist" role="tablist">
                      <li role="presentation" >
                          <h3 class="userFriends"><label type="text" id="numFriends" name="numFriends" >
                          </h3>
                              
                      </li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
        <!-- /.col-md-12 -->
        
        
    </div>
</div>
    













</body>
</html>


