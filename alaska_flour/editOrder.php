<?php

$id = $_POST['customerId'];



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


// $query = "SELECT * FROM food_item fi JOIN foodorder fo ON fi.id=fo.food_item_id LEFT OUTER JOIN orders o ON fo.order_id=o.id WHERE o.customer_id=$id"; //WHERE orders.customer_id=$id;";
// $stmt = $db->query($query);

echo $id;

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
// {
//   echo $row['title'] . " - QUANTITY: " . $row['count'] . "<br />";
// }



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
   <title>Alaska Flour | Orders</title>
</head>
<body>
  <h1>Order Edit</h1>
  <div id="center"></div>
</body>
</html>



