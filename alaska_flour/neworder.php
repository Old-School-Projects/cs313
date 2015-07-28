<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$f_name = test_input($_POST['first_name']);
	$l_name = test_input($_POST["last_name"]);
	$cust_phone = test_input($_POST['cust_phone']);
	$str_name = test_input($_POST['str_name']);
	$str_num = test_input($_POST['str_num']);
	$city = test_input($_POST['city']);
	$state = test_input($_POST['state']);
	$zip = test_input($_POST['zip']);
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// Items to order
$item_01 = $_POST['item_01'];
$item_01_title = "Cream of Barley Breakfast Cereal #1";
$item_02 = $_POST['item_02'];
$item_02_title = "Cream of Barley Breakfast Cereal #2";
$item_03 = $_POST['item_03'];
$item_03_title = "Cream of Barley Breakfast Cereal #3";
$item_04 = $_POST['item_04'];
$item_04_title = "Cream of Barley Breakfast Cereal #4";
$item_05 = $_POST['item_05'];
$item_05_title = "Barley Couscous #1";
$item_06 = $_POST['item_06'];
$item_06_title = "Barley Couscous #2";
$item_07 = $_POST['item_07'];
$item_07_title = "Barley Couscous #3";
$item_08 = $_POST['item_08'];
$item_08_title = "Great Alaska Pancake Mix";
$item_09 = $_POST['item_09'];
$item_09_title = "Cinnamon Chip Pancake Mix";
$item_10 = $_POST['item_10'];
$item_10_title = "Roasted Barley Tea #1";
$item_11 = $_POST['item_11'];
$item_11_title = "Roasted Barley Tea #2";
$item_12 = $_POST['item_12'];
$item_12_title = "Kodiak Chocolate Chip Cookies";
$item_13 = $_POST['item_13'];
$item_13_title = "Black Gold Brownie Mix";
$item_14 = $_POST['item_14'];
$item_14_title = "Cracked Barley";
$item_15 = $_POST['item_15'];
$item_15_title = "Barley Flour #1";
$item_16 = $_POST['item_16'];
$item_16_title = "Barley Flour #2";
$item_17 = $_POST['item_17'];
$item_17_title = "Barley Flour #3";
$item_18 = $_POST['item_18'];
$item_18_title = "Barley Flour #4";


$order_array = array($item_01_title => $item_01, $item_02_title => $item_02, $item_03_title => $item_03, 
	$item_04_title => $item_04, $item_05_title => $item_05, $item_06_title => $item_06, $item_07_title => $item_07, 
	$item_08_title => $item_08, $item_09_title => $item_09, $item_10_title => $item_10, $item_11_title => $item_11, 
	$item_12_title => $item_12, $item_13_title => $item_13, $item_14_title => $item_14, $item_15_title => $item_15, 
	$item_16_title => $item_16, $item_17_title => $item_17, $item_18_title => $item_18);


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
   <script src="orderscript.js"></script>
   <title>Alaska Flour | New Order</title>
   <link rel='shortcut icon' href='images/icon.ico'>
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
</div>

