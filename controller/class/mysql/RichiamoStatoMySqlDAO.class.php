<?php
/**
 * Class that operate on table 'richiamoStato'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class RichiamoStatoMySqlDAO implements RichiamoStatoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RichiamoStatoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM richiamoStato WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM richiamoStato';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM richiamoStato ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param richiamoStato primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM richiamoStato WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RichiamoStatoMySql richiamoStato
 	 */
	public function insert($richiamoStato){
		$sql = 'INSERT INTO richiamoStato (stato, ordine, isVisibile) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($richiamoStato->stato);
		$sqlQuery->setNumber($richiamoStato->ordine);
		$sqlQuery->setNumber($richiamoStato->isVisibile);

		$id = $this->executeInsert($sqlQuery);	
		$richiamoStato->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RichiamoStatoMySql richiamoStato
 	 */
	public function update($richiamoStato){
		$sql = 'UPDATE richiamoStato SET stato = ?, ordine = ?, isVisibile = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($richiamoStato->stato);
		$sqlQuery->setNumber($richiamoStato->ordine);
		$sqlQuery->setNumber($richiamoStato->isVisibile);

		$sqlQuery->setNumber($richiamoStato->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM richiamoStato';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByStato($value){
		$sql = 'SELECT * FROM richiamoStato WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdine($value){
		$sql = 'SELECT * FROM richiamoStato WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsVisibile($value){
		$sql = 'SELECT * FROM richiamoStato WHERE isVisibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByStato($value){
		$sql = 'DELETE FROM richiamoStato WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdine($value){
		$sql = 'DELETE FROM richiamoStato WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsVisibile($value){
		$sql = 'DELETE FROM richiamoStato WHERE isVisibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RichiamoStatoMySql 
	 */
	protected function readRow($row){
		$richiamoStato = new RichiamoStato();
		
		$richiamoStato->id = $row['id'];
		$richiamoStato->stato = $row['stato'];
		$richiamoStato->ordine = $row['ordine'];
		$richiamoStato->isVisibile = $row['isVisibile'];

		return $richiamoStato;
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
	 * @return RichiamoStatoMySql 
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