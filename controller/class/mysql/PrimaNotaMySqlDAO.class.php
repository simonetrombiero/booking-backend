<?php
/**
 * Class that operate on table 'primaNota'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PrimaNotaMySqlDAO implements PrimaNotaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PrimaNotaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM primaNota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM primaNota';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM primaNota ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param primaNota primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM primaNota WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrimaNotaMySql primaNota
 	 */
	public function insert($primaNota){
		$sql = 'INSERT INTO primaNota (data, descrizione, movimento, importo, modalitaPagamento, note) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($primaNota->data);
		$sqlQuery->set($primaNota->descrizione);
		$sqlQuery->set($primaNota->movimento);
		$sqlQuery->set($primaNota->importo);
		$sqlQuery->setNumber($primaNota->modalitaPagamento);
		$sqlQuery->set($primaNota->note);

		$id = $this->executeInsert($sqlQuery);	
		$primaNota->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrimaNotaMySql primaNota
 	 */
	public function update($primaNota){
		$sql = 'UPDATE primaNota SET data = ?, descrizione = ?, movimento = ?, importo = ?, modalitaPagamento = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($primaNota->data);
		$sqlQuery->set($primaNota->descrizione);
		$sqlQuery->set($primaNota->movimento);
		$sqlQuery->set($primaNota->importo);
		$sqlQuery->setNumber($primaNota->modalitaPagamento);
		$sqlQuery->set($primaNota->note);

		$sqlQuery->setNumber($primaNota->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM primaNota';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM primaNota WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM primaNota WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByMovimento($value){
		$sql = 'SELECT * FROM primaNota WHERE movimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporto($value){
		$sql = 'SELECT * FROM primaNota WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalitaPagamento($value){
		$sql = 'SELECT * FROM primaNota WHERE modalitaPagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM primaNota WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByData($value){
		$sql = 'DELETE FROM primaNota WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM primaNota WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMovimento($value){
		$sql = 'DELETE FROM primaNota WHERE movimento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporto($value){
		$sql = 'DELETE FROM primaNota WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalitaPagamento($value){
		$sql = 'DELETE FROM primaNota WHERE modalitaPagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM primaNota WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PrimaNotaMySql 
	 */
	protected function readRow($row){
		$primaNota = new PrimaNota();
		
		$primaNota->id = $row['id'];
		$primaNota->data = $row['data'];
		$primaNota->descrizione = $row['descrizione'];
		$primaNota->movimento = $row['movimento'];
		$primaNota->importo = $row['importo'];
		$primaNota->modalitaPagamento = $row['modalitaPagamento'];
		$primaNota->note = $row['note'];

		return $primaNota;
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
	 * @return PrimaNotaMySql 
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