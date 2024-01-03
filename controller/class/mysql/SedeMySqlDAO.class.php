<?php
/**
 * Class that operate on table 'sede'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class SedeMySqlDAO implements SedeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SedeMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM sede WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM sede';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM sede ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param sede primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM sede WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SedeMySql sede
 	 */
	public function insert($sede){
		$sql = 'INSERT INTO sede (nome, indirizzo, idCitta, cap, telefono, telefono2, fax, cellulare, email, isPrincipale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($sede->nome);
		$sqlQuery->set($sede->indirizzo);
		$sqlQuery->setNumber($sede->idCitta);
		$sqlQuery->set($sede->cap);
		$sqlQuery->set($sede->telefono);
		$sqlQuery->set($sede->telefono2);
		$sqlQuery->set($sede->fax);
		$sqlQuery->set($sede->cellulare);
		$sqlQuery->set($sede->email);
		$sqlQuery->setNumber($sede->isPrincipale);

		$id = $this->executeInsert($sqlQuery);	
		$sede->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SedeMySql sede
 	 */
	public function update($sede){
		$sql = 'UPDATE sede SET nome = ?, indirizzo = ?, idCitta = ?, cap = ?, telefono = ?, telefono2 = ?, fax = ?, cellulare = ?, email = ?, isPrincipale = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($sede->nome);
		$sqlQuery->set($sede->indirizzo);
		$sqlQuery->setNumber($sede->idCitta);
		$sqlQuery->set($sede->cap);
		$sqlQuery->set($sede->telefono);
		$sqlQuery->set($sede->telefono2);
		$sqlQuery->set($sede->fax);
		$sqlQuery->set($sede->cellulare);
		$sqlQuery->set($sede->email);
		$sqlQuery->setNumber($sede->isPrincipale);

		$sqlQuery->setNumber($sede->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM sede';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNome($value){
		$sql = 'SELECT * FROM sede WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIndirizzo($value){
		$sql = 'SELECT * FROM sede WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCitta($value){
		$sql = 'SELECT * FROM sede WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCap($value){
		$sql = 'SELECT * FROM sede WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono($value){
		$sql = 'SELECT * FROM sede WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTelefono2($value){
		$sql = 'SELECT * FROM sede WHERE telefono2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value){
		$sql = 'SELECT * FROM sede WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCellulare($value){
		$sql = 'SELECT * FROM sede WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM sede WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsPrincipale($value){
		$sql = 'SELECT * FROM sede WHERE isPrincipale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNome($value){
		$sql = 'DELETE FROM sede WHERE nome = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIndirizzo($value){
		$sql = 'DELETE FROM sede WHERE indirizzo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCitta($value){
		$sql = 'DELETE FROM sede WHERE idCitta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCap($value){
		$sql = 'DELETE FROM sede WHERE cap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono($value){
		$sql = 'DELETE FROM sede WHERE telefono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelefono2($value){
		$sql = 'DELETE FROM sede WHERE telefono2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM sede WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCellulare($value){
		$sql = 'DELETE FROM sede WHERE cellulare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM sede WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsPrincipale($value){
		$sql = 'DELETE FROM sede WHERE isPrincipale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return SedeMySql 
	 */
	protected function readRow($row){
		$sede = new Sede();
		
		$sede->id = $row['id'];
		$sede->nome = $row['nome'];
		$sede->indirizzo = $row['indirizzo'];
		$sede->idCitta = $row['idCitta'];
		$sede->cap = $row['cap'];
		$sede->telefono = $row['telefono'];
		$sede->telefono2 = $row['telefono2'];
		$sede->fax = $row['fax'];
		$sede->cellulare = $row['cellulare'];
		$sede->email = $row['email'];
		$sede->isPrincipale = $row['isPrincipale'];

		return $sede;
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
	 * @return SedeMySql 
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