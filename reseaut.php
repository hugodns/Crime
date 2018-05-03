<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    $database='DMR';
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
    $db_found=mysqli_select_db($db_handle,$database);

$ID = $_POST['ID']; 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];


    if($db_found){

        echo "Liste d'amis de ".$prenom." ".$nom."<br><br>";
        
        $sql2="SELECT ID2 FROM amitie WHERE ID1= $ID ";
        
        $result2=mysqli_query($db_handle,$sql2);  

        while ($data = mysqli_fetch_assoc($result2)) {
  //      echo "ID1: " . $ID;
  //          echo " est ami avec ID2: " . $data['ID2'] . '<br>';
            
            
            $sql3="SELECT * FROM clients WHERE ID= " .$data['ID2'] ;                   
            $result3=mysqli_query($db_handle,$sql3); 
            
            
        while ($data2 = mysqli_fetch_assoc($result3)) {
                        
             echo "Nom:" . $data2['Nom'] . '<br>';
             echo "Prenom: " . $data2['Prenom'] . '<br>';
            echo '<div class="userpic"> <img src="photo'.$data2['ID'].'.jpg" alt=""class="userpicimg" height="150" width="150"> </div>';
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
                        
             echo "Nom:" . $data4['Nom'] . '<br>';
             echo "Prenom: " . $data4['Prenom'] . '<br>';
            echo '<div class="userpic"> <img src="photo'.$data4['ID'].'.jpg" alt=""class="userpicimg" height="150" width="150"> </div>';
           echo '<br>';
                    }
         } 
        
    }
    else{
        echo'Database not found';
    }
    mysqli_close($db_handle);
?>