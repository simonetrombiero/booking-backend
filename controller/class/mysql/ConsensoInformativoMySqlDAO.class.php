<?php
/**
 * Class that operate on table 'consensoInformativo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ConsensoInformativoMySqlDAO implements ConsensoInformativoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ConsensoInformativoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM consensoInformativo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM consensoInformativo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM consensoInformativo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param consensoInformativo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM consensoInformativo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoInformativoMySql consensoInformativo
 	 */
	public function insert($consensoInformativo){
		$sql = 'INSERT INTO consensoInformativo (idQuestionario, dataCompilazione, firmaConsenso, firmaStrumenti) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoInformativo->idQuestionario);
		$sqlQuery->set($consensoInformativo->dataCompilazione);
		$sqlQuery->set($consensoInformativo->firmaConsenso);
		$sqlQuery->set($consensoInformativo->firmaStrumenti);

		$id = $this->executeInsert($sqlQuery);	
		$consensoInformativo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoInformativoMySql consensoInformativo
 	 */
	public function update($consensoInformativo){
		$sql = 'UPDATE consensoInformativo SET idQuestionario = ?, dataCompilazione = ?, firmaConsenso = ?, firmaStrumenti = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoInformativo->idQuestionario);
		$sqlQuery->set($consensoInformativo->dataCompilazione);
		$sqlQuery->set($consensoInformativo->firmaConsenso);
		$sqlQuery->set($consensoInformativo->firmaStrumenti);

		$sqlQuery->setNumber($consensoInformativo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM consensoInformativo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdQuestionario($value){
		$sql = 'SELECT * FROM consensoInformativo WHERE idQuestionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCompilazione($value){
		$sql = 'SELECT * FROM consensoInformativo WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmaConsenso($value){
		$sql = 'SELECT * FROM consensoInformativo WHERE firmaConsenso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFirmaStrumenti($value){
		$sql = 'SELECT * FROM consensoInformativo WHERE firmaStrumenti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdQuestionario($value){
		$sql = 'DELETE FROM consensoInformativo WHERE idQuestionario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCompilazione($value){
		$sql = 'DELETE FROM consensoInformativo WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmaConsenso($value){
		$sql = 'DELETE FROM consensoInformativo WHERE firmaConsenso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirmaStrumenti($value){
		$sql = 'DELETE FROM consensoInformativo WHERE firmaStrumenti = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ConsensoInformativoMySql 
	 */
	protected function readRow($row){
		$consensoInformativo = new ConsensoInformativo();
		
		$consensoInformativo->id = $row['id'];
		$consensoInformativo->idQuestionario = $row['idQuestionario'];
		$consensoInformativo->dataCompilazione = $row['dataCompilazione'];
		$consensoInformativo->firmaConsenso = $row['firmaConsenso'];
		$consensoInformativo->firmaStrumenti = $row['firmaStrumenti'];

		return $consensoInformativo;
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
	 * @return ConsensoInformativoMySql 
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