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

     return $db;

}

   $db = loadDatabase();

}
catch (PDOException $ex)
{
   echo "Error: " . $ex->getMessage();
   die();
}

//$query = "SELECT title, count FROM customer c LEFT OUTER JOIN foodOrder f ON c.id = f.order_id LEFT OUTER JOIN food_item fi ON fi.id = f.food_item_id WHERE order_id = $id;";
//$query = "SELECT * FROM food_item fi JOIN foodOrders fo ON fi.id=fo.food_item_id LEFT OUTER JOIN orders o ON fo.order_id=o.id WHERE o.customer_id=$id"; //WHERE orders.customer_id=$id;";
$query = "SELECT title, count FROM food_item WHERE order_id=$id;";
$stmt = $db->query($query);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo "<input type='checkbox'>" . $row['title'] . " - QUANTITY: " . $row['count'] . "<br />";
}

?>





