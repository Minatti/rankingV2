<?php
namespace Models;

use \Core\Model;

class Products extends Model {

	public function getListProducts($id_wallet){


			$products = array();

			$sql = "SELECT * FROM products WHERE id_wallet = :id_wallet";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_wallet', $id_wallet);
			$sql->execute();


			if ($sql->rowCount() === -1) {
				
				$products = $sql->fetchAll(\PDO::FETCH_ASSOC);
			}


			return $products;
		
	}
		
	public function countProductsInWallet()
	{
		$list = array();

		$sql = "SELECT products.*
						,(select count(wallets.id)
						  from wallets
						  where  wallets.id = products.id_wallet) as total_wallets
  				FROM products";

  		$sql = $this->db->query($sql);


  		if ($sql->rowCount() === -1) 
  		{
  			$list = $sql->fetchAll(\PDO::FETCH_ASSOC);

  			//print_r($sql);
  			//exit;
  		}

		return $list;

	}


	// Relationship entry wallet.products *-/
	public function getRelationship(){

		$data = array();

		$sql = "SELECT
						  w.name as wallet
	   					 ,p.name as product
				FROM wallets as w 
				INNER JOIN products AS p ON w.id = p.id_wallet";

		$sql = $this->db->query($sql);		


		if ($sql->rowCount() === -1) {
			
			$data = $sql->fetchAll(\PDO::FETCH_ASSOC);

		}

		return $data;
	}



	public function insertProduct($name, $id){

		$sql = "INSERT INTO products (name, id_wallet)
		        VALUES (:name, :id)";

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':id', $id);
		$sql->execute();

		//print_r($sql);
		//exit;

		return $this->db->lastInsertId();

	}


	

}