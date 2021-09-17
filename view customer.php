<?php
include_once 'db.php';
include_once 'hp.php';

$result = mysqli_query($conn,"SELECT * FROM customer");
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

table, th, td {
  border: 1px solid black;
    border-color:white;
	border-collapse: collapse;
}
a { text-decoration: none; }

	
</style>
<title>View customers</title>
</head>
<body>
<div class="hero"><br><br><br><br>

<center><h2><font color =white >View customer </h2></center><br>

<table class="center">
	<tr>
	
	<td>Customer Name</td>
	<td>Customer Emailid</td>
	<td>Customer balance</td>
    <td><font color="white"><b>Action</b></td></font>
	</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
	<tr class="<?php if(isset($classname)) echo $classname;?>">
    <td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["emailid"]; ?></td>
	<td><?php echo $row["balance"]; ?></td>
  <td><a href="transfer.php?name=<?php echo $row["name"]; ?>"><font color="#F88379"><b>View</b></a></td>
	</tr>
	<?php
	$i++;
	}
	?>
	</div>
</table>
</body>
</html>