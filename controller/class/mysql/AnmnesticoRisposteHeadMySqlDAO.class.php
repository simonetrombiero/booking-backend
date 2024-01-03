<?php
/**
 * Class that operate on table 'anmnesticoRisposteHead'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnmnesticoRisposteHeadMySqlDAO implements AnmnesticoRisposteHeadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnmnesticoRisposteHeadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anmnesticoRisposteHead WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anmnesticoRisposteHead';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anmnesticoRisposteHead ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anmnesticoRisposteHead primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anmnesticoRisposteHead WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnmnesticoRisposteHeadMySql anmnesticoRisposteHead
 	 */
	public function insert($anmnesticoRisposteHead){
		$sql = 'INSERT INTO anmnesticoRisposteHead (idAnamnestico, dataCompilazione, paziente, note) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anmnesticoRisposteHead->idAnamnestico);
		$sqlQuery->set($anmnesticoRisposteHead->dataCompilazione);
		$sqlQuery->setNumber($anmnesticoRisposteHead->paziente);
		$sqlQuery->set($anmnesticoRisposteHead->note);

		$id = $this->executeInsert($sqlQuery);	
		$anmnesticoRisposteHead->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnmnesticoRisposteHeadMySql anmnesticoRisposteHead
 	 */
	public function update($anmnesticoRisposteHead){
		$sql = 'UPDATE anmnesticoRisposteHead SET idAnamnestico = ?, dataCompilazione = ?, paziente = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anmnesticoRisposteHead->idAnamnestico);
		$sqlQuery->set($anmnesticoRisposteHead->dataCompilazione);
		$sqlQuery->setNumber($anmnesticoRisposteHead->paziente);
		$sqlQuery->set($anmnesticoRisposteHead->note);

		$sqlQuery->setNumber($anmnesticoRisposteHead->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anmnesticoRisposteHead';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAnamnestico($value){
		$sql = 'SELECT * FROM anmnesticoRisposteHead WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCompilazione($value){
		$sql = 'SELECT * FROM anmnesticoRisposteHead WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaziente($value){
		$sql = 'SELECT * FROM anmnesticoRisposteHead WHERE paziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM anmnesticoRisposteHead WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAnamnestico($value){
		$sql = 'DELETE FROM anmnesticoRisposteHead WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCompilazione($value){
		$sql = 'DELETE FROM anmnesticoRisposteHead WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaziente($value){
		$sql = 'DELETE FROM anmnesticoRisposteHead WHERE paziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM anmnesticoRisposteHead WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnmnesticoRisposteHeadMySql 
	 */
	protected function readRow($row){
		$anmnesticoRisposteHead = new AnmnesticoRisposteHead();
		
		$anmnesticoRisposteHead->id = $row['id'];
		$anmnesticoRisposteHead->idAnamnestico = $row['idAnamnestico'];
		$anmnesticoRisposteHead->dataCompilazione = $row['dataCompilazione'];
		$anmnesticoRisposteHead->paziente = $row['paziente'];
		$anmnesticoRisposteHead->note = $row['note'];

		return $anmnesticoRisposteHead;
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
	 * @return AnmnesticoRisposteHeadMySql 
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