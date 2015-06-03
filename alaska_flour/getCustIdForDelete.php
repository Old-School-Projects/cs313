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

$query = "DELETE FROM address WHERE id = $id;";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec($query);

$query = "DELETE FROM customer WHERE id = $id;";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec($query);

$query = "DELETE FROM foodorder WHERE food_item_id = $id;";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec($query);

$query = "DELETE FROM foodorder WHERE order_id = $id;";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec($query);





?>






