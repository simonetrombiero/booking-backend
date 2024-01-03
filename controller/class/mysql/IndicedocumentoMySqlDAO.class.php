<?php
/**
 * Class that operate on table 'indicedocumento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class IndicedocumentoMySqlDAO implements IndicedocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return IndicedocumentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM indicedocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM indicedocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM indicedocumento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param indicedocumento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM indicedocumento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param IndicedocumentoMySql indicedocumento
 	 */
	public function insert($indicedocumento){
		$sql = 'INSERT INTO indicedocumento (idTipoDocumento, nome, anno, progressivo, registro) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($indicedocumento->idTipoDocumento);
		$sqlQuery->set($indicedocumento->nome);
		$sqlQuery->set($indicedocumento->anno);
		$sqlQuery->setNumber($indicedocumento->progressivo);
		$sqlQuery->set($indicedocumento->registro);

		$id = $this->executeInsert($sqlQuery);	
		$indicedocumento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param IndicedocumentoMySql indicedocumento
 	 */
	public function update($indicedocumento){
		$sql = 'UPDATE indicedocumento SET idTipoDocumento = ?, nome = ?, anno = ?, progressivo = ?, registro = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($indicedocumento->idTipoDocumento);
		$sqlQuery->set($indicedocumento->nome);
		$sqlQuery->set($indicedocumento->anno);
		$sqlQuery->setNumber($indicedocumento->progressivo);
		$sqlQuery->set($indicedocumento->registro);

		$sqlQuery->setNumber($indicedocumento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM indicedocumento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdTipoDocumento($value){
		$sql = 'SELECT * FROM indicedocumento WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM indicedocumento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnno($value){
		$sql = 'SELECT * FROM indicedocumento WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProgressivo($value){
		$sql = 'SELECT * FROM indicedocumento WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRegistro($value){
		$sql = 'SELECT * FROM indicedocumento WHERE registro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdTipoDocumento($value){
		$sql = 'DELETE FROM indicedocumento WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM indicedocumento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnno($value){
		$sql = 'DELETE FROM indicedocumento WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProgressivo($value){
		$sql = 'DELETE FROM indicedocumento WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRegistro($value){
		$sql = 'DELETE FROM indicedocumento WHERE registro = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return IndicedocumentoMySql 
	 */
	protected function readRow($row){
		$indicedocumento = new Indicedocumento();
		
		$indicedocumento->id = $row['id'];
		$indicedocumento->idTipoDocumento = $row['idTipoDocumento'];
		$indicedocumento->nome = $row['nome'];
		$indicedocumento->anno = $row['anno'];
		$indicedocumento->progressivo = $row['progressivo'];
		$indicedocumento->registro = $row['registro'];

		return $indicedocumento;
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
	 * @return IndicedocumentoMySql 
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