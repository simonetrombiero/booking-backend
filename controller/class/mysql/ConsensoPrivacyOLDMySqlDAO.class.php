<?php
/**
 * Class that operate on table 'consensoPrivacyOLD'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ConsensoPrivacyOLDMySqlDAO implements ConsensoPrivacyOLDDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ConsensoPrivacyOLDMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM consensoPrivacyOLD WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM consensoPrivacyOLD';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM consensoPrivacyOLD ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param consensoPrivacyOLD primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM consensoPrivacyOLD WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoPrivacyOLDMySql consensoPrivacyOLD
 	 */
	public function insert($consensoPrivacyOLD){
		$sql = 'INSERT INTO consensoPrivacyOLD (idPaziente, dataCompilazione) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoPrivacyOLD->idPaziente);
		$sqlQuery->set($consensoPrivacyOLD->dataCompilazione);

		$id = $this->executeInsert($sqlQuery);	
		$consensoPrivacyOLD->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoPrivacyOLDMySql consensoPrivacyOLD
 	 */
	public function update($consensoPrivacyOLD){
		$sql = 'UPDATE consensoPrivacyOLD SET idPaziente = ?, dataCompilazione = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($consensoPrivacyOLD->idPaziente);
		$sqlQuery->set($consensoPrivacyOLD->dataCompilazione);

		$sqlQuery->setNumber($consensoPrivacyOLD->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM consensoPrivacyOLD';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPaziente($value){
		$sql = 'SELECT * FROM consensoPrivacyOLD WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataCompilazione($value){
		$sql = 'SELECT * FROM consensoPrivacyOLD WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPaziente($value){
		$sql = 'DELETE FROM consensoPrivacyOLD WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataCompilazione($value){
		$sql = 'DELETE FROM consensoPrivacyOLD WHERE dataCompilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ConsensoPrivacyOLDMySql 
	 */
	protected function readRow($row){
		$consensoPrivacyOLD = new ConsensoPrivacyOLD();
		
		$consensoPrivacyOLD->id = $row['id'];
		$consensoPrivacyOLD->idPaziente = $row['idPaziente'];
		$consensoPrivacyOLD->dataCompilazione = $row['dataCompilazione'];

		return $consensoPrivacyOLD;
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
	 * @return ConsensoPrivacyOLDMySql 
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