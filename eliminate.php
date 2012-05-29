<html>
	<head>
		<title>Gestiune ATM</title>
		<link rel="stylesheet" type="text/css" href="my_style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="/jsdatepick-calendar/jsDatePick_ltr.min.css" />
		<script type="text/javascript" src="/jsdatepick-calendar/jsDatePick.min.1.3.js"></script>
		<script type="text/javascript">
			window.onload = function()
			{
				new JsDatePick({
					useMode:2,
					target:"myCalendar",
					dateFormat:"%Y-%m-%d"
				});
			};
		</script>
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
				<form action="eliminate2.php" method="post">
					<table style="width: 300px">
						<tr>
							<td style="width: 50%"><label>Name:</label></td>
							<td style="width: 50%"><input type="text" name="product_name"/></td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>Unitate de masura:</label></td>
							<td style="width: 50%">
								<select name="um">
									<option value="kg">Kg</option>
									<option value="m">Metri</option>
									<option value="ml">Metri liniari</option>
									<option value="mc">Metri cubi</option>
									<option value="buc" selected="selected">Buc</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>Numar:</label></td>
							<td style="width: 50%"><input type="text" name="nr_buc"/></td>
						</tr>
						
						<tr>
							<td style="width: 50%"><label>Data:</label></td>
							<td style="width: 50%"><input type="text" name="data" id="myCalendar"/></td>
						</tr>
					</table>
					
					<input type="submit" value="Preda" style="width:100px;"/>
				</form>	
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

