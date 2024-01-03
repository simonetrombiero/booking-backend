<?php
/**
 * Class that operate on table 'documento_item'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DocumentoItemMySqlDAO implements DocumentoItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentoItemMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM documento_item WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM documento_item';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM documento_item ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param documentoItem primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM documento_item WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentoItemMySql documentoItem
 	 */
	public function insert($documentoItem){
		$sql = 'INSERT INTO documento_item (idDocumento, idItem) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentoItem->idDocumento);
		$sqlQuery->setNumber($documentoItem->idItem);

		$id = $this->executeInsert($sqlQuery);	
		$documentoItem->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentoItemMySql documentoItem
 	 */
	public function update($documentoItem){
		$sql = 'UPDATE documento_item SET idDocumento = ?, idItem = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentoItem->idDocumento);
		$sqlQuery->setNumber($documentoItem->idItem);

		$sqlQuery->setNumber($documentoItem->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM documento_item';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdDocumento($value){
		$sql = 'SELECT * FROM documento_item WHERE idDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdItem($value){
		$sql = 'SELECT * FROM documento_item WHERE idItem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdDocumento($value){
		$sql = 'DELETE FROM documento_item WHERE idDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdItem($value){
		$sql = 'DELETE FROM documento_item WHERE idItem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentoItemMySql 
	 */
	protected function readRow($row){
		$documentoItem = new DocumentoItem();
		
		$documentoItem->id = $row['id'];
		$documentoItem->idDocumento = $row['idDocumento'];
		$documentoItem->idItem = $row['idItem'];

		return $documentoItem;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return DocumentoItemMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>