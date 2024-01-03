<?php
/**
 * Class that operate on table 'trattamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class TrattamentiMySqlDAO implements TrattamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TrattamentiMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM trattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM trattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM trattamenti ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param trattamenti primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM trattamenti WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TrattamentiMySql trattamenti
 	 */
	public function insert($trattamenti){
		$sql = 'INSERT INTO trattamenti (codice, trattamento, categoria, classificazione, costo, idAliquota, tempo) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($trattamenti->codice);
		$sqlQuery->set($trattamenti->trattamento);
		$sqlQuery->setNumber($trattamenti->categoria);
		$sqlQuery->set($trattamenti->classificazione);
		$sqlQuery->set($trattamenti->costo);
		$sqlQuery->setNumber($trattamenti->idAliquota);
		$sqlQuery->set($trattamenti->tempo);

		$id = $this->executeInsert($sqlQuery);	
		$trattamenti->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TrattamentiMySql trattamenti
 	 */
	public function update($trattamenti){
		$sql = 'UPDATE trattamenti SET codice = ?, trattamento = ?, categoria = ?, classificazione = ?, costo = ?, idAliquota = ?, tempo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($trattamenti->codice);
		$sqlQuery->set($trattamenti->trattamento);
		$sqlQuery->setNumber($trattamenti->categoria);
		$sqlQuery->set($trattamenti->classificazione);
		$sqlQuery->set($trattamenti->costo);
		$sqlQuery->setNumber($trattamenti->idAliquota);
		$sqlQuery->set($trattamenti->tempo);

		$sqlQuery->setNumber($trattamenti->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM trattamenti';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM trattamenti WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTrattamento($value){
		$sql = 'SELECT * FROM trattamenti WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCategoria($value){
		$sql = 'SELECT * FROM trattamenti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByClassificazione($value){
		$sql = 'SELECT * FROM trattamenti WHERE classificazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCosto($value){
		$sql = 'SELECT * FROM trattamenti WHERE costo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAliquota($value){
		$sql = 'SELECT * FROM trattamenti WHERE idAliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTempo($value){
		$sql = 'SELECT * FROM trattamenti WHERE tempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodice($value){
		$sql = 'DELETE FROM trattamenti WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTrattamento($value){
		$sql = 'DELETE FROM trattamenti WHERE trattamento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCategoria($value){
		$sql = 'DELETE FROM trattamenti WHERE categoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByClassificazione($value){
		$sql = 'DELETE FROM trattamenti WHERE classificazione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCosto($value){
		$sql = 'DELETE FROM trattamenti WHERE costo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAliquota($value){
		$sql = 'DELETE FROM trattamenti WHERE idAliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempo($value){
		$sql = 'DELETE FROM trattamenti WHERE tempo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TrattamentiMySql 
	 */
	protected function readRow($row){
		$trattamenti = new Trattamenti();
		
		$trattamenti->id = $row['id'];
		$trattamenti->codice = $row['codice'];
		$trattamenti->trattamento = $row['trattamento'];
		$trattamenti->categoria = $row['categoria'];
		$trattamenti->classificazione = $row['classificazione'];
		$trattamenti->costo = $row['costo'];
		$trattamenti->idAliquota = $row['idAliquota'];
		$trattamenti->tempo = $row['tempo'];

		return $trattamenti;
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
	 * @return TrattamentiMySql 
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