<div id="center">
	<h2>New Order</h2>
	<form action="#" method="post">
		<div id="customer_info">
		<label>First Name </label><input type="text" name="first_name" id="first_name" autofocus><br />
		<label>Last Name </label><input type="text" name="last_name" id="last_name"><br />
		<label>Phone </label><input type="text" name="cust_phone" id="cust_phone"><br />
		<h4>Address</h4>
		<label>Street Name </label><input type="text" name="str_name" id="str_name"><br />
		<label>Street Num </label><input type="text" name="str_num" id="str_num"><br />
		<label>City </label><input type="text" name="city" id="city"><br />
		<label>State </label><input type="text" name="state" id="state"><br />
		<label>Zip </label><input type="text" name="zip" id="zip"><br />
		<hr />
		</div>
		<table class="customers">
			<tr>
				<th>Item No.</th>
				<th>Product Description</th>
				<th>Case Count</th>
				<th>Size</th>
				<th>Product UPC Code</th>
				<th>Wt.lbs</th>
				<th>Price per Unit</th>
				<th>Case Qty</th>
			</tr>
			<tr>
				<td>01</td>
				<td>Cream of Barley Breakfast Cereal</td>
				<td>24</td>
				<td>2#</td>
				<td>867184000048</td>
				<td>48</td>
				<td>5.00</td>
				<td><input type="text" name="item_01" id="item_01"></td>
			</tr>
			<tr class="alt">
				<td>02</td>
				<td>Cream of Barley Breakfast Cereal</td>
				<td>8</td>
				<td>2#</td>
				<td>713757518222</td>
				<td>40</td>
				<td>10.00</td>
				<td><input type="text" name="item_02" id="item_02"></td>
			</tr>
			<tr>
				<td>03</td>
				<td>Cream of Barley Breakfast Cereal</td>
				<td>4</td>
				<td>10#</td>
				<td>713757518221</td>
				<td>40</td>
				<td>15.00</td>
				<td><input type="text" name="item_03" id="item_03"></td>
			</tr>
			<tr class="alt">
				<td>04</td>
				<td>Cream of Barley Breakfast Cereal</td>
				<td>1</td>
				<td>25#</td>
				<td>-</td>
				<td>25</td>
				<td>50.00</td>
				<td><input type="text" name="item_04" id="item_04"></td>
			</tr>
			<tr>
				<td>05</td>
				<td>Barley Couscous</td>
				<td>24</td>
				<td>2#</td>
				<td>867184000086</td>
				<td>48</td>
				<td>6.00</td>
				<td><input type="text" name="item_05" id="item_05"></td>
			</tr >
			<tr class="alt">
				<td>06</td>
				<td>Barley Couscous</td>
				<td>4</td>
				<td>10#</td>
				<td>867184000093</td>
				<td>40</td>
				<td>25.00</td>
				<td><input type="text" name="item_06" id="item_06"></td>
			</tr>
			<tr>
				<td>07</td>
				<td>Barley Couscous</td>
				<td>1</td>
				<td>25#</td>
				<td></td>
				<td>25</td>
				<td>50.00</td>
				<td><input type="text" name="item_07" id="item_07"></td>
			</tr>
			<tr class="alt">
				<td>08</td>
				<td>Great Alaska Pancake Mix</td>
				<td>12</td>
				<td>3#</td>
				<td>867184000062</td>
				<td>36</td>
				<td>7.00</td>
				<td><input type="text" name="item_08" id="item_08"></td>
			</tr>
			<tr>
				<td>09</td>
				<td>Cinnamon Chip Pancake Mix</td>
				<td>12</td>
				<td>3#</td>
				<td>867466000063</td>
				<td>36</td>
				<td>7.80</td>
				<td><input type="text" name="item_09" id="item_09"></td>
			</tr>
			<tr class="alt">
				<td>10</td>
				<td>Roasted Barley Tea</td>
				<td>48</td>
				<td>6 oz.</td>
				<td>867184000079</td>
				<td>18</td>
				<td>4.25</td>
				<td><input type="text" name="item_10" id="item_10"></td>
			</tr>
			<tr>
				<td>11</td>
				<td>Roasted Barley Tea</td>
				<td>24</td>
				<td>1#</td>
				<td>867466000025</td>
				<td>24</td>
				<td>6.00</td>
				<td><input type="text" name="item_11" id="item_11"></td>
			</tr>
			<tr class="alt">
				<td>12</td>
				<td>Kodiak Chocolate Chip Cookies</td>
				<td>24</td>
				<td>13 oz.</td>
				<td>867466000087</td>
				<td>24</td>
				<td>4.25</td>
				<td><input type="text" name="item_12" id="item_12"></td>
			</tr>
			<tr>
				<td>13</td>
				<td>Black Gold Brownie Mix</td>
				<td>24</td>
				<td>14 oz.</td>
				<td>867466000070</td>
				<td>24</td>
				<td>4.25</td>
				<td><input type="text" name="item_13" id="item_13"></td>
			</tr>
			<tr class="alt">
				<td>14</td>
				<td>Cracked Barley</td>
				<td>1</td>
				<td>25#</td>
				<td></td>
				<td>25</td>
				<td>50.00</td>
				<td><input type="text" name="item_14" id="item_14"></td>
			</tr>
			<tr>
				<td>15</td>
				<td>Barley Flour</td>
				<td>18</td>
				<td>2#</td>
				<td>713757517829</td>
				<td>48</td>
				<td>5.00</td>
				<td><input type="text" name="item_15" id="item_15"></td>
			</tr>
			<tr class="alt">
				<td>16</td>
				<td>Barley Flour</td>
				<td>8</td>
				<td>5#</td>
				<td>713757517928</td>
				<td>40</td>
				<td>8.75</td>
				<td><input type="text" name="item_16" id="item_16"></td>
			</tr>
			<tr>
				<td>17</td>
				<td>Barley Flour</td>
				<td>4</td>
				<td>10#</td>
				<td>713757518024</td>
				<td>40</td>
				<td>15.00</td>
				<td><input type="text" name="item_17" id="item_17"></td>
			</tr>
			<tr class="alt">
				<td>18</td>
				<td>Barley Flour</td>
				<td>1</td>
				<td>25#</td>
				<td>867184000031</td>
				<td>25</td>
				<td>25.00</td>
				<td><input type="text" name="item_18" id="item_18"></td>
			</tr>
		</table>


		<input type="submit" value="Submit">
	</form>


