<?php
/**
 * Class that operate on table 'messaggio_appuntamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class MessaggioAppuntamentoMySqlDAO implements MessaggioAppuntamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MessaggioAppuntamentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM messaggio_appuntamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM messaggio_appuntamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM messaggio_appuntamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param messaggioAppuntamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM messaggio_appuntamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessaggioAppuntamentoMySql messaggioAppuntamento
 	 */
	public function insert($messaggioAppuntamento){
		$sql = 'INSERT INTO messaggio_appuntamento (idAppuntamento, dataContatto) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($messaggioAppuntamento->idAppuntamento);
		$sqlQuery->set($messaggioAppuntamento->dataContatto);

		$id = $this->executeInsert($sqlQuery);	
		$messaggioAppuntamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessaggioAppuntamentoMySql messaggioAppuntamento
 	 */
	public function update($messaggioAppuntamento){
		$sql = 'UPDATE messaggio_appuntamento SET idAppuntamento = ?, dataContatto = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($messaggioAppuntamento->idAppuntamento);
		$sqlQuery->set($messaggioAppuntamento->dataContatto);

		$sqlQuery->setNumber($messaggioAppuntamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM messaggio_appuntamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAppuntamento($value){
		$sql = 'SELECT * FROM messaggio_appuntamento WHERE idAppuntamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataContatto($value){
		$sql = 'SELECT * FROM messaggio_appuntamento WHERE dataContatto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAppuntamento($value){
		$sql = 'DELETE FROM messaggio_appuntamento WHERE idAppuntamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataContatto($value){
		$sql = 'DELETE FROM messaggio_appuntamento WHERE dataContatto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MessaggioAppuntamentoMySql 
	 */
	protected function readRow($row){
		$messaggioAppuntamento = new MessaggioAppuntamento();
		
		$messaggioAppuntamento->id = $row['id'];
		$messaggioAppuntamento->idAppuntamento = $row['idAppuntamento'];
		$messaggioAppuntamento->dataContatto = $row['dataContatto'];

		return $messaggioAppuntamento;
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
	 * @return MessaggioAppuntamentoMySql 
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