<?php

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
   <title>Alaska Flour | New Order</title>
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

	<form action="" method="post">
		<label>Customer: </label><input type="text" name="customer_name" id="customer_name"><br />
		<label>Phone: </label><input type="text" name="cust_phone" id="cust_phone"><br />
		<hr />

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



</body>
<html>