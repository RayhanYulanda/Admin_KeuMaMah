<?php
  session_start();
   
  if(!isset($_SESSION['id_admin'])){
  header("location:index.php");
  }
?>


			<?php
				require_once "objek.php";
				$id = $_GET['id'];		
				$bio_ustadz = new biodata_ustadz($id);
			?>

<!--mulai modal-->
  <div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
        </div>

        <div class="modal-body">
        	<form action="aturustadz_edit_simpan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="foto">Ganti Foto Profil</label><br>
     				<?php echo "<img src='img/ustadz/".$bio_ustadz->foto."' width='100px' height='100px'/>"; ?>
					<br><input type="file" name="foto" />
                </div>
				<?php // ini jika tidak ada dimasukkan foto
					if($bio_ustadz->foto != ""){
						echo"<input type='hidden' name='nama_foto' value='$bio_ustadz->foto'>";
					}
				?>
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="nama">Nama</label>
     				<input type="text" name="nama"  class="form-control" value="<?php echo $bio_ustadz->nama; ?>"/>
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="password">Password</label>
     				<input type="password" name="password"  class="form-control" value="<?php echo $bio_ustadz->password; ?>"/>
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="nohp">No. HP</label>
     				<input type="text" name="nohp"  class="form-control" value="<?php echo $bio_ustadz->nohp; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="email">Email</label>
     				<input type="text" name="email"  class="form-control" value="<?php echo $bio_ustadz->email; ?>"/>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

            </div>

           
        </div>
    </div>
  
</div>