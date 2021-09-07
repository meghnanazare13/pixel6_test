<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="animal";

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn,"SELECT * FROM animal");
?>
<!DOCTYPE html >
 <head > 
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>

     <title>My website</title> 
     <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
</style>
    </head> 
    <body bgcolor = "#99CC99"> 
        <?php $handle = fopen("counter.txt", "r"); 
        if(!$handle){ echo "could not open the file" ; } 
        else { $counter = ( int ) fread ($handle,20) ; 
        fclose ($handle) ; $counter++ ; echo" <strong> you are visitor no ". $counter . " </strong> " ;
         $handle = fopen("counter.txt", "w" ) ; fwrite($handle,$counter) ; fclose ($handle) ; } ?> 
         <h1>This is my Animals Information</h1>
         
         <table>
<thead>
<tr>
      <th scope="col">No</th>
      
      <th scope="col">Animal name</th>
      <th scope="col">Animal Category</th>
      <th scope="col">Animal Discription</th>
      <th scope="col">Animal Life</th>
      
    </tr>
    </thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) 
{
?>
<tbody>
<tr>
<td><?php echo $row["No"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["category"]; ?></td>
<td><?php echo $row["comment"]; ?></td>
<td><?php echo $row["life"]; ?></td>


</tr>
</tbody>
<?php
$i++;
}
?>
</table>
        

         </body>
          </html >
