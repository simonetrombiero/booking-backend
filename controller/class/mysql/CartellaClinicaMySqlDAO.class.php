<?php
/**
 * Class that operate on table 'cartellaClinica'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class CartellaClinicaMySqlDAO implements CartellaClinicaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CartellaClinicaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cartellaClinica WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cartellaClinica';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cartellaClinica ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cartellaClinica primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM cartellaClinica WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CartellaClinicaMySql cartellaClinica
 	 */
	public function insert($cartellaClinica){
		$sql = 'INSERT INTO cartellaClinica (idQuestionaro, dataComplilazione, statoBocca, note) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cartellaClinica->idQuestionaro);
		$sqlQuery->set($cartellaClinica->dataComplilazione);
		$sqlQuery->set($cartellaClinica->statoBocca);
		$sqlQuery->set($cartellaClinica->note);

		$id = $this->executeInsert($sqlQuery);	
		$cartellaClinica->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CartellaClinicaMySql cartellaClinica
 	 */
	public function update($cartellaClinica){
		$sql = 'UPDATE cartellaClinica SET idQuestionaro = ?, dataComplilazione = ?, statoBocca = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cartellaClinica->idQuestionaro);
		$sqlQuery->set($cartellaClinica->dataComplilazione);
		$sqlQuery->set($cartellaClinica->statoBocca);
		$sqlQuery->set($cartellaClinica->note);

		$sqlQuery->setNumber($cartellaClinica->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cartellaClinica';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdQuestionaro($value){
		$sql = 'SELECT * FROM cartellaClinica WHERE idQuestionaro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataComplilazione($value){
		$sql = 'SELECT * FROM cartellaClinica WHERE dataComplilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatoBocca($value){
		$sql = 'SELECT * FROM cartellaClinica WHERE statoBocca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM cartellaClinica WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdQuestionaro($value){
		$sql = 'DELETE FROM cartellaClinica WHERE idQuestionaro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataComplilazione($value){
		$sql = 'DELETE FROM cartellaClinica WHERE dataComplilazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatoBocca($value){
		$sql = 'DELETE FROM cartellaClinica WHERE statoBocca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM cartellaClinica WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CartellaClinicaMySql 
	 */
	protected function readRow($row){
		$cartellaClinica = new CartellaClinica();
		
		$cartellaClinica->id = $row['id'];
		$cartellaClinica->idQuestionaro = $row['idQuestionaro'];
		$cartellaClinica->dataComplilazione = $row['dataComplilazione'];
		$cartellaClinica->statoBocca = $row['statoBocca'];
		$cartellaClinica->note = $row['note'];

		return $cartellaClinica;
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
	 * @return CartellaClinicaMySql 
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