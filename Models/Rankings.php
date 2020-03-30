<?php
namespace Models;

use \Core\Model;

class Rankings extends Model {


	public function getAll(){

		$list = array();

		$sql = 
		"
			SELECT  
				 w.name as carteira
				,p.name as produto
				,r.files as arquivo
				,r.position as posicao
				,r.quartil as quartil
				,r.month as mes
				,r.year as ano
				FROM rankings as r
				INNER JOIN wallets as w on w.id = r.id_wallet
				INNER JOIN products as p on r.id_product = p.id

		";
		$sql = $this->db->query($sql);


		if ($sql->rowCount() <> 0) 
		{
				
				$list = $sql->fetchAll(\PDO::FETCH_ASSOC);
				
		} else {
		
				return false;
		}


			return $list;

	}


	public function add($id_wallet, $id_product, $files, $position, $quartil, $month, $year){

		$allowed_files = array(
			'text/plain',
			'application/pdf',
			'application/octet-stream',
		);


		for ($q=0; $q < count($files['name']) ; $q++) { 

			$files = $files['name'][$q];
			$tmp_name = $files['tmp_name'][$q];
			$type = $files['type'][$q];
			$size =  $files['size'][$q];



			if (in_array($type, $allowed_files) && $size > 0) {
				
				move_uploaded_file($tmp_name, PATH_UPLOAD.$files);

				
				return $files;

			}
		}		
		
		// insert valores
		
		$sql = "INSERT INTO rankings (id_wallet, id_product, files, position, quartil, month, year)
				VALUES (:id_wallet, :id_product, :files, :position, :quartil,  :month, :year)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_wallet', $id_wallet);
		$sql->bindValue(':id_product', $id_product);
		$sql->bindValue(':files', $files);
		$sql->bindValue(':position', $position);
		$sql->bindValue(':quartil', $quartil);
		$sql->bindValue(':month', $month);
		$sql->bindValue(':year', $year);
		$sql->execute();


		return $this->db->lastInsertId();
				

	}

}	