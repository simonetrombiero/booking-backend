<?php
/**
 * Class that operate on table 'pianoTrattamentoItem'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PianoTrattamentoItemMySqlDAO implements PianoTrattamentoItemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PianoTrattamentoItemMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pianoTrattamentoItem';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pianoTrattamentoItem ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pianoTrattamentoItem primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PianoTrattamentoItemMySql pianoTrattamentoItem
 	 */
	public function insert($pianoTrattamentoItem){
		$sql = 'INSERT INTO pianoTrattamentoItem (idPiano, idTrattamentoPiano, numeroRiga, qta, trattamento, prezzoUnitario, totaleRiga, status, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoItem->idPiano);
		$sqlQuery->setNumber($pianoTrattamentoItem->idTrattamentoPiano);
		$sqlQuery->setNumber($pianoTrattamentoItem->numeroRiga);
		$sqlQuery->setNumber($pianoTrattamentoItem->qta);
		$sqlQuery->set($pianoTrattamentoItem->trattamento);
		$sqlQuery->set($pianoTrattamentoItem->prezzoUnitario);
		$sqlQuery->set($pianoTrattamentoItem->totaleRiga);
		$sqlQuery->setNumber($pianoTrattamentoItem->status);
		$sqlQuery->set($pianoTrattamentoItem->note);

		$id = $this->executeInsert($sqlQuery);	
		$pianoTrattamentoItem->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PianoTrattamentoItemMySql pianoTrattamentoItem
 	 */
	public function update($pianoTrattamentoItem){
		$sql = 'UPDATE pianoTrattamentoItem SET idPiano = ?, idTrattamentoPiano = ?, numeroRiga = ?, qta = ?, trattamento = ?, prezzoUnitario = ?, totaleRiga = ?, status = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pianoTrattamentoItem->idPiano);
		$sqlQuery->setNumber($pianoTrattamentoItem->idTrattamentoPiano);
		$sqlQuery->setNumber($pianoTrattamentoItem->numeroRiga);
		$sqlQuery->setNumber($pianoTrattamentoItem->qta);
		$sqlQuery->set($pianoTrattamentoItem->trattamento);
		$sqlQuery->set($pianoTrattamentoItem->prezzoUnitario);
		$sqlQuery->set($pianoTrattamentoItem->totaleRiga);
		$sqlQuery->setNumber($pianoTrattamentoItem->status);
		$sqlQuery->set($pianoTrattamentoItem->note);

		$sqlQuery->setNumber($pianoTrattamentoItem->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pianoTrattamentoItem';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPiano($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE idPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTrattamentoPiano($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE idTrattamentoPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNumeroRiga($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE numeroRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQta($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrezzoUnitario($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE prezzoUnitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleRiga($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE totaleRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM pianoTrattamentoItem WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPiano($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE idPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTrattamentoPiano($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE idTrattamentoPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNumeroRiga($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE numeroRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQta($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrezzoUnitario($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE prezzoUnitario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleRiga($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE totaleRiga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM pianoTrattamentoItem WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PianoTrattamentoItemMySql 
	 */
	protected function readRow($row){
		$pianoTrattamentoItem = new PianoTrattamentoItem();
		
		$pianoTrattamentoItem->id = $row['id'];
		$pianoTrattamentoItem->idPiano = $row['idPiano'];
		$pianoTrattamentoItem->idTrattamentoPiano = $row['idTrattamentoPiano'];
		$pianoTrattamentoItem->numeroRiga = $row['numeroRiga'];
		$pianoTrattamentoItem->qta = $row['qta'];
		$pianoTrattamentoItem->trattamento = $row['trattamento'];
		$pianoTrattamentoItem->prezzoUnitario = $row['prezzoUnitario'];
		$pianoTrattamentoItem->totaleRiga = $row['totaleRiga'];
		$pianoTrattamentoItem->status = $row['status'];
		$pianoTrattamentoItem->note = $row['note'];

		return $pianoTrattamentoItem;
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
	 * @return PianoTrattamentoItemMySql 
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