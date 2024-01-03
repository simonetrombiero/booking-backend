<?php
/**
 * Class that operate on table 'anamnesticoQuestionario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class AnamnesticoQuestionarioMySqlDAO implements AnamnesticoQuestionarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AnamnesticoQuestionarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM anamnesticoQuestionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM anamnesticoQuestionario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoQuestionario primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoQuestionarioMySql anamnesticoQuestionario
 	 */
	public function insert($anamnesticoQuestionario){
		$sql = 'INSERT INTO anamnesticoQuestionario (idAnamnestico, idGruppo, domanda, opzioneRisposta, tipoRisposta, ordine, isObbligatorio) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoQuestionario->idAnamnestico);
		$sqlQuery->setNumber($anamnesticoQuestionario->idGruppo);
		$sqlQuery->set($anamnesticoQuestionario->domanda);
		$sqlQuery->set($anamnesticoQuestionario->opzioneRisposta);
		$sqlQuery->setNumber($anamnesticoQuestionario->tipoRisposta);
		$sqlQuery->setNumber($anamnesticoQuestionario->ordine);
		$sqlQuery->setNumber($anamnesticoQuestionario->isObbligatorio);

		$id = $this->executeInsert($sqlQuery);	
		$anamnesticoQuestionario->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoQuestionarioMySql anamnesticoQuestionario
 	 */
	public function update($anamnesticoQuestionario){
		$sql = 'UPDATE anamnesticoQuestionario SET idAnamnestico = ?, idGruppo = ?, domanda = ?, opzioneRisposta = ?, tipoRisposta = ?, ordine = ?, isObbligatorio = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($anamnesticoQuestionario->idAnamnestico);
		$sqlQuery->setNumber($anamnesticoQuestionario->idGruppo);
		$sqlQuery->set($anamnesticoQuestionario->domanda);
		$sqlQuery->set($anamnesticoQuestionario->opzioneRisposta);
		$sqlQuery->setNumber($anamnesticoQuestionario->tipoRisposta);
		$sqlQuery->setNumber($anamnesticoQuestionario->ordine);
		$sqlQuery->setNumber($anamnesticoQuestionario->isObbligatorio);

		$sqlQuery->setNumber($anamnesticoQuestionario->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM anamnesticoQuestionario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdAnamnestico($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdGruppo($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE idGruppo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDomanda($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE domanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOpzioneRisposta($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE opzioneRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoRisposta($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE tipoRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOrdine($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsObbligatorio($value){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE isObbligatorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdAnamnestico($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE idAnamnestico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGruppo($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE idGruppo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDomanda($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE domanda = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpzioneRisposta($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE opzioneRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoRisposta($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE tipoRisposta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOrdine($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE ordine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsObbligatorio($value){
		$sql = 'DELETE FROM anamnesticoQuestionario WHERE isObbligatorio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AnamnesticoQuestionarioMySql 
	 */
	protected function readRow($row){
		$anamnesticoQuestionario = new AnamnesticoQuestionario();
		
		$anamnesticoQuestionario->id = $row['id'];
		$anamnesticoQuestionario->idAnamnestico = $row['idAnamnestico'];
		$anamnesticoQuestionario->idGruppo = $row['idGruppo'];
		$anamnesticoQuestionario->domanda = $row['domanda'];
		$anamnesticoQuestionario->opzioneRisposta = $row['opzioneRisposta'];
		$anamnesticoQuestionario->tipoRisposta = $row['tipoRisposta'];
		$anamnesticoQuestionario->ordine = $row['ordine'];
		$anamnesticoQuestionario->isObbligatorio = $row['isObbligatorio'];

		return $anamnesticoQuestionario;
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
	 * @return AnamnesticoQuestionarioMySql 
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