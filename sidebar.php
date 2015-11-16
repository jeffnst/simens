<div class="col-md-3" id="leftCol">
              	
	<div class="well"> 
        <div class="search-form">
            <form action="pegawai.php" method="GET">
            <div class="tbl-no-border search">
            <table id="left" border="0">
            <tr>
            
            <?php
                $pegawais = getNamaPegawai();
                //var_dump($pegawais);
            ?>
                <td>
                    <input type="text" name="search" placeholder="Nama / NIP"  id="srch" list="datalist1"/>
                    <datalist id="datalist1">
                    <?php
                    foreach($pegawais as $row):
                    ?>
                      <option value="<?php echo $row['nip_peg']; ?>">
                      <option value="<?php echo $row['nama_lengkap']; ?>">
                    <?php
                    endforeach;
                    ?>
                    </datalist>
                </td>
                <td><input type="submit" value="Cari" name="submit" /></td>
            </tr>
            </table>
            </div>
        	
            </form>
        </div>
        <?php if(!isset($_SESSION['username'])){?>
        <div class="login-form">
            <form action="whisper.php" method="POST">
            <div class="tbl-no-border login">
            <table id="left" border="0">
            <tr>
                <td><label>Username :</label></td>
                <td><input type="text" name="amburegul"/></td>
            </tr>
            <tr>
                <td><label>Password :</label></td>
                <td><input type="password" name="amesiyu"/></td>
            </tr>
            </tr>
                <tr>
                <td colspan="2"><input type="submit" value="Login" name="submit" /></td>
            </tr>
            </table>
            </div>
        	
            </form>
            <?php
            if (isset($_GET['nopass'])&&$_GET['nopass']==true) {
          		echo "<div><span style='color:red;'></span></div>";
          	}
            ?>
            
        </div>
        <?php } ?>
	</div>

</div>  