<?php
/**
 * Class that operate on table 'tipodocumento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class TipodocumentoMySqlDAO implements TipodocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TipodocumentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipodocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tipodocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tipodocumento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tipodocumento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tipodocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TipodocumentoMySql tipodocumento
 	 */
	public function insert($tipodocumento){
		$sql = 'INSERT INTO tipodocumento (nome, idTipo, idSezione) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipodocumento->nome);
		$sqlQuery->setNumber($tipodocumento->idTipo);
		$sqlQuery->setNumber($tipodocumento->idSezione);

		$id = $this->executeInsert($sqlQuery);	
		$tipodocumento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TipodocumentoMySql tipodocumento
 	 */
	public function update($tipodocumento){
		$sql = 'UPDATE tipodocumento SET nome = ?, idTipo = ?, idSezione = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipodocumento->nome);
		$sqlQuery->setNumber($tipodocumento->idTipo);
		$sqlQuery->setNumber($tipodocumento->idSezione);

		$sqlQuery->setNumber($tipodocumento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipodocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM tipodocumento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTipo($value){
		$sql = 'SELECT * FROM tipodocumento WHERE idTipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdSezione($value){
		$sql = 'SELECT * FROM tipodocumento WHERE idSezione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM tipodocumento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTipo($value){
		$sql = 'DELETE FROM tipodocumento WHERE idTipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSezione($value){
		$sql = 'DELETE FROM tipodocumento WHERE idSezione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TipodocumentoMySql 
	 */
	protected function readRow($row){
		$tipodocumento = new Tipodocumento();
		
		$tipodocumento->id = $row['id'];
		$tipodocumento->nome = $row['nome'];
		$tipodocumento->idTipo = $row['idTipo'];
		$tipodocumento->idSezione = $row['idSezione'];

		return $tipodocumento;
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
	 * @return TipodocumentoMySql 
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