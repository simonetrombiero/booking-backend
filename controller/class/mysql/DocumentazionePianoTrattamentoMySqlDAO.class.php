<?php
/**
 * Class that operate on table 'documentazione_pianoTrattamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DocumentazionePianoTrattamentoMySqlDAO implements DocumentazionePianoTrattamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentazionePianoTrattamentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM documentazione_pianoTrattamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM documentazione_pianoTrattamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM documentazione_pianoTrattamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param documentazionePianoTrattamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM documentazione_pianoTrattamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentazionePianoTrattamentoMySql documentazionePianoTrattamento
 	 */
	public function insert($documentazionePianoTrattamento){
		$sql = 'INSERT INTO documentazione_pianoTrattamento (idDocumentazione, idPianoTrattamento) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentazionePianoTrattamento->idDocumentazione);
		$sqlQuery->setNumber($documentazionePianoTrattamento->idPianoTrattamento);

		$id = $this->executeInsert($sqlQuery);	
		$documentazionePianoTrattamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentazionePianoTrattamentoMySql documentazionePianoTrattamento
 	 */
	public function update($documentazionePianoTrattamento){
		$sql = 'UPDATE documentazione_pianoTrattamento SET idDocumentazione = ?, idPianoTrattamento = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentazionePianoTrattamento->idDocumentazione);
		$sqlQuery->setNumber($documentazionePianoTrattamento->idPianoTrattamento);

		$sqlQuery->setNumber($documentazionePianoTrattamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM documentazione_pianoTrattamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdDocumentazione($value){
		$sql = 'SELECT * FROM documentazione_pianoTrattamento WHERE idDocumentazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPianoTrattamento($value){
		$sql = 'SELECT * FROM documentazione_pianoTrattamento WHERE idPianoTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdDocumentazione($value){
		$sql = 'DELETE FROM documentazione_pianoTrattamento WHERE idDocumentazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPianoTrattamento($value){
		$sql = 'DELETE FROM documentazione_pianoTrattamento WHERE idPianoTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentazionePianoTrattamentoMySql 
	 */
	protected function readRow($row){
		$documentazionePianoTrattamento = new DocumentazionePianoTrattamento();
		
		$documentazionePianoTrattamento->id = $row['id'];
		$documentazionePianoTrattamento->idDocumentazione = $row['idDocumentazione'];
		$documentazionePianoTrattamento->idPianoTrattamento = $row['idPianoTrattamento'];

		return $documentazionePianoTrattamento;
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
	 * @return DocumentazionePianoTrattamentoMySql 
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