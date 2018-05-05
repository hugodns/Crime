<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "DMR";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "successfull connexion";
// username and password sent from form


$myusername = $_POST['email'];
$mypassword = $_POST['password'];


$sql = "SELECT ID FROM clients WHERE Mail = '$myusername' AND Mdp = '$mypassword'";
echo "lourd";

echo $sql;

$result = $conn->query($sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$ID = $row["ID"];
$nom = $row["Nom"];
$prenom = $row["Prenom"];



$count = mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
    $_SESSION['login_user'] = $myusername;
    $_SESSION['id'] = $ID;

    
    echo "success";
        header('Location: profile.php');
}


else
{
    echo "Your Login Name or Password is invalid";
}

?>