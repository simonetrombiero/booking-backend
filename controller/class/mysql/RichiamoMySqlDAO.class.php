<?php
/**
 * Class that operate on table 'richiamo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-06-08 12:37
 */
class RichiamoMySqlDAO implements RichiamoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RichiamoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM richiamo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM richiamo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM richiamo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param richiamo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM richiamo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RichiamoMySql richiamo
 	 */
	public function insert($richiamo){
		$sql = 'INSERT INTO richiamo (titolo, paziente, richiestoDa, motivoRichiamo, data, dataPrevista, note, status, noShow) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($richiamo->titolo);
		$sqlQuery->setNumber($richiamo->paziente);
		$sqlQuery->setNumber($richiamo->richiestoDa);
		$sqlQuery->set($richiamo->motivoRichiamo);
		$sqlQuery->set($richiamo->data);
		$sqlQuery->set($richiamo->dataPrevista);
		$sqlQuery->set($richiamo->note);
		$sqlQuery->setNumber($richiamo->status);
		$sqlQuery->setNumber($richiamo->noShow);

		$id = $this->executeInsert($sqlQuery);	
		$richiamo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RichiamoMySql richiamo
 	 */
	public function update($richiamo){
		$sql = 'UPDATE richiamo SET titolo = ?, paziente = ?, richiestoDa = ?, motivoRichiamo = ?, data = ?, dataPrevista = ?, note = ?, status = ?, noShow = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($richiamo->titolo);
		$sqlQuery->setNumber($richiamo->paziente);
		$sqlQuery->setNumber($richiamo->richiestoDa);
		$sqlQuery->set($richiamo->motivoRichiamo);
		$sqlQuery->set($richiamo->data);
		$sqlQuery->set($richiamo->dataPrevista);
		$sqlQuery->set($richiamo->note);
		$sqlQuery->setNumber($richiamo->status);
		$sqlQuery->setNumber($richiamo->noShow);

		$sqlQuery->setNumber($richiamo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM richiamo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitolo($value){
		$sql = 'SELECT * FROM richiamo WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPaziente($value){
		$sql = 'SELECT * FROM richiamo WHERE paziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRichiestoDa($value){
		$sql = 'SELECT * FROM richiamo WHERE richiestoDa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMotivoRichiamo($value){
		$sql = 'SELECT * FROM richiamo WHERE motivoRichiamo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM richiamo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataPrevista($value){
		$sql = 'SELECT * FROM richiamo WHERE dataPrevista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM richiamo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM richiamo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNoShow($value){
		$sql = 'SELECT * FROM richiamo WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitolo($value){
		$sql = 'DELETE FROM richiamo WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPaziente($value){
		$sql = 'DELETE FROM richiamo WHERE paziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRichiestoDa($value){
		$sql = 'DELETE FROM richiamo WHERE richiestoDa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMotivoRichiamo($value){
		$sql = 'DELETE FROM richiamo WHERE motivoRichiamo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM richiamo WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataPrevista($value){
		$sql = 'DELETE FROM richiamo WHERE dataPrevista = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM richiamo WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM richiamo WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoShow($value){
		$sql = 'DELETE FROM richiamo WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return RichiamoMySql 
	 */
	protected function readRow($row){
		$richiamo = new Richiamo();
		
		$richiamo->id = $row['id'];
		$richiamo->titolo = $row['titolo'];
		$richiamo->paziente = $row['paziente'];
		$richiamo->richiestoDa = $row['richiestoDa'];
		$richiamo->motivoRichiamo = $row['motivoRichiamo'];
		$richiamo->data = $row['data'];
		$richiamo->dataPrevista = $row['dataPrevista'];
		$richiamo->note = $row['note'];
		$richiamo->status = $row['status'];
		$richiamo->noShow = $row['noShow'];

		return $richiamo;
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
	 * @return RichiamoMySql 
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