</div>

<?php



//the isset is to make sure that it doesn't try to run the query when this page loads
if (isset($f_name)) {
	echo "FIRST name is set: $f_name<br >";
	//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Last name and num set: $l_name<br >";
$query = $db->prepare("INSERT INTO address (street_name, street_num, city, state, zip,  customer) VALUES (:str_name, :str_num, :city, :state, :zip, :customer)");
$query->bindParam(':str_name', $str_name, PDO::PARAM_STR);
$query->bindParam(':str_num', $str_num, PDO::PARAM_INT);
$query->bindParam(':city', $city, PDO::PARAM_STR);
$query->bindParam(':state', $state, PDO::PARAM_STR);
$query->bindParam(':zip', $zip, PDO::PARAM_INT);
$query->bindParam(':customer', $customerId, PDO::PARAM_INT);
$query->execute();

// insert customer info
$query = $db->prepare("INSERT INTO customer (first_name,last_name,phone_num) VALUES (:f_name, :l_name, :cust_phone)");
$query->bindParam(':f_name', $f_name, PDO::PARAM_STR);
$query->bindParam(':l_name', $l_name, PDO::PARAM_STR);
$query->bindParam(':cust_phone', $cust_phone, PDO::PARAM_INT);
$query->execute();

$customerId = $db->lastInsertId();

// insert address info
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// insert new order
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "ADDRESS SET: $str_num $str_name <br >";

date_default_timezone_set('America/Anchorage');

//$d=mktime(11, 14, 54, 8, 12, 2014);
$timeOfOrder = date("m-d h:i:sa");

$query = $db->prepare("INSERT INTO orders (customer_id, orderDate) VALUES ('$customerId', '$timeOfOrder')");

$query->execute();

$orderId = $db->lastInsertId();


// insert order info
foreach ($order_array as $key => $value){
	if ($value > 0){
		echo $value . " " . $key . "<br />";
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $db->prepare("INSERT INTO  food_item (title, count, order_id) VALUES (:key, :value, :customerId)");
		$query->bindParam(':key', $key, PDO::PARAM_STR);
		$query->bindParam(':value', $value, PDO::PARAM_INT);
		$query->bindParam(':customerId', $customerId, PDO::PARAM_INT);
		$query->execute();

		//$f_item_id = $db->lastInsertId();

		// foodorder
		//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// $query = $db->prepare("INSERT INTO foodorders (food_item_id, order_id) VALUES (:f_item_id, :orderId)");
		// $query->bindParam(':f_item_id', $f_item_id, PDO::PARAM_INT);
		// $query->bindParam(':orderId', $orderId, PDO::PARAM_INT);
		// $query->execute();

	}
			 
}


}


?>


</body>
</html>