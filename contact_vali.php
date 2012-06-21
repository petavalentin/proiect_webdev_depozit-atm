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
					<li><a href="depozit.php" class="left_link_style">Home</a></li>
					<li><a href="stoc.php" class="left_link_style">Stoc</a></li>
					<li><a href="info.php" class="left_link_style">Informatii produs</a></li>
					<li><a href="add.php" class="left_link_style">Adaugare produs</a></li>
					<li><a href="eliminate.php" class="left_link_style">Predare produs</a></li>
					<li><a href="contact.php" class="left_link_style">Contact</a></li>
				</ul>
			</div>
			
			<div class="content">
				<form method='post' action='contact_send.php'>
					<table style="width: 300px">
						<tr>
							<td style="width: 50%"><label>To:</label></td>
							<td style="width: 50%"><input name='email' type='text' value='petavalentin@yahoo.com' size="25"/></td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>Subject:</label></td>
							<td style="width: 50%"><input name='subject' type='text' size="25"/></td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>From:</label></td>
							<td style="width: 50%"><input name='from' type='text' size="25"/></td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>Message:</label></td>
						</tr>
					</table>
								
					<textarea name='message' rows='15' cols='40'>
					</textarea><br />
					
					<input type='submit' value='Send' style='width:100px;'/>
				</form>
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

