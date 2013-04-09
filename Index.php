<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">


<head>
<title>Euro-Travel</title>
<?php
session_start();

if ((isset($_SESSION['user_logged'])) || (isset($_SESSION['user_password']))) {
?>
	<link href="../Stylesheets/style2.css" rel="stylesheet" type="text/css" />
<?php
}
else { ?>
	<link href="../Stylesheets/style1.css" rel="stylesheet" type="text/css" />
<?php
}
?>
</head>
   
<body>

<div id="masthead">
	<div id="logo">
	<a href="Index.php"> <img src="../Images/logo_main.jpg" alt="Euro-Travel" /></a>
	</div>
	<div id="header"><h2></h2>
	</div>
</div>

	<script type="text/javascript">
        function change_parent_url(url)
        {
	    document.location=url;
        }		
    </script>

    <script type="text/javascript">
	<!--
	function iframeSource(iframe1,href)
		{
			document.getElementById(iframe1).setAttribute('src', href);
						
		}
	-->
	</script>

<div id="menu_container">
	<ul id="top_col">
    
        <a href="account.php" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Account.jpg" alt="Account" /></a>
	<a class ="hidden" href="Reservation.html" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Reservations.jpg" alt="Reservations" /></a>
	<a href="Fare_Structure.html"  onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Fare structure information.jpg" alt="Fare Structure" /></a>
	<a class ="hidden" href="Flight_Schedule.php" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Flight_Schedule.jpg" alt="Flight Schedule" /></a>
	<a class ="hidden" href="EuroRail.html" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Eurorailpasses.jpg" alt="Buy eurorail passes" /></a>
	<a href="About.html" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/About.jpg" alt="About Euro-Travel" /></a>
	<a class ="hidden" href="flightshop.php" onClick="iframeSource('iframe1', this.href); return false"><img src="../Images/Checkout.jpg" alt="Checkout" /></a>
	</ul>
	
    <div id="right_col">
    
    <div id="table">
   	<table>
   	<tr>
    
    <div id="th">
    <th><b>Destinations:</b></th>
    </div>
    
    <tr>
    <td class="destination">Austria</td></tr>
    <tr>
    <td class="destination">France</td></tr>
    <tr>
    <td class="destination">Germany</td></tr>
    <tr>
    <td class="destination">Italy</td></tr>
    <tr>
    <td class="destination">Switzerland</td></tr>
    
    <tr>
    
    <div id="th">
	<th><b>Attractions:</b></th>
    </div>
    
    <tr>
    <td class="sites">European Union Headquarters</td></tr>
	<tr>
    <td class="sites">Arc de Triomphe</td></tr>
    <tr>
    <td class="sites">Eiffel Tower</td></tr>
    <tr>
    <td class="sites">Versailles</td></tr>
    <tr>
    <td class="sites">Hofbrauhaus</td></tr>
    <tr>
	<td class="sites">Neuschwanstein</td></tr>
	<tr>
    <td class="sites">Mt Pilatus</td></tr>
    <tr>
    <td class="sites">Rhine Falls</td></tr>
    <tr>
    <td class="sites">Lowendenkmal</td></tr>
    <tr>
    <td class="sites">Kapellbrucke</td></tr>
    <tr>
    <td class="sites">Louvre</td></tr>
    <tr>
    <td class="sites">Notre Dame Cathedral</td></tr>
    </table>
    </div>
    </div>
	
    <div id="page_content">
    <iframe id="iframe1" src="home_page.html" width="860" height="710" frameborder="0"></iframe>
	</div>
</div>

<div id="footer">
<p>Copyright 2013</p>
</div>
</body>
</html>
