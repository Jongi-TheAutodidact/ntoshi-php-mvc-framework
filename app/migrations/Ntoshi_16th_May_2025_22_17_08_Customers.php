<?php

/**
 * Customers Model class
 */

defined('ROOTPATH') or exit('Access Denied!');

class Customers extends Migration
{

    public function alpha()
    {
        /** Add table columns (default columns hereunder) **/

		$this->addColumn('id int(11) NOT NULL AUTO_INCREMENT');
		$this->addColumn('user_id int(11) NOT NULL');
		$this->addColumn('dob date NOT NULL');
		$this->addColumn('address varchar(50) NOT NULL');
		$this->addColumn('city varchar(20) NOT NULL');
		$this->addColumn('province varchar(20) NOT NULL');
		$this->addColumn('postal_code int(11)');
		$this->addColumn('country varchar(20) NOT NULL');
		$this->addColumn('status varchar(10) NOT NULL');
		
		$this->addColumn('created_by varchar(30) NULL');
		$this->addColumn('updated_by varchar(30) NULL');
		
		$this->addColumn('date_created datetime default current_timestamp()');
		$this->addColumn('date_updated datetime NULL');
		// Primary Key 
		$this->addPrimaryKey('id');
		
		# You may add/list your table's keys and unique keys below
		# Indexing
		$this->addKey('user_id');
		$this->addKey('address');
		$this->addKey('city');
		$this->addKey('province');
		$this->addKey('postal_code');
		$this->addKey('status');

		// Create Table
		$this->createTable('customers');
    }

    public function omega()
    {
        $this->dropTable('customers');
    }
}
