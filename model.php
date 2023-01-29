<?php 
	Class Model{
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "arizakayit";
		private $conn;

		public function __construct(){
			try {
				$this->conn = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->username, $this->password);
			} catch (PDOException $e) {
				echo "Bağlantı başarsız!" . $e->getMessage();
			}
		}

		public function insert(){
			if(isset($_POST['submit'])) {
				if (isset($_POST['title']) && isset($_POST['descrption'])) {
					if (!empty($_POST['title']) && !empty($_POST['descrption'])) {

						$title = trim($_POST['title']);
						$descrption = trim($_POST['descrption']);	
						$query = "INSERT INTO kayit (cihaz,ariza) VALUES ('$title','$descrption')";				
						if($sql = $this->conn->exec($query)){
							echo "
							<div class='alert alert-success alert-dismissible fade show' role='alert'>
							  <strong>Kayıt Eklendi</strong>
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>
						";

						}else{
							echo "
							<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							  <strong>HATA !!</strong>
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>
						";
						}
					}
					else{
						echo "
							<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							  <strong>HATA !!</strong> boş form gönderilemez
							  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							    <span aria-hidden='true'>&times;</span>
							  </button>
							</div>
						";
					}
				}
			}
			
		}

		public function fetch(){
			$data = null;
			$stmt = $this->conn->prepare("SELECT * FROM kayit");
			$stmt->execute();
			$data = $stmt->fetchAll();
			return $data;
		}

		public function del($del_id){
			$query = "DELETE FROM kayit WHERE id='$del_id' ";
			if($sql = $this->conn->exec($query)) {
				echo "
					<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>Kayıt Silindi</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>
				";
			}else{
				echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>Kayıt Silme Başarısız</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>
				";
			}
		}
		public function read($read_id){
			$data = null;
			$stmt = $this->conn->prepare("SELECT * FROM kayit WHERE id = '$read_id'");
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;

		}
		public function edit($edit_id){
			$data = null;

			$stmt = $this->conn->prepare("SELECT * FROM kayit WHERE id = '$edit_id'");

			$stmt->execute();

			$data = $stmt->fetch();

			return $data;
		}

		public function update($data){
			
			$query = "UPDATE kayit SET cihaz = '$data[edit_title]', ariza = '$data[edit_descrption]' WHERE id ='$data[edit_id]'";

			if ($sql = $this->conn->exec($query)) {
				
				echo "
					<div class='alert alert-success alert-dismissible fade show' role='alert'>
					  <strong>Düzenleme Başarılı</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>

					<script>
						$('#exampleModal1').modal('hide')
					</script>
				";

			}else{

				echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					  <strong>Düzenleme Bşarısız</strong>
					  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					    <span aria-hidden='true'>&times;</span>
					  </button>
					</div>
				";

			}
		}
	}
?>