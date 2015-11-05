<?php 
	include "header.php";
?>
<?php include "sidebar.php"; ?>
<div class="col-md-9">
<h3>Login</h3>

<?php 
  	@$empty = $_GET['empty'];
  	if($empty=="username"){
  		echo "<label><span style='color: red;'>username belum diisi</span></label>";
  	}
  	elseif ($empty=="password"){
  		echo "<label><span style='color: red;'>password belum diisi</span></label>";
  	}
  	$nopass = $_GET['nopass'];
  	if ($nopass==true) {
  		echo "<label><span style='color: red;'>password salah</span></label>";
  	}
  ?>

    <form action="whisper.php" method="POST">
    <div class="tbl-no-border data-diri">
    <table id="left" border="0">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
    <tr>
        <td><label>Username</label></td>
        <td>:</td>
        <td><input type="text" name="amburegul"  autofocus="autofocus"/></td>
    </tr>
    <tr>
        <td><label>Password</label></td>
        <td>:</td>
        <td><input type="text" name="amesiyu"/></td>
    </tr>
    </tr>
        <tr>
        <td colspan="3"><input type="submit" value="Login" name="submit" /></td>
    </tr>
    </table>
    </div>
	
    </form>    
</div>
</div>

<?php 
	include "footer.php";
?>