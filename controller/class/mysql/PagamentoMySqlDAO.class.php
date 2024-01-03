<?php
/**
 * Class that operate on table 'pagamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class PagamentoMySqlDAO implements PagamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PagamentoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM pagamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pagamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pagamento ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pagamento primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM pagamento WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PagamentoMySql pagamento
 	 */
	public function insert($pagamento){
		$sql = 'INSERT INTO pagamento (cliente, data, importo, modalitaPagamento, riferimentoDoc) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		echo $sql;

		$sqlQuery->setNumber($pagamento->cliente);
		$sqlQuery->set($pagamento->data);
		$sqlQuery->set($pagamento->importo);
		$sqlQuery->setNumber($pagamento->modalitaPagamento);
		$sqlQuery->setNumber($pagamento->riferimentoDoc);

		$id = $this->executeInsert($sqlQuery);	
		$pagamento->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PagamentoMySql pagamento
 	 */
	public function update($pagamento){
		$sql = 'UPDATE pagamento SET idRisorsa = ?, nome = ?, isFineMese = ?, isPagamentoImmediato = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($pagamento->idRisorsa);
		$sqlQuery->set($pagamento->nome);
		$sqlQuery->setNumber($pagamento->isFineMese);
		$sqlQuery->setNumber($pagamento->isPagamentoImmediato);

		$sqlQuery->setNumber($pagamento->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pagamento';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdRisorsa($value){
		$sql = 'SELECT * FROM pagamento WHERE idRisorsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM pagamento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsFineMese($value){
		$sql = 'SELECT * FROM pagamento WHERE isFineMese = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsPagamentoImmediato($value){
		$sql = 'SELECT * FROM pagamento WHERE isPagamentoImmediato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRisorsa($value){
		$sql = 'DELETE FROM pagamento WHERE idRisorsa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNome($value){
		$sql = 'DELETE FROM pagamento WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsFineMese($value){
		$sql = 'DELETE FROM pagamento WHERE isFineMese = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsPagamentoImmediato($value){
		$sql = 'DELETE FROM pagamento WHERE isPagamentoImmediato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PagamentoMySql 
	 */
	protected function readRow($row){
		$pagamento = new Pagamento();
		
		$pagamento->id = $row['id'];
		$pagamento->idRisorsa = $row['idRisorsa'];
		$pagamento->nome = $row['nome'];
		$pagamento->isFineMese = $row['isFineMese'];
		$pagamento->isPagamentoImmediato = $row['isPagamentoImmediato'];

		return $pagamento;
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
	 * @return PagamentoMySql 
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