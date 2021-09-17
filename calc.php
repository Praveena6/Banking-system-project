<?php
include_once 'db.php';
include_once 'hp.php';

$result = mysqli_query($conn,"SELECT balance FROM customer where name='" . $_GET["name"] . "'");

?>
<html>
<head>
<style>
*{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
.hero{
	height: 100%;
	width: 100%;
	background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(p1.png);
	background-position: center;
	background-size: cover;
	position: absolute;
}
.booking{
	padding: 0 35px 20px;
    max-width: 350px;
    border: 1px solid #fff;
    margin: 2% auto 0;
    color: #fff;
}
.input-field{
	width:100%;
	padding: 12px 0;
	margin: 15px 0;
	border-left: 0;
	border-top: 0;
	border-right: 0;
	border-bottom: 1px solid #fff;
	outline: none;
	background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(p1.png);
	font-size: 15px;
	color:white;
}
.field{
	width:100%;
	padding: 12px 0;
	margin: 15px 0;
	border-left: 0;
	border-top: 0;
	border-right: 0;
	border: 1px solid #fff;
	outline: none;
	background: #ccccb3;
	

}
::placeholder {
  color: #fff;
  opacity: 100;
}
input, select, textarea {
color: linear-gradient(to right,#ff105f,#ffad06);
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

  select {
                appearance: none;
                outline: 0;
                background: black;
              background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(p1.png);
                width: 100%;
                height: 100%;
                color: white;
                cursor: pointer;
				font-size: 15px;
				 text-align: center;
				 Border: none;
            }
            .select {
                position: relative;
                display: block;
                width: 23em;
                height: 3em;
                line-height: 3;
                overflow: hidden;
                border-radius: .25em;
                padding-bottom:10px;
                font-size: 15px;
            }
           
</style>
<title>Transfer money</title>
</head>
<body>
 <div class="hero">
 <div class="form-box"><br><br>
 <center><h2><font color =white >Transaction</h2></center>
         <div class="booking">
		 <form  action="calc.php"  method="post"><br>
		 <center><h3><font color="white">
<?php
	$i=0;
	while($row = mysqli_fetch_array($result)) {
	echo  $_GET["name"];
	echo ' Your balance is  '?>
	<?php echo $row["balance"]; 
	?>
	<?php
	$i++;
	}
	?></h3> </center><br><br>
		   		   <label>SENDER NAME: </label>
           <input type="text" name="name" class="input-field" placeholder="Enter the sender name" required> <br>
		   <label>CURRENT BALANCE: </label>
           <input type="text" name="balance" class="input-field" placeholder="Enter the current balance" required> <br> <br>
	 <div class="select">	  
		   <select name="tname">
    <option disabled selected>-- Select Reciver --</option>
    <?php
        $records = mysqli_query($conn, "SELECT name From customer");
        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  
        }	
    ?>  
  </select>
		   </div>
		  
	
		   <br>
		    
		<label>TRANSFER AMOUNT :</label>
           <input type="text" name="amount" class="input-field" placeholder="Enter the money to be transfered" required> <br>
		  
		   
           <center><button type="submit" name="submit" class="btn">Transfer</button>
</center>         
		 </form>
		</div>
	    </div>
</body>
</html>
<?php

$con=mysqli_connect('localhost','root','');
if(!$con)
{
	echo"not conn";
}
if(!mysqli_select_db($con,'bank'))
{
	echo"not sel";
}
if(isset($_POST['submit']))
{
$name=$_POST["name"];
$balance=$_POST["balance"];
$tname=$_POST["tname"];
$amount=$_POST['amount'];
$bal=$balance-$amount;
$sql1 = "UPDATE customer SET balance='$balance'-'$amount' WHERE name='$name'";
$sql2 = "UPDATE customer SET balance=balance+'$amount' WHERE name='$tname'";
$sql=" INSERT INTO transfer(name,tname,amount,balance) VALUES('$name','$tname','$amount','$bal')";
if(mysqli_query($con,$sql))
{
if (mysqli_query($conn, $sql1)) {
	
  echo "Record updated successfully";
	 
}
if (mysqli_query($conn, $sql2)) {
	
	 
}
else
{
	echo "<h3><center><font color=red>Invalid </font></center></h3>"; 
}
}

}
?>