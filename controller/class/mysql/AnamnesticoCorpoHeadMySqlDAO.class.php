<?php
/**
 * Class that operate on table 'anamnesticoCorpoHead'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoCorpoHeadMySqlDAO implements AnamnesticoCorpoHeadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoCorpoHeadMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoCorpoHead';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoCorpoHead ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoCorpoHead primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpoHeadMySql anamnesticoCorpoHead
 	 */
	public function insert($anamnesticoCorpoHead){
		$sql = 'INSERT INTO anamnesticoCorpoHead (idQuestionario, idCliente, data, eta, altezza, note) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpoHead->idQuestionario);
		$sqlQuery->setNumber($anamnesticoCorpoHead->idCliente);
		$sqlQuery->set($anamnesticoCorpoHead->data);
		$sqlQuery->setNumber($anamnesticoCorpoHead->eta);
		$sqlQuery->setNumber($anamnesticoCorpoHead->altezza);
		$sqlQuery->set($anamnesticoCorpoHead->note);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoCorpoHead->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpoHeadMySql anamnesticoCorpoHead
 	 */
	public function update($anamnesticoCorpoHead){
		$sql = 'UPDATE anamnesticoCorpoHead SET idQuestionario = ?, idCliente = ?, data = ?, eta = ?, altezza = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpoHead->idQuestionario);
		$sqlQuery->setNumber($anamnesticoCorpoHead->idCliente);
		$sqlQuery->set($anamnesticoCorpoHead->data);
		$sqlQuery->setNumber($anamnesticoCorpoHead->eta);
		$sqlQuery->setNumber($anamnesticoCorpoHead->altezza);
		$sqlQuery->set($anamnesticoCorpoHead->note);

		$sqlQuery->setNumber($anamnesticoCorpoHead->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoCorpoHead';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdQuestionario($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE idQuestionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEta($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE eta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAltezza($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE altezza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM anamnesticoCorpoHead WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdQuestionario($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE idQuestionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEta($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE eta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAltezza($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE altezza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM anamnesticoCorpoHead WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoCorpoHeadMySql 
	 */
	protected function readRow($row){
		$anamnesticoCorpoHead = new AnamnesticoCorpoHead();
		
		$anamnesticoCorpoHead->id = $row['id'];
		$anamnesticoCorpoHead->idQuestionario = $row['idQuestionario'];
		$anamnesticoCorpoHead->idCliente = $row['idCliente'];
		$anamnesticoCorpoHead->data = $row['data'];
		$anamnesticoCorpoHead->eta = $row['eta'];
		$anamnesticoCorpoHead->altezza = $row['altezza'];
		$anamnesticoCorpoHead->note = $row['note'];

		return $anamnesticoCorpoHead;
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
	 * @return AnamnesticoCorpoHeadMySql 
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