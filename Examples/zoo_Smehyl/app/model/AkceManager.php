<?php

namespace App\Model;

use Nette;


/**
 * Users management.
 */
class AkceManager 
{
	use Nette\SmartObject;

	const
		TABLE_NAME = 'event',
		COLUMN_ID = 'id',
		COLUMN_DATE = 'date',
		COLUMN_TIME = 'time',
		COLUMN_SUMMARY = 'summary',
		COLUMN_DESCRIPTION= 'description',
                COLUMN_VISITORS= 'visitors',
                COLUMN_TYPE= 'type';


	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

        
        public function create($data){
            $this->database->table(self::TABLE_NAME)
                    ->insert($data);
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
        
        public function update($id,$data){
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
