<?php
	

	include 'model.php';
	$model = new Model();
	$rows = $model->fetch();
	

?>

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cihaz</th>
			<th>Arızası</th>
			<th>İşlemler</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$i = 1;
			if (!empty($rows)) {
				foreach ($rows as $row) { ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['cihaz']; ?></td>
						<td><?php echo $row['ariza'];  ?></td>
						<td>
							<a href="#" class="badge badge-info" id="read" value="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-book-open"></i> Oku</a>
							<a href="#" class="badge badge-danger" id="del" value="<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i> Sil</a>
							<a href="#" class="badge badge-warning" id="edit" value="<?php echo $row['id']; ?>"  data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-edit"></i> Düzenle</a>
						</td>
					</tr>

			<?php
				}
			}else{
				echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>Kayıtlı arıza bulunmamaktadır.</strong> 
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>
				";
			}
		?>
	</tbody>
</table>
