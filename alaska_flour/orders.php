<?php




try
{

function loadDatabase()
{

  $dbHost = "";
  $dbPort = "";
  $dbUser = "";
  $dbPassword = "";

     $dbName = "alaska";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          $user = 'alaska';
         $password = 'cool';
         $dbhost = 'localhost';
         $dbName = 'alaska';

         $db = new PDO("mysql:host=[$dbhost];dbname=$dbName", $user, $password);
     }
     else 
     { 
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

          $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     } 
     //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";

     return $db;

}

   $db = loadDatabase();

}
catch (PDOException $ex)
{
   echo "Error: " . $ex->getMessage();
   die();
}





?>

<!DOCTYPE html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="flour.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="script.js"></script>
   <script src="orderscript.js"></script>
   <script type="text/javascript">
    setTimeout(function(){
        lengthCheck();
      }, 3000);
   </script>
   <title>Alaska Flour | Orders</title>
</head>
<body>

<div id="center">
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'>Home</a></li>
   <li><a href='orders.php'>Orders</a></li>
   <li><a href='customers.php'>Customers</a></li>
   <li><a href='neworder.php'>New Order</a></li>
</ul>
</div>
<h2>Open Orders</h2>

<?php

   $query = "SELECT * FROM customer";
   $table = "<table class='customers' id='orders'><th></th><th>Customer</th><th>Time of Order</th><th>  </th><th>  </th>";
   $stmt = $db->query($query);
   $id;
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
   {
      $table .= "<tr>";
      $table .= "<td><a href='#openModalConfirm' onclick='completeFunc(" . $row['id'] . ")'><img src='images/complete.jpg' id='complete'></a></td>";
      $table .= '<td><b>' . "<span id='spanTitle" . $row['id'] . "' onclick='ajaxFunc(" . $row['id'] . ");'>"
       . $row['first_name'] . " " . $row['last_name'] . "</span></b>" . "<div id='divDetails" . $row['id'] . "'></div></td>";
      $table .= "<td>Time stamp</td><td><a href='#openModalDelete'><img src='images/delete.jpg' id='delete'></a></td>";
      $table .= "<td><a href='#openModalEdit' onclick='editFunc(" . $row['id'] . ")'><img src='images/edit.jpg' id='edit'></a></td>";
      $table .= "</tr>";
      $id = $row['id'];
   }

   $table .= "</table>";

   echo $table;

?>


<h2>Orders Ready for Shipment</h2>

</div>

<div id="openModalDelete" class="modalDialog">
   <div>
      <a href="#close" title="Close" class="close">X</a>
      <p>Are you sure you want to delete this order?</p>
      <div id="deleteMessage"></div>
      <form action="orders.php">  
          <input type="submit" value="Confirm" onclick="deleteFunc(<?php echo $id;?>)">
      </form>
   </div>
</div>

<div id="openModalEdit" class="modalDialog">
   <div>
      <a href="#close" title="Close" class="close">X</a>
      <p>Edit Customer Info</p>
      <div id="editMessage"></div>
      <form action="orders.php">
          <input type="submit" value="Confirm" onclick="editFunc(<?php echo $id;?>)">
      </form>
   </div>
</div>

<div id="openModalConfirm" class="modalDialog">
   <div>
      <a href="#close" title="Close" class="close">X</a>
      <p>Are you sure you want to process this order?</p>
      <div id="confirmMessage"></div>
      <input type="button" value="Confirm"/>
   </div>
</div>


</body>
</html>

