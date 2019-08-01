<?php
namespace Models;

use \Core\Model;

class Purchases extends Model {

	public function getAll() {
		$array = array();

		$sql = "SELECT 
			purchases_products.id,
			purchases_products.id_purchase,
			purchases_products.id_product,
			purchases_products.quantity,
			purchases_products.product_price,
			purchases.id,
			purchases.id_user,
			purchases.total_amount,
			products.name AS products_name,
			users.id,
			users.name AS users_name
		FROM purchases_products
		LEFT JOIN products ON products.id = purchases_products.id_product 
		LEFT JOIN purchases ON purchases.id = purchases_products.id_purchase
		LEFT JOIN users ON purchases.id_user = users.id";

		$sql = $this->db->prepare($sql);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $array;
	}

	/*if(!empty($id_product)) {

			$sql = "SELECT 
				rates.id, 
				rates.date_rated,
				rates.points,
				rates.comment,
				users.name
			FROM rates 
			LEFT JOIN users ON users.id = rates.id_user 
			WHERE rates.id_product = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id_product);
			$sql->execute();

			if($sql->rowCount() > 0) {
				$array = $sql->fetchAll(\PDO::FETCH_ASSOC);
			}
		}*/
/*
	public function get($id) {
		$sql = "SELECT * FROM brands WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

			if($sql->rowCount() > 0) {
				$array = $sql->fetch(\PDO::FETCH_ASSOC);
			}
			
			return $array;
	}

	public function addBrand($name) {
		$sql = "INSERT INTO brands (name) VALUES (:name)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->execute();
	}

	public function del($id) {

		$sql = "SELECT count(*) as c FROM products WHERE id_brand = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
		$data = $sql->fetch();

		if($data['c'] == '0') {
			$sql = "DELETE FROM brands WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id', $id);
			$sql->execute();
		}
	}

	public function update($name, $id) {
		$sql = "UPDATE brands SET name = :name WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':name', $name);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}*/
}