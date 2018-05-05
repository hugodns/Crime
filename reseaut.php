<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reseau</title>
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
            <li><a href="profile.php">Profile</a></li>
            <li><a href="jobs.html">Jobs</a></li>
            <li class="active"><a href="reseaut.php">Network</a></li>
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
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','root');
    $database='DMR';
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);
session_start();
$ID =  $_SESSION['id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];


    if($db_found){

        echo "MA LISTE D'AMI <br><br><br>";
        
        $sql2="SELECT ID2 FROM amitie WHERE ID1= $ID ";
        
        $result2=mysqli_query($db_handle,$sql2);  

        while ($data = mysqli_fetch_assoc($result2)) {
  //      echo "ID1: " . $ID;
  //          echo " est ami avec ID2: " . $data['ID2'] . '<br>';
            
            
            $sql3="SELECT * FROM clients WHERE ID= " .$data['ID2'] ;                   
            $result3=mysqli_query($db_handle,$sql3); 
            
            
        while ($data2 = mysqli_fetch_assoc($result3)) {
             $_SESSION['noma']=$data2['Nom'];
            $_SESSION['prenoma']=$data2['Prenom'];
                echo '<div class="userpic"> <img src="images/photo'.$data2['ID'].'.jpg" alt=""class="userpicimg" height="50" width="50"> </div>';
             echo $_SESSION['prenoma'] ." ". $_SESSION['noma']. '<br>'; 

            echo '<br>';

           
                    }

         } 
        $sql4="SELECT ID1 FROM amitie WHERE ID2= $ID ";
        
        $result4=mysqli_query($db_handle,$sql4);  

        while ($data3 = mysqli_fetch_assoc($result4)) {
   //         echo "ID1: " . $data3['ID1'];
  //        echo " est ami avec ID2: " . $ID . '<br>';
            
            
            $sql5="SELECT * FROM clients WHERE ID= " .$data3['ID1'] ;                   
            $result5=mysqli_query($db_handle,$sql5); 
            
            
        while ($data4 = mysqli_fetch_assoc($result5)) {
                        $_SESSION['noma']=$data4['Nom'];
            $_SESSION['prenoma']=$data4['Prenom'];
            $_SESSION['ida']=$data4['ID'];
                echo '<div class="userpic"> <img src="images/photo'.$data4['ID'].'.jpg" alt=""class="userpicimg" height="50" width="50"> </div>';
             echo $_SESSION['prenoma'] ." ". $_SESSION['noma']. '<br>';
            

           echo '<br>';
                    }
         } 
        
    }
    else{
        echo'Database not found';
    }
    mysqli_close($db_handle);
?>