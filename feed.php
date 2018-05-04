
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

        
        
      $sql2="SELECT ID2 FROM amitie WHERE ID1= $ID";
        
       $result2=mysqli_query($db_handle,$sql2);  

        while ($data = mysqli_fetch_assoc($result2)) {
            $ida=$data['ID2'];
            $sql4="SELECT * FROM Post WHERE ID_auteur =$ida";                   
            $result4=mysqli_query($db_handle,$sql4);  

        while ($data2 = mysqli_fetch_assoc($result4)) { 

         echo $data2['Date']. "<br>";
        echo $data2['Contenu']. "<br><br>";
        
             }
            
            
    }
        $sql5="SELECT * FROM Post WHERE ID_auteur =$ID";                   
            $result5=mysqli_query($db_handle,$sql5);  

        while ($data3 = mysqli_fetch_assoc($result5)) { 

         echo $data3['Date']. "<br>";
        echo $data3['Contenu']. "<br><br>";
        }
    }
?>
