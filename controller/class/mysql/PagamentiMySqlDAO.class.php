<?php
/**
 * Class that operate on table 'pagamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PagamentiMySqlDAO implements PagamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagamentiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagamenti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pagamenti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagamentiMySql pagamenti
 	 */
	public function insert($pagamenti){
		$sql = 'INSERT INTO pagamenti (cliente, id_piano, data, importo, modalitaPagamento, riferimentoDoc) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pagamenti->cliente);
		$sqlQuery->set($pagamenti->id_piano);
		$sqlQuery->set($pagamenti->data);
		$sqlQuery->set($pagamenti->importo);
		$sqlQuery->setNumber($pagamenti->modalitaPagamento);
		$sqlQuery->setNumber($pagamenti->riferimentoDoc);

		$id = $this->executeInsert($sqlQuery);	
		$pagamenti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagamentiMySql pagamenti
 	 */
	public function update($pagamenti){
		$sql = 'UPDATE pagamenti SET cliente = ?, id_piano = ?, data = ?, importo = ?, modalitaPagamento = ?, riferimentoDoc = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pagamenti->cliente);
		$sqlQuery->setNumber($pagamenti->id_piano);
		$sqlQuery->set($pagamenti->data);
		$sqlQuery->set($pagamenti->importo);
		$sqlQuery->setNumber($pagamenti->modalitaPagamento);
		$sqlQuery->setNumber($pagamenti->riferimentoDoc);

		$sqlQuery->setNumber($pagamenti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCliente($value){
		$sql = 'SELECT * FROM pagamenti WHERE cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM pagamenti WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporto($value){
		$sql = 'SELECT * FROM pagamenti WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModalitaPagamento($value){
		$sql = 'SELECT * FROM pagamenti WHERE modalitaPagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRiferimentoDoc($value){
		$sql = 'SELECT * FROM pagamenti WHERE riferimentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPiano($value){
		$sql = 'SELECT * FROM pagamenti WHERE id_piano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCliente($value){
		$sql = 'DELETE FROM pagamenti WHERE cliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM pagamenti WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporto($value){
		$sql = 'DELETE FROM pagamenti WHERE importo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModalitaPagamento($value){
		$sql = 'DELETE FROM pagamenti WHERE modalitaPagamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRiferimentoDoc($value){
		$sql = 'DELETE FROM pagamenti WHERE riferimentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagamentiMySql 
	 */
	protected function readRow($row){
		$pagamenti = new Pagamenti();
		
		$pagamenti->id = $row['id'];
		$pagamenti->cliente = $row['cliente'];
		$pagamenti->id_piano = $row['id_piano'];
		$pagamenti->data = $row['data'];
		$pagamenti->importo = $row['importo'];
		$pagamenti->modalitaPagamento = $row['modalitaPagamento'];
		$pagamenti->riferimentoDoc = $row['riferimentoDoc'];

		return $pagamenti;
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
	 * @return PagamentiMySql 
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