<?php

/**
 * Customer Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Customer
{

	use Model;

	protected $table = 'customers';
	protected $primaryKey = 'id'; 


	protected $allowedColumns = [
		'user_id',
		'dob',
		'address',
		'city',
		'province',
		'postal_code',
		'country',
		'status',
		'created_by',
		'updated_by',
		'date_updated',
	];

	public function validate($post_data, $id = null)
	{
		$this->errors = [];

		if (empty($post_data['user_id'])) {
			$this->errors['user_id'] = "** Please select customer **";
		}
		if (empty($post_data['dob'])) {
			$this->errors['dob'] = "** Date of birth is required **";
		}
		if (empty($post_data['address'])) {
			$this->errors['address'] = "** Address is required **";
		}
		if (empty($post_data['city'])) {
			$this->errors['city'] = "** City is required **";
		}
		if (empty($post_data['province'])) {
			$this->errors['province'] = "** Province is required **";
		}
		if (empty($post_data['country'])) {
			$this->errors['country'] = "** Country is required **";
		}
		if (empty($post_data['status'])) {
			$this->errors['status'] = "** Status is required **";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function customersWithUsersDetails()
	{
		$sql = "SELECT u.*, c.*
				FROM users u
				JOIN customers c ON u.user_id = c.user_id
				ORDER BY date_created ASC";
		$result = $this->query($sql);
		if($result)
		{
			return $result;
		}
	}

	public function customerProfile($id)
	{
		$sql = "SELECT c.*, u.*
				FROM customers c
				JOIN users u ON u.user_id = c.user_id
				WHERE c.user_id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);

		$result = $stmt->fetch(PDO::FETCH_OBJ);

		if($result)
		{
			return $result;
		}
	}

	public function numCustomers()
	{
		$sql = "SELECT COUNT(*) FROM customers";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();

		return $result;
	}
}
