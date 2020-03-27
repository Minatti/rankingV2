<?php
namespace Models;

use \Core\Model;

class Products extends Model {


	
	// Se o meu retorno for maior que 1 eu posso deletar o registro //
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


/*** TESTE

			print_r($data);

			foreach ($data as $values) {
				
				echo "<pre>";
				echo "Carteira: ".$values['wallet'];
				echo "</br>";
				echo "Produto: ". $values['product'];
				echo "</pre>";
			}
			exit;
***/			
		}

		return $data;
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