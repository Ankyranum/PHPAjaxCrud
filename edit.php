<?php
	include 'model.php';

	$edit_id = $_POST['edit_id'];

	$model = new Model();

	$row = $model->edit($edit_id);

	if (!empty($row)) { ?>
		
		<form action="" method="post" id="form">
	        <div>
	        	<input type="hidden" id="edit_id" value="<?php echo $row['id'];?>">
	        </div>
	        <div class="form-group">
	            <label for="">Cihaz</label><br>
	            <input type="text" id="edit_title" class="form-group" value="<?php echo $row['cihaz'];?>">
	        </div>
	        <div class="form-group">
	            <label for="">Arızası</label>
	            <input type="text" name="descrption" id="edit_descrption" class="form-control" value="<?php echo $row['ariza'];?>"/>	            	
	        </div>
	    </form>

	<?php
	}
 ?>