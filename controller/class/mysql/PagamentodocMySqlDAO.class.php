<?php
/**
 * Class that operate on table 'pagamentodoc'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PagamentodocMySqlDAO implements PagamentodocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagamentodocMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagamentodoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagamentodoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagamentodoc ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pagamentodoc primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagamentodoc WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagamentodocMySql pagamentodoc
 	 */
	public function insert($pagamentodoc){
		$sql = 'INSERT INTO pagamentodoc (nome, risorsa, isFineMese) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagamentodoc->nome);
		$sqlQuery->set($pagamentodoc->risorsa);
		$sqlQuery->setNumber($pagamentodoc->isFineMese);

		$id = $this->executeInsert($sqlQuery);	
		$pagamentodoc->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagamentodocMySql pagamentodoc
 	 */
	public function update($pagamentodoc){
		$sql = 'UPDATE pagamentodoc SET nome = ?, risorsa = ?, isFineMese = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagamentodoc->nome);
		$sqlQuery->set($pagamentodoc->risorsa);
		$sqlQuery->setNumber($pagamentodoc->isFineMese);

		$sqlQuery->setNumber($pagamentodoc->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagamentodoc';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM pagamentodoc WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRisorsa($value){
		$sql = 'SELECT * FROM pagamentodoc WHERE risorsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsFineMese($value){
		$sql = 'SELECT * FROM pagamentodoc WHERE isFineMese = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM pagamentodoc WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRisorsa($value){
		$sql = 'DELETE FROM pagamentodoc WHERE risorsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsFineMese($value){
		$sql = 'DELETE FROM pagamentodoc WHERE isFineMese = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagamentodocMySql 
	 */
	protected function readRow($row){
		$pagamentodoc = new Pagamentodoc();
		
		$pagamentodoc->id = $row['id'];
		$pagamentodoc->nome = $row['nome'];
		$pagamentodoc->risorsa = $row['risorsa'];
		$pagamentodoc->isFineMese = $row['isFineMese'];

		return $pagamentodoc;
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
	 * @return PagamentodocMySql 
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