<?php
/**
 * Class that operate on table 'ratadocumento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class RatadocumentoMySqlDAO implements RatadocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RatadocumentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM ratadocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM ratadocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM ratadocumento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param ratadocumento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM ratadocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RatadocumentoMySql ratadocumento
 	 */
	public function insert($ratadocumento){
		$sql = 'INSERT INTO ratadocumento (idPagamentoDoc, importo, dataScadenza) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($ratadocumento->idPagamentoDoc);
		$sqlQuery->set($ratadocumento->importo);
		$sqlQuery->set($ratadocumento->dataScadenza);

		$id = $this->executeInsert($sqlQuery);	
		$ratadocumento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RatadocumentoMySql ratadocumento
 	 */
	public function update($ratadocumento){
		$sql = 'UPDATE ratadocumento SET idPagamentoDoc = ?, importo = ?, dataScadenza = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($ratadocumento->idPagamentoDoc);
		$sqlQuery->set($ratadocumento->importo);
		$sqlQuery->set($ratadocumento->dataScadenza);

		$sqlQuery->setNumber($ratadocumento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM ratadocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPagamentoDoc($value){
		$sql = 'SELECT * FROM ratadocumento WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporto($value){
		$sql = 'SELECT * FROM ratadocumento WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataScadenza($value){
		$sql = 'SELECT * FROM ratadocumento WHERE dataScadenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPagamentoDoc($value){
		$sql = 'DELETE FROM ratadocumento WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporto($value){
		$sql = 'DELETE FROM ratadocumento WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataScadenza($value){
		$sql = 'DELETE FROM ratadocumento WHERE dataScadenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RatadocumentoMySql 
	 */
	protected function readRow($row){
		$ratadocumento = new Ratadocumento();
		
		$ratadocumento->id = $row['id'];
		$ratadocumento->idPagamentoDoc = $row['idPagamentoDoc'];
		$ratadocumento->importo = $row['importo'];
		$ratadocumento->dataScadenza = $row['dataScadenza'];

		return $ratadocumento;
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
	 * @return RatadocumentoMySql 
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