<?php
/**
 * Class that operate on table 'calendari'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class CalendariMySqlDAO implements CalendariDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CalendariMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM calendari WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM calendari';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM calendari ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param calendari primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM calendari WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CalendariMySql calendari
 	 */
	public function insert($calendari){
		$sql = 'INSERT INTO calendari (calendario, idPostazione, attivo, backgroundColor) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($calendari->calendario);
		$sqlQuery->setNumber($calendari->idPostazione);
		$sqlQuery->setNumber($calendari->attivo);
		$sqlQuery->set($calendari->backgroundColor);

		$id = $this->executeInsert($sqlQuery);	
		$calendari->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CalendariMySql calendari
 	 */
	public function update($calendari){
		$sql = 'UPDATE calendari SET calendario = ?, idPostazione = ?, attivo = ?, backgroundColor = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($calendari->calendario);
		$sqlQuery->setNumber($calendari->idPostazione);
		$sqlQuery->setNumber($calendari->attivo);
		$sqlQuery->set($calendari->backgroundColor);

		$sqlQuery->setNumber($calendari->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM calendari';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCalendario($value){
		$sql = 'SELECT * FROM calendari WHERE calendario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPostazione($value){
		$sql = 'SELECT * FROM calendari WHERE idPostazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAttivo($value){
		$sql = 'SELECT * FROM calendari WHERE attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBackgroundColor($value){
		$sql = 'SELECT * FROM calendari WHERE backgroundColor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCalendario($value){
		$sql = 'DELETE FROM calendari WHERE calendario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPostazione($value){
		$sql = 'DELETE FROM calendari WHERE idPostazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAttivo($value){
		$sql = 'DELETE FROM calendari WHERE attivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBackgroundColor($value){
		$sql = 'DELETE FROM calendari WHERE backgroundColor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CalendariMySql 
	 */
	protected function readRow($row){
		$calendari = new Calendari();
		
		$calendari->id = $row['id'];
		$calendari->calendario = $row['calendario'];
		$calendari->idPostazione = $row['idPostazione'];
		$calendari->attivo = $row['attivo'];
		$calendari->backgroundColor = $row['backgroundColor'];

		return $calendari;
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
	 * @return CalendariMySql 
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