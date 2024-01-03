<?php
/**
 * Class that operate on table 'marcheProdotti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class MarcheProdottiMySqlDAO implements MarcheProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MarcheProdottiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM marcheProdotti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM marcheProdotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM marcheProdotti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param marcheProdotti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM marcheProdotti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MarcheProdottiMySql marcheProdotti
 	 */
	public function insert($marcheProdotti){
		$sql = 'INSERT INTO marcheProdotti (marca, isSospeso) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($marcheProdotti->marca);
		$sqlQuery->setNumber($marcheProdotti->isSospeso);

		$id = $this->executeInsert($sqlQuery);	
		$marcheProdotti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MarcheProdottiMySql marcheProdotti
 	 */
	public function update($marcheProdotti){
		$sql = 'UPDATE marcheProdotti SET marca = ?, isSospeso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($marcheProdotti->marca);
		$sqlQuery->setNumber($marcheProdotti->isSospeso);

		$sqlQuery->setNumber($marcheProdotti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM marcheProdotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMarca($value){
		$sql = 'SELECT * FROM marcheProdotti WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospeso($value){
		$sql = 'SELECT * FROM marcheProdotti WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMarca($value){
		$sql = 'DELETE FROM marcheProdotti WHERE marca = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospeso($value){
		$sql = 'DELETE FROM marcheProdotti WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return MarcheProdottiMySql 
	 */
	protected function readRow($row){
		$marcheProdotti = new MarcheProdotti();
		
		$marcheProdotti->id = $row['id'];
		$marcheProdotti->marca = $row['marca'];
		$marcheProdotti->isSospeso = $row['isSospeso'];

		return $marcheProdotti;
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
	 * @return MarcheProdottiMySql 
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