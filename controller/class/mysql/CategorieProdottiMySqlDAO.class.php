<?php
/**
 * Class that operate on table 'categorieProdotti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class CategorieProdottiMySqlDAO implements CategorieProdottiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategorieProdottiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categorieProdotti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categorieProdotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categorieProdotti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categorieProdotti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM categorieProdotti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategorieProdottiMySql categorieProdotti
 	 */
	public function insert($categorieProdotti){
		$sql = 'INSERT INTO categorieProdotti (categoria, isSospeso) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieProdotti->categoria);
		$sqlQuery->setNumber($categorieProdotti->isSospeso);

		$id = $this->executeInsert($sqlQuery);	
		$categorieProdotti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategorieProdottiMySql categorieProdotti
 	 */
	public function update($categorieProdotti){
		$sql = 'UPDATE categorieProdotti SET categoria = ?, isSospeso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieProdotti->categoria);
		$sqlQuery->setNumber($categorieProdotti->isSospeso);

		$sqlQuery->setNumber($categorieProdotti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categorieProdotti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoria($value){
		$sql = 'SELECT * FROM categorieProdotti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospeso($value){
		$sql = 'SELECT * FROM categorieProdotti WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoria($value){
		$sql = 'DELETE FROM categorieProdotti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospeso($value){
		$sql = 'DELETE FROM categorieProdotti WHERE isSospeso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategorieProdottiMySql 
	 */
	protected function readRow($row){
		$categorieProdotti = new CategorieProdotti();
		
		$categorieProdotti->id = $row['id'];
		$categorieProdotti->categoria = $row['categoria'];
		$categorieProdotti->isSospeso = $row['isSospeso'];

		return $categorieProdotti;
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
	 * @return CategorieProdottiMySql 
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