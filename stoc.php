<html>
	<head>
		<title>Gestiune ATM</title>
		<link rel="stylesheet" type="text/css" href="my_style.css" />
	</head>
	
	<body>
		<div class="container">
			<div class="header">
				<h1 class="header">Depozit ATM</h1>
			</div>
			
			<div class="left">
				<ul class="main_ul">
					<li><a href="depozit.php">Home</a></li>
					<li><a href="stoc.php">Stoc</a></li>
					<li><a href="info.php">Informatii produs</a></li>
					<li><a href="add.php">Adaugare produs</a></li>
					<li><a href="eliminate.php">Predare produs</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
			
			<div class="content">
				<?php
					$con = mysql_connect("localhost", "root");
					if (!$con)
						die('Could not connect: ' . mysql_error());

					mysql_select_db("atm", $con);

					$result = mysql_query("SELECT * FROM produs");

					echo "<table border='1'>
							<tr>
								<th>Nume</th>
								<th>Unitate de masura</th>
								<th>Numar</th>
								<th>Pret</th>
							</tr>";

					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>" . $row['nume'] . "</td>";
						echo "<td>" . $row['um'] . "</td>";
						echo "<td>" . $row['numar'] . "</td>";
						echo "<td>" . $row['pret'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";

					mysql_close($con);
				?> 	
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

