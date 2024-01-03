<?php
/**
 * Class that operate on table 'aliquota'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AliquotaMySqlDAO implements AliquotaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AliquotaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aliquota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM aliquota';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM aliquota ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param aliquota primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM aliquota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AliquotaMySql aliquota
 	 */
	public function insert($aliquota){
		$sql = 'INSERT INTO aliquota (descrizione, aliquota, naturaFAE, isSospeso) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aliquota->descrizione);
		$sqlQuery->set($aliquota->aliquota);
		$sqlQuery->set($aliquota->naturaFAE);
		$sqlQuery->setNumber($aliquota->isSospeso);

		$id = $this->executeInsert($sqlQuery);	
		$aliquota->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AliquotaMySql aliquota
 	 */
	public function update($aliquota){
		$sql = 'UPDATE aliquota SET descrizione = ?, aliquota = ?, naturaFAE = ?, isSospeso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aliquota->descrizione);
		$sqlQuery->set($aliquota->aliquota);
		$sqlQuery->set($aliquota->naturaFAE);
		$sqlQuery->setNumber($aliquota->isSospeso);

		$sqlQuery->setNumber($aliquota->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM aliquota';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM aliquota WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAliquota($value){
		$sql = 'SELECT * FROM aliquota WHERE aliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNaturaFAE($value){
		$sql = 'SELECT * FROM aliquota WHERE naturaFAE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospeso($value){
		$sql = 'SELECT * FROM aliquota WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM aliquota WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAliquota($value){
		$sql = 'DELETE FROM aliquota WHERE aliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNaturaFAE($value){
		$sql = 'DELETE FROM aliquota WHERE naturaFAE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospeso($value){
		$sql = 'DELETE FROM aliquota WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AliquotaMySql 
	 */
	protected function readRow($row){
		$aliquota = new Aliquota();
		
		$aliquota->id = $row['id'];
		$aliquota->descrizione = $row['descrizione'];
		$aliquota->aliquota = $row['aliquota'];
		$aliquota->naturaFAE = $row['naturaFAE'];
		$aliquota->isSospeso = $row['isSospeso'];

		return $aliquota;
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
	 * @return AliquotaMySql 
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