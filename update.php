
<?php 
include 'model.php';
	if(isset($_POST['update'])) {

		if (isset($_POST['edit_title']) && isset($_POST['edit_descrption']) && isset($_POST['edit_id'])) {

			if (!empty($_POST['edit_title']) && !empty($_POST['edit_descrption']) && !empty($_POST['edit_id'])) {

				$data['edit_id'] = trim($_POST['edit_id']);
				$data['edit_title'] = trim($_POST['edit_title']);
				$data['edit_descrption'] = trim($_POST['edit_descrption']);	
				
				$model = new Model();

				$update = $model->update($data);
			}

			else{
				echo "
					<script>alert('Boş Dosya'); </script>
				";
			}
		
		}

	}

?>