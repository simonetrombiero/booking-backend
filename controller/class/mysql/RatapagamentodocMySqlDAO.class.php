<?php
/**
 * Class that operate on table 'ratapagamentodoc'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class RatapagamentodocMySqlDAO implements RatapagamentodocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RatapagamentodocMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ratapagamentodoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ratapagamentodoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ratapagamentodoc ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ratapagamentodoc primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ratapagamentodoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RatapagamentodocMySql ratapagamentodoc
 	 */
	public function insert($ratapagamentodoc){
		$sql = 'INSERT INTO ratapagamentodoc (idPagamentoDoc, giorni, importo, isPagato) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($ratapagamentodoc->idPagamentoDoc);
		$sqlQuery->setNumber($ratapagamentodoc->giorni);
		$sqlQuery->set($ratapagamentodoc->importo);
		$sqlQuery->setNumber($ratapagamentodoc->isPagato);

		$id = $this->executeInsert($sqlQuery);	
		$ratapagamentodoc->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RatapagamentodocMySql ratapagamentodoc
 	 */
	public function update($ratapagamentodoc){
		$sql = 'UPDATE ratapagamentodoc SET idPagamentoDoc = ?, giorni = ?, importo = ?, isPagato = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($ratapagamentodoc->idPagamentoDoc);
		$sqlQuery->setNumber($ratapagamentodoc->giorni);
		$sqlQuery->set($ratapagamentodoc->importo);
		$sqlQuery->setNumber($ratapagamentodoc->isPagato);

		$sqlQuery->setNumber($ratapagamentodoc->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ratapagamentodoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPagamentoDoc($value){
		$sql = 'SELECT * FROM ratapagamentodoc WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGiorni($value){
		$sql = 'SELECT * FROM ratapagamentodoc WHERE giorni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporto($value){
		$sql = 'SELECT * FROM ratapagamentodoc WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsPagato($value){
		$sql = 'SELECT * FROM ratapagamentodoc WHERE isPagato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPagamentoDoc($value){
		$sql = 'DELETE FROM ratapagamentodoc WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGiorni($value){
		$sql = 'DELETE FROM ratapagamentodoc WHERE giorni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporto($value){
		$sql = 'DELETE FROM ratapagamentodoc WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsPagato($value){
		$sql = 'DELETE FROM ratapagamentodoc WHERE isPagato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RatapagamentodocMySql 
	 */
	protected function readRow($row){
		$ratapagamentodoc = new Ratapagamentodoc();
		
		$ratapagamentodoc->id = $row['id'];
		$ratapagamentodoc->idPagamentoDoc = $row['idPagamentoDoc'];
		$ratapagamentodoc->giorni = $row['giorni'];
		$ratapagamentodoc->importo = $row['importo'];
		$ratapagamentodoc->isPagato = $row['isPagato'];

		return $ratapagamentodoc;
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
	 * @return RatapagamentodocMySql 
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