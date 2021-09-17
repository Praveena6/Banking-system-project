<?php
include_once 'xdb.php';
include_once 'xhp.php';

$result = mysqli_query($conn,"SELECT tname,amount,balance FROM transfer where name='" . $_GET["name"] . "'");
?>



<html>
<head>
<style>
.hero{
	height: 100%;
	width: 100%;
	 background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(p1.png);
	background-position: center;
	background-size: cover;
	position: absolute;
}
.center {
  margin-left: auto;
  margin-right: auto;
  font-size: 20px;
  color: white;
}
th, td {
  padding: 13px;
  text-align: left;
}
.btn {

  
  color: black;
  border: none;
  padding: 12px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  border-radius: 30px;
}
table, th, td {
  border: 1px solid black;
    border-color:white;
	border-collapse: collapse;
}
a { text-decoration: none; }
</style>
<title>Customer details</title>
</head>
<body>
<div class="hero"><br>
<table class="center">
<center><h2><font color =white >Customer Details </h2></center>
<center><h3><font color="white"><?php echo 'Customer name : '; ?><?php echo $_GET["name"]; ?></td></h3></center>
	<tr>
	<td>Transfered TO</td>
	<td>Transfered Amount</td>
	<td>Remaining Balance</td>
    
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $row["tname"]; ?></td>
	<td><?php echo $row["amount"]; ?></td>
	<td><?php echo $row["balance"]; ?></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</div>
</table><br><br><br><br>
<center><h3><a href="xcalc.php?name=<?php echo $_GET["name"]; ?>"><button type="submit" name="submit" class="btn">Transfer</button></a</h3>
</center>   
</body>
</html>
