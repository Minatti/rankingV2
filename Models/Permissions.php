<?php
namespace Models;

use \Core\Model;

class Permissions extends Model {

	public function getPermissionGroupName($id_permission) {

		$sql = "SELECT name FROM permission_groups WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id_permission);
		$sql->execute();

		if ($sql->rowCount() === -1) {
			$data = $sql->fetch();

			return $data['name'];

		} else {
			return '';
		}
	}

	public function getPermission($id_permission){
		$array = array();
		//list permissions
		$sql = "SELECT id_permission_item FROM permission_links WHERE id_permission_group = :id_permission";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_permission', $id_permission);
		$sql->execute();



		if ($sql->rowCount() <> 0) {
			$data = $sql->fetchAll();
			$ids = array();

			foreach ($data as $data_item) {
				$ids[] = $data_item['id_permission_item'];
				//print_r($ids);
			}

			$sql = "SELECT slug FROM permission_items WHERE id IN(".implode(',', $ids).")";
			$sql = $this->db->query($sql);

			if ($sql->rowCount() <> 0) {
				$data = $sql->fetchAll();

				foreach ($data as $data_item) {
					$array[] = $data_item['slug'];
					//print_r($array);
				}
			}
		}

		return $array;
	}

	public function getAllGroups() {
		$array = array();


		$sql = 	"SELECT permission_groups.*
				,(select count(users.id) 
				  from users 
				  where users.id_permission = permission_groups.id) as total_users 
			    FROM permission_groups";
		$sql = $this->db->query($sql);


		if ($sql->rowCount() <> 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function alterNamebyId($new_name, $id){
		$sql = "UPDATE permission_groups SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $new_name);
		$sql->bindValue(':id', $id);
		$sql->execute();

	}		

	public function clearLinks($id){
		$sql = "DELETE FROM permission_links WHERE id_permission_group = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function getAllItems() {
		$this->arrInfo = array();

		$sql = "SELECT * FROM permission_items";
		$sql = $this->db->query($sql);


		if ($sql->rowCount() <> 0) {
			$this->arrInfo = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $this->arrInfo;
	}	


	public function deleteGroup($id_group) {
		// é excluido os items que não possuem nenhum usuário ativo;

		$sql = "SELECT id FROM users WHERE id_permission = id:group";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_group', $id_group);
		$sql->execute();

	
		if ($sql->rowCount() === 0) {

			$sql = "DELETE FROM permission_links WHERE id_permission_group = :id_group";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_group', $id_group);
			$sql->execute();

			$sql = "DELETE FROM permission_groups WHERE id = :id_group";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_group', $id_group);
			$sql->execute();			
			
		}
		
	}


	public function deletePermissionItemByAdmin($id){
		if(!empty($id)){			
			if($id === 1) {

				$sql = "SELECT id from permissions_items WHERE id = :id";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id', $id);
				$sql->execute();

			if ($sql->rowCount() > 0) {
				
				$sql = "DELETE FROM permission_items WHERE id = :id)";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id', $id);
				$sql->execute();
			}

		}


	}

}

	/** OPERATORS FOR DATABASE */

	public function addGroup($name) {
		$sql = "INSERT INTO permission_groups (name)
				VALUES (:name)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->execute();

		return $this->db->lastInsertId();
	}

	public function addItem($name, $slug) {
		$sql = "INSERT INTO permission_items (name, slug)
				VALUES (:name, :slug)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':slug', $slug);
		$sql->execute();

		return $this->db->lastInsertId();
	}	


	public function linkGroupToItem($id_group, $id_item){
		$sql = "INSERT INTO permission_links (id_permission_group, id_permission_item)
				VALUES (:id_group, :id_item)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_group', $id_group);
		$sql->bindValue(':id_item', $id_item);
		$sql->execute();

		
	}



}