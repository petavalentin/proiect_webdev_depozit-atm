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
				<p class="first_page">
					Introduceti produsul cautat in text-box-ul de mai jos si apasati butonul "Cauta".
				</p>
				
				<form action="search_result.php" method="post">
					<table style="width: 300px">					
						<tr>
							<td style="width: 50%"><label>Nume:</label></td>
							<td style="width: 50%"><input type="text" name="product_name"/></td>
						</tr>
					</table>
					<input type="submit" value="Cauta" style="width:100px;"/>
				</form>			
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

