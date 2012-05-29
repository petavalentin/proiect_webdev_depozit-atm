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
				<form action="search_result.php" method="post">
					Name: <input type="text" name="product_name" />
					<input type="submit" value="Cauta"/>
				</form>		
				
				
				<?php
					$con = mysql_connect("localhost", "root");
					if (!$con)
						die('Could not connect: ' . mysql_error());

					mysql_select_db("atm", $con);

					$result = mysql_query('SELECT * FROM log_produs  WHERE nume="' . $_REQUEST["product_name"] . '"');
					
					$num_rows = mysql_num_rows($result);
					
					if($num_rows == 0)
						echo '<b>Produsul ' . $_REQUEST["product_name"] . ' NU exista in baza de date!</b>';
					else
					{
						echo '<b>Produsul ' . $_REQUEST["product_name"] . ' a fost gasit de ' . $num_rows . ' ori:</b>';
						
						echo '<table id="my_table">
								<tr>
									<th width=40%>Categorie</th>
									<th width=10%>Unitate de masura</th>
									<th width=10%>Numar</th>
									<th width=20%>Pret</th>
									<th width=20%>Data</th>
								</tr>';
						
						$ok = 1;
						while($row = mysql_fetch_array($result))
						{
							if($ok % 2 == 1)
								echo "<tr>";
							else
								echo '<tr class="my_row_table">';
							
							if($row["categorie"] == 1)
								echo '<td>Intrare</td>';
							else
								echo '<td>Iesire</td>';
							echo "<td>" . $row['um'] . "</td>";
							echo "<td>" . $row['bucati'] . "</td>";
							echo "<td>" . $row['pret'] . "</td>";
							echo "<td>" . $row['data'] . "</td>";
							echo "</tr>";
							$ok++;
						}
						
						echo "</table>";
					}
					
					mysql_close($con);
				?> 	
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

