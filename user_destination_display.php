<?php 

include_once 'header.php';
?>
        
        <h1> Prijavljeni uporabniki na destinacijo </h1>
        <table border="2">
            <tr>
            <td>ime</td>
             <td>priimek</td>
             <td>e-mail</td>
            </tr>
            </br>
        <?php
          include_once 'database.php';
    
 echo '<form action= "email.php" method="get">'; 
    $d_query = " SELECT u.id, u.first_name, u.last_name, u.email FROM destinations d INNER JOIN users_destinations us ON d.id = us.destination_id INNER JOIN users u ON u.id = us.user_id ";
    $ime_result = mysqli_query($link, $d_query);
   

while ($row = mysqli_fetch_array($ime_result)) {
    $email = $row['email'];
    echo '<tr>';
    echo '<td>'.$row['first_name'].'</td>';
    echo '<td>'.$row['last_name'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo  "<td><a href='email.php?email=" . $email . "'>POŠLJI EMAIL</a></td>";
    echo '<tr>';
}
echo '</form>';
        ?>
    </table>
        
        <?php
include_once 'footer.php';
?>
