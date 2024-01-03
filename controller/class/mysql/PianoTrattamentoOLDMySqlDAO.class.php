<?php
/**
 * Class that operate on table 'pianoTrattamento_OLD'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PianoTrattamentoOLDMySqlDAO implements PianoTrattamentoOLDDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PianoTrattamentoOLDMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pianoTrattamento_OLD';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pianoTrattamento_OLD ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pianoTrattamentoOLD primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoOLDMySql pianoTrattamentoOLD
 	 */
	public function insert($pianoTrattamentoOLD){
		$sql = 'INSERT INTO pianoTrattamento_OLD (idPaziente, titolo, data, seduteNumero, imponibile, totaleIva, totaleTrattamento, totaleSaldato, totaleDaSaldare, abbuono, eccedenza, stato, note, isChiuso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoOLD->idPaziente);
		$sqlQuery->set($pianoTrattamentoOLD->titolo);
		$sqlQuery->set($pianoTrattamentoOLD->data);
		$sqlQuery->setNumber($pianoTrattamentoOLD->seduteNumero);
		$sqlQuery->set($pianoTrattamentoOLD->imponibile);
		$sqlQuery->set($pianoTrattamentoOLD->totaleIva);
		$sqlQuery->set($pianoTrattamentoOLD->totaleTrattamento);
		$sqlQuery->set($pianoTrattamentoOLD->totaleSaldato);
		$sqlQuery->set($pianoTrattamentoOLD->totaleDaSaldare);
		$sqlQuery->set($pianoTrattamentoOLD->abbuono);
		$sqlQuery->set($pianoTrattamentoOLD->eccedenza);
		$sqlQuery->setNumber($pianoTrattamentoOLD->stato);
		$sqlQuery->set($pianoTrattamentoOLD->note);
		$sqlQuery->setNumber($pianoTrattamentoOLD->isChiuso);

		$id = $this->executeInsert($sqlQuery);	
		$pianoTrattamentoOLD->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoOLDMySql pianoTrattamentoOLD
 	 */
	public function update($pianoTrattamentoOLD){
		$sql = 'UPDATE pianoTrattamento_OLD SET idPaziente = ?, titolo = ?, data = ?, seduteNumero = ?, imponibile = ?, totaleIva = ?, totaleTrattamento = ?, totaleSaldato = ?, totaleDaSaldare = ?, abbuono = ?, eccedenza = ?, stato = ?, note = ?, isChiuso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoOLD->idPaziente);
		$sqlQuery->set($pianoTrattamentoOLD->titolo);
		$sqlQuery->set($pianoTrattamentoOLD->data);
		$sqlQuery->setNumber($pianoTrattamentoOLD->seduteNumero);
		$sqlQuery->set($pianoTrattamentoOLD->imponibile);
		$sqlQuery->set($pianoTrattamentoOLD->totaleIva);
		$sqlQuery->set($pianoTrattamentoOLD->totaleTrattamento);
		$sqlQuery->set($pianoTrattamentoOLD->totaleSaldato);
		$sqlQuery->set($pianoTrattamentoOLD->totaleDaSaldare);
		$sqlQuery->set($pianoTrattamentoOLD->abbuono);
		$sqlQuery->set($pianoTrattamentoOLD->eccedenza);
		$sqlQuery->setNumber($pianoTrattamentoOLD->stato);
		$sqlQuery->set($pianoTrattamentoOLD->note);
		$sqlQuery->setNumber($pianoTrattamentoOLD->isChiuso);

		$sqlQuery->setNumber($pianoTrattamentoOLD->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pianoTrattamento_OLD';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPaziente($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitolo($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySeduteNumero($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE seduteNumero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImponibile($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleIva($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleTrattamento($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE totaleTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleSaldato($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDaSaldare($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbuono($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEccedenza($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStato($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsChiuso($value){
		$sql = 'SELECT * FROM pianoTrattamento_OLD WHERE isChiuso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPaziente($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitolo($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySeduteNumero($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE seduteNumero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImponibile($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleIva($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleTrattamento($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE totaleTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleSaldato($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDaSaldare($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbuono($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEccedenza($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStato($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsChiuso($value){
		$sql = 'DELETE FROM pianoTrattamento_OLD WHERE isChiuso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PianoTrattamentoOLDMySql 
	 */
	protected function readRow($row){
		$pianoTrattamentoOLD = new PianoTrattamentoOLD();
		
		$pianoTrattamentoOLD->id = $row['id'];
		$pianoTrattamentoOLD->idPaziente = $row['idPaziente'];
		$pianoTrattamentoOLD->titolo = $row['titolo'];
		$pianoTrattamentoOLD->data = $row['data'];
		$pianoTrattamentoOLD->seduteNumero = $row['seduteNumero'];
		$pianoTrattamentoOLD->imponibile = $row['imponibile'];
		$pianoTrattamentoOLD->totaleIva = $row['totaleIva'];
		$pianoTrattamentoOLD->totaleTrattamento = $row['totaleTrattamento'];
		$pianoTrattamentoOLD->totaleSaldato = $row['totaleSaldato'];
		$pianoTrattamentoOLD->totaleDaSaldare = $row['totaleDaSaldare'];
		$pianoTrattamentoOLD->abbuono = $row['abbuono'];
		$pianoTrattamentoOLD->eccedenza = $row['eccedenza'];
		$pianoTrattamentoOLD->stato = $row['stato'];
		$pianoTrattamentoOLD->note = $row['note'];
		$pianoTrattamentoOLD->isChiuso = $row['isChiuso'];

		return $pianoTrattamentoOLD;
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
	 * @return PianoTrattamentoOLDMySql 
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