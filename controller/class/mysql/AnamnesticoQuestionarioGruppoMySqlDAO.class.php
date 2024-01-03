<?php
/**
 * Class that operate on table 'anamnesticoQuestionarioGruppo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoQuestionarioGruppoMySqlDAO implements AnamnesticoQuestionarioGruppoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoQuestionarioGruppoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoQuestionarioGruppo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoQuestionarioGruppo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoQuestionarioGruppo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoQuestionarioGruppo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoQuestionarioGruppo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoQuestionarioGruppoMySql anamnesticoQuestionarioGruppo
 	 */
	public function insert($anamnesticoQuestionarioGruppo){
		$sql = 'INSERT INTO anamnesticoQuestionarioGruppo (descrizione, ordine) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($anamnesticoQuestionarioGruppo->descrizione);
		$sqlQuery->setNumber($anamnesticoQuestionarioGruppo->ordine);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoQuestionarioGruppo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoQuestionarioGruppoMySql anamnesticoQuestionarioGruppo
 	 */
	public function update($anamnesticoQuestionarioGruppo){
		$sql = 'UPDATE anamnesticoQuestionarioGruppo SET descrizione = ?, ordine = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($anamnesticoQuestionarioGruppo->descrizione);
		$sqlQuery->setNumber($anamnesticoQuestionarioGruppo->ordine);

		$sqlQuery->setNumber($anamnesticoQuestionarioGruppo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoQuestionarioGruppo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM anamnesticoQuestionarioGruppo WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdine($value){
		$sql = 'SELECT * FROM anamnesticoQuestionarioGruppo WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM anamnesticoQuestionarioGruppo WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdine($value){
		$sql = 'DELETE FROM anamnesticoQuestionarioGruppo WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoQuestionarioGruppoMySql 
	 */
	protected function readRow($row){
		$anamnesticoQuestionarioGruppo = new AnamnesticoQuestionarioGruppo();
		
		$anamnesticoQuestionarioGruppo->id = $row['id'];
		$anamnesticoQuestionarioGruppo->descrizione = $row['descrizione'];
		$anamnesticoQuestionarioGruppo->ordine = $row['ordine'];

		return $anamnesticoQuestionarioGruppo;
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
	 * @return AnamnesticoQuestionarioGruppoMySql 
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