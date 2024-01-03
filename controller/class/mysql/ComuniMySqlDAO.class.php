<?php
/**
 * Class that operate on table 'comuni'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ComuniMySqlDAO implements ComuniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ComuniMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM comuni WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM comuni';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM comuni ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param comuni primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM comuni WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComuniMySql comuni
 	 */
	public function insert($comuni){
		$sql = 'INSERT INTO comuni (id_regione, id_provincia, comune) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comuni->idRegione);
		$sqlQuery->setNumber($comuni->idProvincia);
		$sqlQuery->set($comuni->comune);

		$id = $this->executeInsert($sqlQuery);	
		$comuni->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComuniMySql comuni
 	 */
	public function update($comuni){
		$sql = 'UPDATE comuni SET id_regione = ?, id_provincia = ?, comune = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($comuni->idRegione);
		$sqlQuery->setNumber($comuni->idProvincia);
		$sqlQuery->set($comuni->comune);

		$sqlQuery->setNumber($comuni->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM comuni';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdRegione($value){
		$sql = 'SELECT * FROM comuni WHERE id_regione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdProvincia($value){
		$sql = 'SELECT * FROM comuni WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByComune($value){
		$sql = 'SELECT * FROM comuni WHERE comune = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRegione($value){
		$sql = 'DELETE FROM comuni WHERE id_regione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdProvincia($value){
		$sql = 'DELETE FROM comuni WHERE id_provincia = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByComune($value){
		$sql = 'DELETE FROM comuni WHERE comune = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ComuniMySql 
	 */
	protected function readRow($row){
		$comuni = new Comuni();
		
		$comuni->id = $row['id'];
		$comuni->idRegione = $row['id_regione'];
		$comuni->idProvincia = $row['id_provincia'];
		$comuni->comune = $row['comune'];

		return $comuni;
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
	 * @return ComuniMySql 
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