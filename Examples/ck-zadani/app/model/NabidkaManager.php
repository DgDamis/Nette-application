<?php

namespace App\Model;

use Nette;


/**
 * Users management.
 */
class NabidkaManager
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'nabidka',
		COLUMN_ID = 'id',
		COLUMN_DESTINACE = 'destinace',
		COLUMN_POPIS = 'popis',
		COLUMN_CENA = 'cena',
		COLUMN_DATUM = 'datum',
		COLUMN_DELKA = 'delka',
		COLUMN_DOPRAVA = 'doprava';


	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function readAll($order){
		return $this->database->table(self::TABLE_NAME)
                                        ->order($order)
					->fetchAll();
	}

	public function readByID($id){
		return $this->database->table(self::TABLE_NAME)
                                        ->get($id);
	}
        
        public function create($data){
		 $this->database->table(self::TABLE_NAME)
                                        ->insert($data);
	}
        
        public function update($id, $data){
		 $this->database->table(self::TABLE_NAME)
                                        ->get($id)
                                        ->update($data);
	}
        
        public function delete($id){
		 $this->database->table(self::TABLE_NAME)
                                        ->get($id)
                                        ->delete();
	}
        


}
