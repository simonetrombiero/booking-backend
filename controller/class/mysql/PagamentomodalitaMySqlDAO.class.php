<?php
/**
 * Class that operate on table 'pagamentomodalita'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PagamentomodalitaMySqlDAO implements PagamentomodalitaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagamentomodalitaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagamentomodalita WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagamentomodalita';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagamentomodalita ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pagamentomodalita primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagamentomodalita WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagamentomodalitaMySql pagamentomodalita
 	 */
	public function insert($pagamentomodalita){
		$sql = 'INSERT INTO pagamentomodalita (descrizione, priorita) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagamentomodalita->descrizione);
		$sqlQuery->setNumber($pagamentomodalita->priorita);

		$id = $this->executeInsert($sqlQuery);	
		$pagamentomodalita->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagamentomodalitaMySql pagamentomodalita
 	 */
	public function update($pagamentomodalita){
		$sql = 'UPDATE pagamentomodalita SET descrizione = ?, priorita = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pagamentomodalita->descrizione);
		$sqlQuery->setNumber($pagamentomodalita->priorita);

		$sqlQuery->setNumber($pagamentomodalita->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagamentomodalita';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM pagamentomodalita WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPriorita($value){
		$sql = 'SELECT * FROM pagamentomodalita WHERE priorita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM pagamentomodalita WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPriorita($value){
		$sql = 'DELETE FROM pagamentomodalita WHERE priorita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagamentomodalitaMySql 
	 */
	protected function readRow($row){
		$pagamentomodalita = new Pagamentomodalita();
		
		$pagamentomodalita->id = $row['id'];
		$pagamentomodalita->descrizione = $row['descrizione'];
		$pagamentomodalita->priorita = $row['priorita'];

		return $pagamentomodalita;
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
	 * @return PagamentomodalitaMySql 
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