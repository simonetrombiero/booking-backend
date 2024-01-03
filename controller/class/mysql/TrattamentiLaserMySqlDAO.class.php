<?php
/**
 * Class that operate on table 'trattamentiLaser'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class TrattamentiLaserMySqlDAO implements TrattamentiLaserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TrattamentiLaserMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM trattamentiLaser WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM trattamentiLaser';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM trattamentiLaser ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param trattamentiLaser primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM trattamentiLaser WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TrattamentiLaserMySql trattamentiLaser
 	 */
	public function insert($trattamentiLaser){
		$sql = 'INSERT INTO trattamentiLaser (idCliente, data, zonaTrattata, durata, fototipo, potenza, impulso, frequenza, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($trattamentiLaser->idCliente);
		$sqlQuery->set($trattamentiLaser->data);
		$sqlQuery->set($trattamentiLaser->zonaTrattata);
		$sqlQuery->set($trattamentiLaser->durata);
		$sqlQuery->set($trattamentiLaser->fototipo);
		$sqlQuery->set($trattamentiLaser->potenza);
		$sqlQuery->set($trattamentiLaser->impulso);
		$sqlQuery->set($trattamentiLaser->frequenza);
		$sqlQuery->set($trattamentiLaser->note);

		$id = $this->executeInsert($sqlQuery);	
		$trattamentiLaser->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TrattamentiLaserMySql trattamentiLaser
 	 */
	public function update($trattamentiLaser){
		$sql = 'UPDATE trattamentiLaser SET idCliente = ?, data = ?, zonaTrattata = ?, durata = ?, fototipo = ?, potenza = ?, impulso = ?, frequenza = ?, note = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($trattamentiLaser->idCliente);
		$sqlQuery->set($trattamentiLaser->data);
		$sqlQuery->set($trattamentiLaser->zonaTrattata);
		$sqlQuery->set($trattamentiLaser->durata);
		$sqlQuery->set($trattamentiLaser->fototipo);
		$sqlQuery->set($trattamentiLaser->potenza);
		$sqlQuery->set($trattamentiLaser->impulso);
		$sqlQuery->set($trattamentiLaser->frequenza);
		$sqlQuery->set($trattamentiLaser->note);

		$sqlQuery->setNumber($trattamentiLaser->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM trattamentiLaser';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByZonaTrattata($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDurata($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE durata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFototipo($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE fototipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPotenza($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE potenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImpulso($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE impulso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFrequenza($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE frequenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM trattamentiLaser WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByZonaTrattata($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE zonaTrattata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurata($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE durata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFototipo($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE fototipo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPotenza($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE potenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImpulso($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE impulso = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFrequenza($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE frequenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM trattamentiLaser WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TrattamentiLaserMySql 
	 */
	protected function readRow($row){
		$trattamentiLaser = new TrattamentiLaser();
		
		$trattamentiLaser->id = $row['id'];
		$trattamentiLaser->idCliente = $row['idCliente'];
		$trattamentiLaser->data = $row['data'];
		$trattamentiLaser->zonaTrattata = $row['zonaTrattata'];
		$trattamentiLaser->durata = $row['durata'];
		$trattamentiLaser->fototipo = $row['fototipo'];
		$trattamentiLaser->potenza = $row['potenza'];
		$trattamentiLaser->impulso = $row['impulso'];
		$trattamentiLaser->frequenza = $row['frequenza'];
		$trattamentiLaser->note = $row['note'];

		return $trattamentiLaser;
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
	 * @return TrattamentiLaserMySql 
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