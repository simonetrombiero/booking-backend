<?php
/**
 * Class that operate on table 'categorieTattamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class CategorieTattamentiMySqlDAO implements CategorieTattamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CategorieTattamentiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM categorieTattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM categorieTattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM categorieTattamenti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param categorieTattamenti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM categorieTattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CategorieTattamentiMySql categorieTattamenti
 	 */
	public function insert($categorieTattamenti){
		$sql = 'INSERT INTO categorieTattamenti (categoria, isSospesa) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieTattamenti->categoria);
		$sqlQuery->setNumber($categorieTattamenti->isSospesa);

		$id = $this->executeInsert($sqlQuery);	
		$categorieTattamenti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CategorieTattamentiMySql categorieTattamenti
 	 */
	public function update($categorieTattamenti){
		$sql = 'UPDATE categorieTattamenti SET categoria = ?, isSospesa = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($categorieTattamenti->categoria);
		$sqlQuery->setNumber($categorieTattamenti->isSospesa);

		$sqlQuery->setNumber($categorieTattamenti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM categorieTattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCategoria($value){
		$sql = 'SELECT * FROM categorieTattamenti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsSospesa($value){
		$sql = 'SELECT * FROM categorieTattamenti WHERE isSospesa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCategoria($value){
		$sql = 'DELETE FROM categorieTattamenti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsSospesa($value){
		$sql = 'DELETE FROM categorieTattamenti WHERE isSospesa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CategorieTattamentiMySql 
	 */
	protected function readRow($row){
		$categorieTattamenti = new CategorieTattamenti();
		
		$categorieTattamenti->id = $row['id'];
		$categorieTattamenti->categoria = $row['categoria'];
		$categorieTattamenti->isSospesa = $row['isSospesa'];

		return $categorieTattamenti;
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
	 * @return CategorieTattamentiMySql 
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