
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to products page</a> 
<form method="post" action="index.php?page=cart"> 
     
	<table> 
	     
		<tr> 
		    <th>Name</th> 
		    <th>Quantity</th> 
		    <th>Price</th> 
		    <th>Items Price</th> 
		</tr> 
		 
		<?php 
		 
			$sql="SELECT * FROM Comida WHERE IdComida IN ("; 
					 
					foreach($_SESSION['NombreUsuario'] as $id => $value) { 
						$sql.=$id.","; 
					} 
					 
					$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
					$query=mysql_query($sql); 
					$totalprice=0; 
					while($row=mysql_fetch_array($query)){ 
						$subtotal=$_SESSION['Nombreusuario'][$row['IdComida']]['quantity']*$row['price']; 
						$totalprice+=$subtotal; 
					?> 
						<tr> 
						    <td><?php echo $row['Nombre'] ?></td> 
						    <td><input type="text" name="quantity[<?php echo $row['IdComida'] ?>]" size="5" value="<?php echo $_SESSION['NombreUsuario'][$row['IdComida']]['quantity'] ?>" /></td> 
						    <td><?php echo $row['price'] ?>$</td> 
						    <td><?php echo $_SESSION['cart'][$row['IdComida']]['quantity']*$row['price'] ?>$</td> 
						</tr> 
					<?php 
						 
					} 
		?> 
					<tr> 
					    <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
					</tr> 
		 
	</table> 
	<br /> 
	<button type="submit" name="submit">Update Cart</button> 
</form> 
<br /> 
<p>To remove an item, set it's quantity to 0. </p>
