<?php
/**
 * Class that operate on table 'messaggio_compleanno'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class MessaggioCompleannoMySqlDAO implements MessaggioCompleannoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MessaggioCompleannoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM messaggio_compleanno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM messaggio_compleanno';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM messaggio_compleanno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param messaggioCompleanno primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM messaggio_compleanno WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessaggioCompleannoMySql messaggioCompleanno
 	 */
	public function insert($messaggioCompleanno){
		$sql = 'INSERT INTO messaggio_compleanno (idCliente, dataContatto) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($messaggioCompleanno->idCliente);
		$sqlQuery->set($messaggioCompleanno->dataContatto);

		$id = $this->executeInsert($sqlQuery);	
		$messaggioCompleanno->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessaggioCompleannoMySql messaggioCompleanno
 	 */
	public function update($messaggioCompleanno){
		$sql = 'UPDATE messaggio_compleanno SET idCliente = ?, dataContatto = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($messaggioCompleanno->idCliente);
		$sqlQuery->set($messaggioCompleanno->dataContatto);

		$sqlQuery->setNumber($messaggioCompleanno->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM messaggio_compleanno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM messaggio_compleanno WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataContatto($value){
		$sql = 'SELECT * FROM messaggio_compleanno WHERE dataContatto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM messaggio_compleanno WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataContatto($value){
		$sql = 'DELETE FROM messaggio_compleanno WHERE dataContatto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MessaggioCompleannoMySql 
	 */
	protected function readRow($row){
		$messaggioCompleanno = new MessaggioCompleanno();
		
		$messaggioCompleanno->id = $row['id'];
		$messaggioCompleanno->idCliente = $row['idCliente'];
		$messaggioCompleanno->dataContatto = $row['dataContatto'];

		return $messaggioCompleanno;
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
	 * @return MessaggioCompleannoMySql 
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