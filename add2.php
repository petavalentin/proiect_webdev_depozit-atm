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
				<?php
					if(!filter_var($_REQUEST['nr_buc'], FILTER_VALIDATE_INT))    //numar bucati incorect
					{
						echo '
							<form action="add2.php" method="post">
								<table style="width: 300px">
									<tr>
										<td style="width: 50%"><label>Name:</label></td>
										<td style="width: 50%"><input type="text" name="product_name" value="' . $_REQUEST['product_name'] . '"/></td>
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
										<td style="width: 50%"><input type="text" name="nr_buc" value="' . $_REQUEST['nr_buc'] . '"/></td>
									</tr>
									
									<tr>
										<td style="width: 50%"><label>Pret:</label></td>
										<td style="width: 50%"><input type="text" name="pret" value="' . $_REQUEST['pret'] . '"/></td>
									</tr>
									
									<tr>
										<td style="width: 50%"><label>Data:</label></td>
										<td style="width: 50%"><input type="text" name="data" id="myCalendar"/></td>
									</tr>
								</table>
								
								<input type="submit" value="Adauga" style="width:100px;"/>
							</form>	
							';
						
						echo '<script type="text/javascript">
								alert("Numar  introdus incorect!");
							   </script>';
					}
					else
						if(!filter_var($_REQUEST['pret'], FILTER_VALIDATE_INT))  //pret incorect
						{						
							echo '
								<form action="add2.php" method="post">
									<table style="width: 300px">
										<tr>
											<td style="width: 50%"><label>Name:</label></td>
											<td style="width: 50%"><input type="text" name="product_name" value="' . $_REQUEST['product_name'] . '"/></td>
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
											<td style="width: 50%"><input type="text" name="nr_buc" value="' . $_REQUEST['nr_buc'] . '"/></td>
										</tr>
										
										<tr>
											<td style="width: 50%"><label>Pret:</label></td>
											<td style="width: 50%"><input type="text" name="pret" value="' . $_REQUEST['pret'] . '"/></td>
										</tr>
										
										<tr>
											<td style="width: 50%"><label>Data:</label></td>
											<td style="width: 50%"><input type="text" name="data" id="myCalendar"/></td>
										</tr>
									</table>
									
									<input type="submit" value="Adauga" style="width:100px;"/>
								</form>	
								';
						
							echo '<script type="text/javascript">
									alert("Pret introdus incorect!");
								   </script>';
						}
						else   //inserare in baza de date
						{
							$con = mysql_connect("localhost", "root");
							if (!$con)
							{
								die('Could not connect: ' . mysql_error());
							}

							mysql_select_db("atm", $con);
							
							//verificare daca exista produsul curent in baza de date
							$result = mysql_query("select * from produs
											      where nume='" . $_REQUEST['product_name'] . "'");
							
							$num_rows = mysql_num_rows($result);	
							if($num_rows == 0)   //NU exista inregistrarea in baza de date => introducere inregistrare in baza de date
							{
								mysql_query("INSERT INTO produs (nume, um, numar, pret)
											 VALUES ('" . $_REQUEST['product_name'] . "', '" . $_REQUEST['um'] . "', " . $_REQUEST['nr_buc'] . ", " . $_REQUEST['pret'] . ")");
								
								mysql_query("INSERT INTO log_produs (categorie, nume, um, bucati, pret, data)
											 VALUES (1, '" . $_REQUEST['product_name'] . "', '" . $_REQUEST['um'] . "', " . $_REQUEST['nr_buc'] . ", " . $_REQUEST['pret'] . ", '" . $_REQUEST['data'] . "')");
							    																
								
								echo '
									<form action="add2.php" method="post">
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
												<td style="width: 50%"><label>Pret:</label></td>
												<td style="width: 50%"><input type="text" name="pret"/></td>
											</tr>
											
											<tr>
												<td style="width: 50%"><label>Data:</label></td>
												<td style="width: 50%"><input type="text" name="data" id="myCalendar"/></td>
											</tr>
										</table>
										
										<input type="submit" value="Adauga" style="width:100px;"/>
									</form>	
									';
								
								
								echo '<script type="text/javascript">
										alert("Produsul a fost inserat cu succes in baza de date!");
									   </script>';
							}
							else   //inregistrarea exista
							{
								//PAS 1: update informatii pentru tabela 'produs'
								//gasire numar bucati din produsul curent
								$nrb_result = mysql_query("select * from produs
													   where nume='" . $_REQUEST['product_name'] . "'");
								
								$nrb_row = mysql_fetch_array($nrb_result);
								$nrb = $nrb_row['numar'];
								
								//adunare numar bucati produs curent cu numar bucati inserate
								$nrb += $_REQUEST['nr_buc'];
								
								//updatarea propriu-zisa a tabelei
								mysql_query("UPDATE produs
											 SET um = '" . $_REQUEST['um'] . "', numar = " . $nrb . ", pret = " . $_REQUEST['pret'] . "
											 WHERE nume = '" . $_REQUEST['product_name'] . "'");
									
									
								//PAS 2:  inserare inregistrare noua in tabela 'log_produs'
								mysql_query("INSERT INTO log_produs (categorie, nume, um, bucati, pret, data)
											 VALUES (1, '" . $_REQUEST['product_name'] . "', '" . $_REQUEST['um'] . "', " . $_REQUEST['nr_buc'] . ", " . $_REQUEST['pret'] . ", '" . $_REQUEST['data'] . "')");
											
								
								echo '
									<form action="add2.php" method="post">
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
												<td style="width: 50%"><label>Pret:</label></td>
												<td style="width: 50%"><input type="text" name="pret"/></td>
											</tr>
											
											<tr>
												<td style="width: 50%"><label>Data:</label></td>
												<td style="width: 50%"><input type="text" name="data" id="myCalendar"/></td>
											</tr>
										</table>
										
										<input type="submit" value="Adauga" style="width:100px;"/>
									</form>	
									';
								
								
								echo '<script type="text/javascript">
										alert("Produsul a fost inserat cu succes in baza de date!");
									   </script>';			 
							}							
							
							mysql_close($con);
						}
				?> 
			</div>
			
			<div class="footer">
				Copyright by ATM-Grenoble Team.
			</div>
		</div>
	</body>
</html>

