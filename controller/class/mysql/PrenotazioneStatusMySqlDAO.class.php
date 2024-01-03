<?php
/**
 * Class that operate on table 'prenotazioneStatus'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PrenotazioneStatusMySqlDAO implements PrenotazioneStatusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrenotazioneStatusMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prenotazioneStatus WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prenotazioneStatus';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prenotazioneStatus ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prenotazioneStatu primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prenotazioneStatus WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioneStatusMySql prenotazioneStatu
 	 */
	public function insert($prenotazioneStatu){
		$sql = 'INSERT INTO prenotazioneStatus (status) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prenotazioneStatu->status);

		$id = $this->executeInsert($sqlQuery);	
		$prenotazioneStatu->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioneStatusMySql prenotazioneStatu
 	 */
	public function update($prenotazioneStatu){
		$sql = 'UPDATE prenotazioneStatus SET status = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prenotazioneStatu->status);

		$sqlQuery->setNumber($prenotazioneStatu->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prenotazioneStatus';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM prenotazioneStatus WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStatus($value){
		$sql = 'DELETE FROM prenotazioneStatus WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrenotazioneStatusMySql 
	 */
	protected function readRow($row){
		$prenotazioneStatu = new PrenotazioneStatu();
		
		$prenotazioneStatu->id = $row['id'];
		$prenotazioneStatu->status = $row['status'];

		return $prenotazioneStatu;
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
	 * @return PrenotazioneStatusMySql 
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