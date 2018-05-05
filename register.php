            <?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','root');
    $database='DMR';
            session_start();
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);
if($db_found){
$sql="SELECT MAX(ID) FROM clients";
$result=mysqli_query($db_handle,$sql);
$data1 = mysqli_fetch_row($result);       
$_SESSION['id']=$data1[0];  
$id=$_SESSION['id'] + 1;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="signup.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main-style.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <title>Enregistrement</title>
<style>
body {
    background-color:#00AFFF;
}
</style>
    <script>

        var error;

        var mail = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g);

        function isEmpty(mail,mdp) {

            if (email=="")
                error += "Your Email is empty\n";
            if (password=="")
                error += "Your Password is empty\n";

            if(error != "")
                alert(error);
        }

        function isCorrect(email) {

            if (!mail.test(email))
                error += "Your Email is invalid\n";

            if(error != "")
                alert(error);
        }

        function verifyContent() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            error = "";

            isEmpty(email,password);

            if(error=="")
                isCorrect(email);

            if(error == ""){
                return true;
            } else {
                return false;
            }
        }

    </script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

    </div>
</nav>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <img src="logo5.png">
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" onsubmit="return verifyContent()" action="enregistrementt.php">
                <div class="form-group">
                    <label for="mail" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="mail" id="mail"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pseudo" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="pseudo" id="pseudo"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mdp" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="password" class="form-control" name="mdp" id="mdp"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nom" class="cols-sm-2 control-label">Nom</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="nom" id="nom"  placeholder="Enter your Last Name"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="prenom" class="cols-sm-2 control-label">Prenom</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="prenom" id="prenom"  placeholder="Enter your First Name"/>
                        </div>
                    </div>
                </div>
                <label for="photo" class="cols-sm-2 control-label">Photo</label>
                <input type="file" name="photo" />
            <?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','root');
    $database='DMR';
            session_start();
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);
if($db_found){
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
$n = "images/photo.{$id}.jpg";
$resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$n);
if ($resultat) echo "Transfert réussi";
}
?>




                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>
                <div class="register">
                    <a href="signup.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>