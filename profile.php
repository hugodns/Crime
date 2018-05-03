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
        $name = $row["Nom"];
        $prenom = $row["Prenom"];
        
             echo "Nom:" . $name. '<br>';
             echo "Prenom: " . $prenom. '<br>';
             echo"<br>";
    }


} else {

}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" type="text/css" href="profile.css">


    <script type="text/javascript"  >

        alert("toto");

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
                <img src="../img/ece_logo.png">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
            <li><a href="jobs.html">Jobs</a></li>
            <li><a href="messenger.html">Messenger</a></li>
            <li><a href="network.html">Network</a></li>
            <li><a href="notification.html">Notifications</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                        
                echo '<div class="userpic"> <img src="photo'.$ID.'.jpg" alt=""class="userpicimg" height="150" width="150"> </div>';
             //       <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
             echo $name;
            echo" ";
             echo $prenom. '<br>';
             echo"<br>";
?>
              </div>
              <div class="col-md-12 border-top border-bottom">
                  <ul class="nav nav-pills pull-left countlist" role="tablist">
                      <li role="presentation" >
                          <h3 class="userFriends"><label type="text" id="numFriends" name="numFriends" >
                          </h3>
                      </li>
                  </ul>
                  <button class="btn btn-primary followbtn">Follow</button>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
        <!-- /.col-md-12 -->
        
        
    </div>
</div>











</body>
</html>


