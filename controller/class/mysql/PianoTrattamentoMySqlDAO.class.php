<?php
/**
 * Class that operate on table 'pianoTrattamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PianoTrattamentoMySqlDAO implements PianoTrattamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PianoTrattamentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pianoTrattamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pianoTrattamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pianoTrattamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pianoTrattamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pianoTrattamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoMySql pianoTrattamento
 	 */
	public function insert($pianoTrattamento){
		$sql = 'INSERT INTO pianoTrattamento (idPaziente, titolo, data, seduteNumero, imponibile, totaleIva, totaleTrattamento, totaleSaldato, totaleDaSaldare, abbuono, eccedenza, stato, note, zonaTrattata, zonaTrattataDescrizione, prenotazioni, dataInizio, dataFine, isChiuso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamento->idPaziente);
		$sqlQuery->set($pianoTrattamento->titolo);
		$sqlQuery->set($pianoTrattamento->data);
		$sqlQuery->setNumber($pianoTrattamento->seduteNumero);
		$sqlQuery->set($pianoTrattamento->imponibile);
		$sqlQuery->set($pianoTrattamento->totaleIva);
		$sqlQuery->set($pianoTrattamento->totaleTrattamento);
		$sqlQuery->set($pianoTrattamento->totaleSaldato);
		$sqlQuery->set($pianoTrattamento->totaleDaSaldare);
		$sqlQuery->set($pianoTrattamento->abbuono);
		$sqlQuery->set($pianoTrattamento->eccedenza);
		$sqlQuery->setNumber($pianoTrattamento->stato);
		$sqlQuery->set($pianoTrattamento->note);
		$sqlQuery->set($pianoTrattamento->zonaTrattata);
		$sqlQuery->set($pianoTrattamento->zonaTrattataDescrizione);
		$sqlQuery->setNumber($pianoTrattamento->prenotazioni);
		$sqlQuery->set($pianoTrattamento->dataInizio);
		$sqlQuery->set($pianoTrattamento->dataFine);
		$sqlQuery->setNumber($pianoTrattamento->isChiuso);

		$id = $this->executeInsert($sqlQuery);	
		$pianoTrattamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoMySql pianoTrattamento
 	 */
	public function update($pianoTrattamento){
		$sql = 'UPDATE pianoTrattamento SET idPaziente = ?, titolo = ?, data = ?, seduteNumero = ?, imponibile = ?, totaleIva = ?, totaleTrattamento = ?, totaleSaldato = ?, totaleDaSaldare = ?, abbuono = ?, eccedenza = ?, stato = ?, note = ?, zonaTrattata = ?, zonaTrattataDescrizione = ?, prenotazioni = ?, dataInizio = ?, dataFine = ?, isChiuso = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamento->idPaziente);
		$sqlQuery->set($pianoTrattamento->titolo);
		$sqlQuery->set($pianoTrattamento->data);
		$sqlQuery->setNumber($pianoTrattamento->seduteNumero);
		$sqlQuery->set($pianoTrattamento->imponibile);
		$sqlQuery->set($pianoTrattamento->totaleIva);
		$sqlQuery->set($pianoTrattamento->totaleTrattamento);
		$sqlQuery->set($pianoTrattamento->totaleSaldato);
		$sqlQuery->set($pianoTrattamento->totaleDaSaldare);
		$sqlQuery->set($pianoTrattamento->abbuono);
		$sqlQuery->set($pianoTrattamento->eccedenza);
		$sqlQuery->setNumber($pianoTrattamento->stato);
		$sqlQuery->set($pianoTrattamento->note);
		$sqlQuery->set($pianoTrattamento->zonaTrattata);
		$sqlQuery->set($pianoTrattamento->zonaTrattataDescrizione);
		$sqlQuery->setNumber($pianoTrattamento->prenotazioni);
		$sqlQuery->set($pianoTrattamento->dataInizio);
		$sqlQuery->set($pianoTrattamento->dataFine);
		$sqlQuery->setNumber($pianoTrattamento->isChiuso);

		$sqlQuery->setNumber($pianoTrattamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pianoTrattamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPaziente($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitolo($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySeduteNumero($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE seduteNumero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImponibile($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleIva($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleTrattamento($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE totaleTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleSaldato($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDaSaldare($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbuono($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEccedenza($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStato($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZonaTrattata($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZonaTrattataDescrizione($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE zonaTrattataDescrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrenotazioni($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE prenotazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInizio($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE dataInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFine($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE dataFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsChiuso($value){
		$sql = 'SELECT * FROM pianoTrattamento WHERE isChiuso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPaziente($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE idPaziente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitolo($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE titolo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySeduteNumero($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE seduteNumero = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImponibile($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleIva($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleTrattamento($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE totaleTrattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleSaldato($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDaSaldare($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbuono($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEccedenza($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStato($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE stato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZonaTrattata($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZonaTrattataDescrizione($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE zonaTrattataDescrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrenotazioni($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE prenotazioni = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInizio($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE dataInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFine($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE dataFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsChiuso($value){
		$sql = 'DELETE FROM pianoTrattamento WHERE isChiuso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PianoTrattamentoMySql 
	 */
	protected function readRow($row){
		$pianoTrattamento = new PianoTrattamento();
		
		$pianoTrattamento->id = $row['id'];
		$pianoTrattamento->idPaziente = $row['idPaziente'];
		$pianoTrattamento->titolo = $row['titolo'];
		$pianoTrattamento->data = $row['data'];
		$pianoTrattamento->seduteNumero = $row['seduteNumero'];
		$pianoTrattamento->imponibile = $row['imponibile'];
		$pianoTrattamento->totaleIva = $row['totaleIva'];
		$pianoTrattamento->totaleTrattamento = $row['totaleTrattamento'];
		$pianoTrattamento->totaleSaldato = $row['totaleSaldato'];
		$pianoTrattamento->totaleDaSaldare = $row['totaleDaSaldare'];
		$pianoTrattamento->abbuono = $row['abbuono'];
		$pianoTrattamento->eccedenza = $row['eccedenza'];
		$pianoTrattamento->stato = $row['stato'];
		$pianoTrattamento->note = $row['note'];
		$pianoTrattamento->zonaTrattata = $row['zonaTrattata'];
		$pianoTrattamento->zonaTrattataDescrizione = $row['zonaTrattataDescrizione'];
		$pianoTrattamento->prenotazioni = $row['prenotazioni'];
		$pianoTrattamento->dataInizio = $row['dataInizio'];
		$pianoTrattamento->dataFine = $row['dataFine'];
		$pianoTrattamento->isChiuso = $row['isChiuso'];

		return $pianoTrattamento;
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
	 * @return PianoTrattamentoMySql 
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