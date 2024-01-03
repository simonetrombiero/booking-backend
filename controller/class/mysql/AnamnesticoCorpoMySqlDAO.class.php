<?php
/**
 * Class that operate on table 'anamnesticoCorpo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoCorpoMySqlDAO implements AnamnesticoCorpoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoCorpoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoCorpo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoCorpo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoCorpo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoCorpo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpoMySql anamnesticoCorpo
 	 */
	public function insert($anamnesticoCorpo){
		$sql = 'INSERT INTO anamnesticoCorpo (idAnamnestico, label, descrizione, ordine) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpo->idAnamnestico);
		$sqlQuery->set($anamnesticoCorpo->label);
		$sqlQuery->set($anamnesticoCorpo->descrizione);
		$sqlQuery->setNumber($anamnesticoCorpo->ordine);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoCorpo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpoMySql anamnesticoCorpo
 	 */
	public function update($anamnesticoCorpo){
		$sql = 'UPDATE anamnesticoCorpo SET idAnamnestico = ?, label = ?, descrizione = ?, ordine = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoCorpo->idAnamnestico);
		$sqlQuery->set($anamnesticoCorpo->label);
		$sqlQuery->set($anamnesticoCorpo->descrizione);
		$sqlQuery->setNumber($anamnesticoCorpo->ordine);

		$sqlQuery->setNumber($anamnesticoCorpo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoCorpo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAnamnestico($value){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLabel($value){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE label = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdine($value){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAnamnestico($value){
		$sql = 'DELETE FROM anamnesticoCorpo WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLabel($value){
		$sql = 'DELETE FROM anamnesticoCorpo WHERE label = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM anamnesticoCorpo WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdine($value){
		$sql = 'DELETE FROM anamnesticoCorpo WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoCorpoMySql 
	 */
	protected function readRow($row){
		$anamnesticoCorpo = new AnamnesticoCorpo();
		
		$anamnesticoCorpo->id = $row['id'];
		$anamnesticoCorpo->idAnamnestico = $row['idAnamnestico'];
		$anamnesticoCorpo->label = $row['label'];
		$anamnesticoCorpo->descrizione = $row['descrizione'];
		$anamnesticoCorpo->ordine = $row['ordine'];

		return $anamnesticoCorpo;
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
	 * @return AnamnesticoCorpoMySql 
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