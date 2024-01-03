<?php
/**
 * Class that operate on table 'documentazione'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DocumentazioneMySqlDAO implements DocumentazioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentazioneMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM documentazione WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM documentazione';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM documentazione ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param documentazione primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM documentazione WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentazioneMySql documentazione
 	 */
	public function insert($documentazione){
		$sql = 'INSERT INTO documentazione (idPaziente, dataAcquisizione, dataDocumento, descrizione, allegato) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentazione->idPaziente);
		$sqlQuery->set($documentazione->dataAcquisizione);
		$sqlQuery->set($documentazione->dataDocumento);
		$sqlQuery->set($documentazione->descrizione);
		$sqlQuery->set($documentazione->allegato);

		$id = $this->executeInsert($sqlQuery);	
		$documentazione->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentazioneMySql documentazione
 	 */
	public function update($documentazione){
		$sql = 'UPDATE documentazione SET idPaziente = ?, dataAcquisizione = ?, dataDocumento = ?, descrizione = ?, allegato = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentazione->idPaziente);
		$sqlQuery->set($documentazione->dataAcquisizione);
		$sqlQuery->set($documentazione->dataDocumento);
		$sqlQuery->set($documentazione->descrizione);
		$sqlQuery->set($documentazione->allegato);

		$sqlQuery->setNumber($documentazione->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM documentazione';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPaziente($value){
		$sql = 'SELECT * FROM documentazione WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataAcquisizione($value){
		$sql = 'SELECT * FROM documentazione WHERE dataAcquisizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataDocumento($value){
		$sql = 'SELECT * FROM documentazione WHERE dataDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM documentazione WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAllegato($value){
		$sql = 'SELECT * FROM documentazione WHERE allegato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPaziente($value){
		$sql = 'DELETE FROM documentazione WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataAcquisizione($value){
		$sql = 'DELETE FROM documentazione WHERE dataAcquisizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataDocumento($value){
		$sql = 'DELETE FROM documentazione WHERE dataDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM documentazione WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAllegato($value){
		$sql = 'DELETE FROM documentazione WHERE allegato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentazioneMySql 
	 */
	protected function readRow($row){
		$documentazione = new Documentazione();
		
		$documentazione->id = $row['id'];
		$documentazione->idPaziente = $row['idPaziente'];
		$documentazione->dataAcquisizione = $row['dataAcquisizione'];
		$documentazione->dataDocumento = $row['dataDocumento'];
		$documentazione->descrizione = $row['descrizione'];
		$documentazione->allegato = $row['allegato'];

		return $documentazione;
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
	 * @return DocumentazioneMySql 
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