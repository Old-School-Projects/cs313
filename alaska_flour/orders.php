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
   <script src="script.js"></script>
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
   //$query = "SELECT * FROM food_item fi JOIN orders o ON fi.id = o.customer_id";
   $query = "SELECT * FROM food_item fi JOIN customer c ON fi.id = c.id";

   $table = "<table id='customers'><tr><th>Order #</th><th>Customer</th></tr>";

   $stmt = $db->query($query);
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
   {
      $table .= "<tr>";
      $table .= "<td>" . $row['id'] . "</td>";
      $table .= "<td>" . "<a href='#openModal'>" . $row['first_name'] . " " . $row['last_name'] . "</a>" . "</td>";
      $table .= "</tr>";

//       $window = "<div id='openModal' class='modalDialog'><div>
//       <a href='#close' title='Close' class='close'>X</a>
//       <h2>Customer Info</h2>" . $row['title'] . " " . $row['count'] . 

//       "<input type='button' value='Complete Order'/>
//    </div>
// </div>";
      
   }

   $table .= "</table>";

   echo $table;
?>

</div>

<div id="openModal" class="modalDialog">
   <div>
      <a href="#close" title="Close" class="close">X</a>
      <h2>Customer Info</h2>
      <p>Here the customer's name, address and order will be display.</p>
      <p>Here I would also have a button that says complete to complete the order.</p>
      <input type="button" value="Complete Order"/>
   </div>
</div>





</body>
<html>