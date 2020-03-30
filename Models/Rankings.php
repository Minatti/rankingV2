<?php
namespace Models;

use \Core\Model;

class Rankings extends Model {



	public function getAll(){

		$list = array();

		$sql = 
		"
			SELECT  w.[name] as carteira 
					,p.[name] as produto
					,r.[file] as arquivo
					,r.[position] as posicao
					,r.[quartil] as quartil
					,r.[month] as mes
					,r.[year] as ano
			FROM rankings as r
			join wallets as w on r.id_wallet = w.id
			join products as p on w.id = p.id_wallet


		";
		$sql = $this->db->query($sql);


		if ($sql->rowcount() === -1) 
		{
				
				$list = $sql->fetchAll(\PDO::FETCH_ASSOC);
				
		} else {
		
				return false;
		}


				return $list;

	}


	
}