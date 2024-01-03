<?php
/**
 * Class that operate on table 'pianoTrattamentoDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PianoTrattamentoDettaglioMySqlDAO implements PianoTrattamentoDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PianoTrattamentoDettaglioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pianoTrattamentoDettaglio primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoDettaglioMySql pianoTrattamentoDettaglio
 	 */
	public function insert($pianoTrattamentoDettaglio){
		$sql = 'INSERT INTO pianoTrattamentoDettaglio (trattamentoID, progressivo, trattamento, zona, data, tempo, oraInizio, oreFine, postazione, operatore, status, noShow, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->trattamentoID);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->progressivo);
		$sqlQuery->set($pianoTrattamentoDettaglio->trattamento);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->zona);
		$sqlQuery->set($pianoTrattamentoDettaglio->data);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->tempo);
		$sqlQuery->set($pianoTrattamentoDettaglio->oraInizio);
		$sqlQuery->set($pianoTrattamentoDettaglio->oreFine);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->postazione);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->operatore);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->status);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->noShow);
		$sqlQuery->set($pianoTrattamentoDettaglio->note);

		$id = $this->executeInsert($sqlQuery);	
		$pianoTrattamentoDettaglio->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoDettaglioMySql pianoTrattamentoDettaglio
 	 */
	public function update($pianoTrattamentoDettaglio){
		$sql = 'UPDATE pianoTrattamentoDettaglio SET trattamentoID = ?, progressivo = ?, trattamento = ?, zona = ?, data = ?, tempo = ?, oraInizio = ?, oreFine = ?, postazione = ?, operatore = ?, status = ?, noShow = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->trattamentoID);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->progressivo);
		$sqlQuery->set($pianoTrattamentoDettaglio->trattamento);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->zona);
		$sqlQuery->set($pianoTrattamentoDettaglio->data);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->tempo);
		$sqlQuery->set($pianoTrattamentoDettaglio->oraInizio);
		$sqlQuery->set($pianoTrattamentoDettaglio->oreFine);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->postazione);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->operatore);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->status);
		$sqlQuery->setNumber($pianoTrattamentoDettaglio->noShow);
		$sqlQuery->set($pianoTrattamentoDettaglio->note);

		$sqlQuery->setNumber($pianoTrattamentoDettaglio->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTrattamentoID($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProgressivo($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZona($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempo($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE tempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraInizio($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE oraInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOreFine($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE oreFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPostazione($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE postazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOperatore($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNoShow($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTrattamentoID($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE trattamentoID = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProgressivo($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZona($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE zona = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempo($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE tempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraInizio($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE oraInizio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOreFine($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE oreFine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPostazione($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE postazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOperatore($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE operatore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoShow($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE noShow = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM pianoTrattamentoDettaglio WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PianoTrattamentoDettaglioMySql 
	 */
	protected function readRow($row){
		$pianoTrattamentoDettaglio = new PianoTrattamentoDettaglio();
		
		$pianoTrattamentoDettaglio->id = $row['id'];
		$pianoTrattamentoDettaglio->trattamentoID = $row['trattamentoID'];
		$pianoTrattamentoDettaglio->progressivo = $row['progressivo'];
		$pianoTrattamentoDettaglio->trattamento = $row['trattamento'];
		$pianoTrattamentoDettaglio->zona = $row['zona'];
		$pianoTrattamentoDettaglio->data = $row['data'];
		$pianoTrattamentoDettaglio->tempo = $row['tempo'];
		$pianoTrattamentoDettaglio->oraInizio = $row['oraInizio'];
		$pianoTrattamentoDettaglio->oreFine = $row['oreFine'];
		$pianoTrattamentoDettaglio->postazione = $row['postazione'];
		$pianoTrattamentoDettaglio->operatore = $row['operatore'];
		$pianoTrattamentoDettaglio->status = $row['status'];
		$pianoTrattamentoDettaglio->noShow = $row['noShow'];
		$pianoTrattamentoDettaglio->note = $row['note'];

		return $pianoTrattamentoDettaglio;
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
	 * @return PianoTrattamentoDettaglioMySql 
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