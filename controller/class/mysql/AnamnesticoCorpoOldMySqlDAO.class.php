<?php
/**
 * Class that operate on table 'anamnesticoCorpoOld'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoCorpoOldMySqlDAO implements AnamnesticoCorpoOldDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoCorpoOldMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoCorpoOld WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoCorpoOld';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoCorpoOld ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoCorpoOld primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoCorpoOld WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpoOldMySql anamnesticoCorpoOld
 	 */
	public function insert($anamnesticoCorpoOld){
		$sql = 'INSERT INTO anamnesticoCorpoOld (idAnamnestico, riga, descrizione) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpoOld->idAnamnestico);
		$sqlQuery->setNumber($anamnesticoCorpoOld->riga);
		$sqlQuery->set($anamnesticoCorpoOld->descrizione);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoCorpoOld->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpoOldMySql anamnesticoCorpoOld
 	 */
	public function update($anamnesticoCorpoOld){
		$sql = 'UPDATE anamnesticoCorpoOld SET idAnamnestico = ?, riga = ?, descrizione = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpoOld->idAnamnestico);
		$sqlQuery->setNumber($anamnesticoCorpoOld->riga);
		$sqlQuery->set($anamnesticoCorpoOld->descrizione);

		$sqlQuery->setNumber($anamnesticoCorpoOld->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoCorpoOld';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAnamnestico($value){
		$sql = 'SELECT * FROM anamnesticoCorpoOld WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRiga($value){
		$sql = 'SELECT * FROM anamnesticoCorpoOld WHERE riga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM anamnesticoCorpoOld WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAnamnestico($value){
		$sql = 'DELETE FROM anamnesticoCorpoOld WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRiga($value){
		$sql = 'DELETE FROM anamnesticoCorpoOld WHERE riga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM anamnesticoCorpoOld WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoCorpoOldMySql 
	 */
	protected function readRow($row){
		$anamnesticoCorpoOld = new AnamnesticoCorpoOld();
		
		$anamnesticoCorpoOld->id = $row['id'];
		$anamnesticoCorpoOld->idAnamnestico = $row['idAnamnestico'];
		$anamnesticoCorpoOld->riga = $row['riga'];
		$anamnesticoCorpoOld->descrizione = $row['descrizione'];

		return $anamnesticoCorpoOld;
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
	 * @return AnamnesticoCorpoOldMySql 
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