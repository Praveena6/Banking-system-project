<html>
<head>
<style>
.topnav {
	
  overflow: hidden;
  
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #fff;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
}

/* Change the color of links on hover */
.topnav a:hover {
   background: transparent;
  color: black;
  border-radius: 30px;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #818181;
  color: white;
}
.hero{
	height: 100%;
	width: 100%;
	background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(p1.png);
	background-position: center;
	background-size: cover;
	position: absolute;
}
.sidebar {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top:10;
  left: 10;
  background: transparent;
  overflow-x: hidden;
  padding-top: 30px;
}

/* Style sidebar links */
.sidebar a {
  padding: 25px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
}

/* Style links on mouse-over */
.sidebar a:hover {
  color: #818181;
}

/* Style the main content */
.main {
  margin-left: 160px; 
  padding: 0px 10px;
}

@media screen and (max-height: 200px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>
<div class="hero" >
<div class="topnav" >
<div class="sidebar">
<a href="index.php"> Home</a>
  <a href="view customer.php">View customer</a>
  
</div>
</div>
</div>
</div>
</body>
</html>
