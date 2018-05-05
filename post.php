
<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    $database='DMR';
session_start();
$ID =  $_SESSION['id'];
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);
$v = $_POST['post'];

    
    if($db_found){
        $sql2 = "SELECT COUNT(DISTINCT ID) FROM Post";

        $result2=mysqli_query($db_handle,$sql2);    
        $data2 = mysqli_fetch_row($result2); 
             
        $n=$data2[0]+1;
        $sql = "INSERT INTO Post (Date, Contenu, ID, ID_Auteur) VALUES ('2018-01-01', '$v', '$n', '$ID')";
$result=mysqli_query($db_handle,$sql);   
        header('Location: profile.php');
    }

       
    else{
        echo'Database not found';
    }
    mysqli_close($db_handle);
?>