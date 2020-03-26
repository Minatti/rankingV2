<?php
namespace Models;

use \Core\Model;

class Wallets extends Model {


	
	// list all data of wallets //
	public function getAll()
	{
		$list = array();

		$sql = "SELECT wallets.*
						,(select count(products.id)
						  from products
						  where  products.id_wallet = wallets.id) as total_products
  				FROM wallets";

  		$sql = $this->db->query($sql);


  		if ($sql->rowCount() === -1) 
  		{
  			$list = $sql->fetchAll(\PDO::FETCH_ASSOC);
  			//print_r($sql);
  			//exit;
  		}

		return $list;

	}


	public function getName($id)
	{
		
		$sql = "SELECT name FROM wallets WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();


		if ($sql->rowcount() === -1) {
					
				$data = $sql->fetch();

				return $data['name'];

			}	
	}

	// STARTED CRUD //
	

	public function insertWallet($name)
	{

		$sql = "INSERT INTO wallets (name) 
				VALUES (:name)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->execute();

		return $this->db->lastInsertId();

	}


	public function alterNamebyId($new_name, $id)
	{
		$sql = "UPDATE wallets SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $new_name);
		$sql->bindValue(':id', $id);
		$sql->execute();

	}

	public function deleteWalletEmptyProduct($id)
	{
		$sql = "DELETE FROM wallets
				WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		//print_r($sql);
		//exit;		
	}			

	// EXIT CRUD //
}