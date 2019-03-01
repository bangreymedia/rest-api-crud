<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=localhost", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM tb_siswa ORDER BY idsiswa";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["first_name"]))
		{
			$form_data = array(
				':first_name'		=>	$_POST["first_name"],
				':last_name'		=>	$_POST["last_name"]
			);
			$query = "
			INSERT INTO tb_siswa 
			(nama_depan, nama_belakang) VALUES 
			(:first_name, :last_name)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM tb_siswa WHERE idsiswa='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['first_name'] = $row['nama_depan'];
				$data['last_name'] = $row['nama_belakang'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["first_name"]))
		{
			$form_data = array(
				':first_name'	=>	$_POST['first_name'],
				':last_name'	=>	$_POST['last_name'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE tb_siswa 
			SET nama_depan = :first_name, nama_belakang = :last_name 
			WHERE idsiswa = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM tb_siswa WHERE idsiswa = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>