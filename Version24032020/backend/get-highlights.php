<?php
	session_start();
	
	$HK = $_GET["main"];
	$NK = $_GET["sub"];
	
	//Datenbankverbindung herstellen:
	$link = mysqli_connect("localhost","web26762838","mlVIPbDT");
	mysqli_select_db($link, "usr_web26762838_1");
	$sql = "SELECT * FROM highlights INNER JOIN kategorien ON highlights.h_id = kategorien.highlight_fk
						WHERE hauptkategorie = '". utf8_decode($HK) ."' AND nebenkategorie = '". utf8_decode($NK) ."' ;";
			
			
	$res=mysqli_query($link, $sql);
	
	$row = mysqli_fetch_array($res); 
		
	if(mysqli_num_rows($res)==0){
			
	}
	else{ ?>
		<table>
			<tr>
			<?php
				if($row["Heins"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Heins"]);?><input type="text" name="Hione" class="hegb" form="form" required />
					</td>
			<?php } else{?>
					<input type='hidden' name="Hione" form="form" value="Null">
			<?php	
			}
			?>
			<?php
				if($row["Hzwei"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hzwei"]);?><input type="text" name="Hitwo" class="hegb" form="form" required />
					</td>
			<?php }else{?>
					<input type='hidden' name="Hitwo" form="form" value="Null">
			<?php
			}
			?>
			</tr>
			<tr>
			<?php
				if($row["Hdrei"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hdrei"]);?><input type="text" name="Hithree" class="hegb" form="form" required />
					</td>
			<?php }else{?>
					<input type='hidden' name="Hithree" form="form" value="Null">
			<?php 
			}
			?>
			<?php
				if($row["Hvier"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hvier"]);?><input type="text" name="Hifour" class="hegb" form="form" required />
					</td>
			<?php } else{?>
					<input type='hidden' name="Hifour" form="form" value="Null">
			<?php 
			}
			?>
			</tr>
			<tr>
			<?php
				if($row["Hfuenf"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hfunf"]);?><input type="text" name="Hifive" class="hegb" form="form" required >
					</td>
			<?php } else{?>
					<input type='hidden' name="Hifive" form="form" value="Null">
			<?php 
			}
			?>
			<?php
				if($row["Hsechs"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hsechs"]);?><input type="text" name="Hisix" class="hegb" form="form" required >
					</td>
			<?php } else{?>
					<input type='hidden' name="Hisix" form="form" value="Null">
			<?php 
			}
			?>
			</tr>
			<tr>
			<?php
				if($row["Hsieben"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hsieben"]);?><input type="text" name="Hiseven" class="hegb" form="form" required />
					</td>
			<?php } else{?>
					<input type='hidden' name="Hiseven" form="form" value="Null">
			<?php 
			}
			?>
			<?php
				if($row["Hacht"]!=null){ ?>
					<td>
						<?php echo utf8_encode($row["Hacht"]);?><input type="text" name="Hieight" class="hegb" form="form" required />
					</td>
			<?php } else{?>
					<input type="hidden" name="Hieight" form="form" value="Null">
			<?php 
			}
			?>
			</tr>
		</table>
	<?php
	}	

?>

