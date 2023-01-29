
<?php 
	include 'model.php';
	$read_id = $_POST['read_id'];
	$model = new Model();
	$row = $model->read($read_id);

	if (!empty($row)) {?>
		<p>Cihaz - <?php echo $row['cihaz']; ?></p>
		<p>Arızası - <?php echo $row['ariza']; ?></p>
	<?php
	}
?>