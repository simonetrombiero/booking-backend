<?php
/**
 * Class that operate on table 'prodotto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class ProdottoMySqlDAO implements ProdottoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProdottoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM prodotto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM prodotto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM prodotto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param prodotto primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM prodotto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProdottoMySql prodotto
 	 */
	public function insert($prodotto){
		$sql = 'INSERT INTO prodotto (codice, barcode, descrizione, idCategoria, idFornitore, prezzoAcquisto, prezzoVendita, ricaricoPerc, ricarico, utilePerc, utile, idAliquota, immagine, tipoImmagine, um, scaffale, piano, posizione, qta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prodotto->codice);
		$sqlQuery->set($prodotto->barcode);
		$sqlQuery->set($prodotto->descrizione);
		$sqlQuery->setNumber($prodotto->idCategoria);
		$sqlQuery->setNumber($prodotto->idFornitore);
		$sqlQuery->set($prodotto->prezzoAcquisto);
		$sqlQuery->set($prodotto->prezzoVendita);
		$sqlQuery->set($prodotto->ricaricoPerc);
		$sqlQuery->set($prodotto->ricarico);
		$sqlQuery->set($prodotto->utilePerc);
		$sqlQuery->set($prodotto->utile);
		$sqlQuery->setNumber($prodotto->idAliquota);
		$sqlQuery->set($prodotto->immagine);
		$sqlQuery->set($prodotto->tipoImmagine);
		$sqlQuery->set($prodotto->um);
		$sqlQuery->set($prodotto->scaffale);
		$sqlQuery->set($prodotto->piano);
		$sqlQuery->set($prodotto->posizione);
		$sqlQuery->setNumber($prodotto->qta);

		$id = $this->executeInsert($sqlQuery);	
		$prodotto->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProdottoMySql prodotto
 	 */
	public function update($prodotto){
		$sql = 'UPDATE prodotto SET codice = ?, barcode = ?, descrizione = ?, idCategoria = ?, idFornitore = ?, prezzoAcquisto = ?, prezzoVendita = ?, ricaricoPerc = ?, ricarico = ?, utilePerc = ?, utile = ?, idAliquota = ?, immagine = ?, tipoImmagine = ?, um = ?, scaffale = ?, piano = ?, posizione = ?, qta = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($prodotto->codice);
		$sqlQuery->set($prodotto->barcode);
		$sqlQuery->set($prodotto->descrizione);
		$sqlQuery->setNumber($prodotto->idCategoria);
		$sqlQuery->setNumber($prodotto->idFornitore);
		$sqlQuery->set($prodotto->prezzoAcquisto);
		$sqlQuery->set($prodotto->prezzoVendita);
		$sqlQuery->set($prodotto->ricaricoPerc);
		$sqlQuery->set($prodotto->ricarico);
		$sqlQuery->set($prodotto->utilePerc);
		$sqlQuery->set($prodotto->utile);
		$sqlQuery->setNumber($prodotto->idAliquota);
		$sqlQuery->set($prodotto->immagine);
		$sqlQuery->set($prodotto->tipoImmagine);
		$sqlQuery->set($prodotto->um);
		$sqlQuery->set($prodotto->scaffale);
		$sqlQuery->set($prodotto->piano);
		$sqlQuery->set($prodotto->posizione);
		$sqlQuery->setNumber($prodotto->qta);

		$sqlQuery->setNumber($prodotto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM prodotto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCodice($value){
		$sql = 'SELECT * FROM prodotto WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBarcode($value){
		$sql = 'SELECT * FROM prodotto WHERE barcode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescrizione($value){
		$sql = 'SELECT * FROM prodotto WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdCategoria($value){
		$sql = 'SELECT * FROM prodotto WHERE idCategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFornitore($value){
		$sql = 'SELECT * FROM prodotto WHERE idFornitore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrezzoAcquisto($value){
		$sql = 'SELECT * FROM prodotto WHERE prezzoAcquisto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPrezzoVendita($value){
		$sql = 'SELECT * FROM prodotto WHERE prezzoVendita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRicaricoPerc($value){
		$sql = 'SELECT * FROM prodotto WHERE ricaricoPerc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRicarico($value){
		$sql = 'SELECT * FROM prodotto WHERE ricarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUtilePerc($value){
		$sql = 'SELECT * FROM prodotto WHERE utilePerc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUtile($value){
		$sql = 'SELECT * FROM prodotto WHERE utile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdAliquota($value){
		$sql = 'SELECT * FROM prodotto WHERE idAliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImmagine($value){
		$sql = 'SELECT * FROM prodotto WHERE immagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipoImmagine($value){
		$sql = 'SELECT * FROM prodotto WHERE tipoImmagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUm($value){
		$sql = 'SELECT * FROM prodotto WHERE um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByScaffale($value){
		$sql = 'SELECT * FROM prodotto WHERE scaffale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPiano($value){
		$sql = 'SELECT * FROM prodotto WHERE piano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPosizione($value){
		$sql = 'SELECT * FROM prodotto WHERE posizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQta($value){
		$sql = 'SELECT * FROM prodotto WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCodice($value){
		$sql = 'DELETE FROM prodotto WHERE codice = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBarcode($value){
		$sql = 'DELETE FROM prodotto WHERE barcode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescrizione($value){
		$sql = 'DELETE FROM prodotto WHERE descrizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdCategoria($value){
		$sql = 'DELETE FROM prodotto WHERE idCategoria = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFornitore($value){
		$sql = 'DELETE FROM prodotto WHERE idFornitore = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrezzoAcquisto($value){
		$sql = 'DELETE FROM prodotto WHERE prezzoAcquisto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPrezzoVendita($value){
		$sql = 'DELETE FROM prodotto WHERE prezzoVendita = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRicaricoPerc($value){
		$sql = 'DELETE FROM prodotto WHERE ricaricoPerc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRicarico($value){
		$sql = 'DELETE FROM prodotto WHERE ricarico = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUtilePerc($value){
		$sql = 'DELETE FROM prodotto WHERE utilePerc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUtile($value){
		$sql = 'DELETE FROM prodotto WHERE utile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdAliquota($value){
		$sql = 'DELETE FROM prodotto WHERE idAliquota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImmagine($value){
		$sql = 'DELETE FROM prodotto WHERE immagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipoImmagine($value){
		$sql = 'DELETE FROM prodotto WHERE tipoImmagine = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUm($value){
		$sql = 'DELETE FROM prodotto WHERE um = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByScaffale($value){
		$sql = 'DELETE FROM prodotto WHERE scaffale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPiano($value){
		$sql = 'DELETE FROM prodotto WHERE piano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPosizione($value){
		$sql = 'DELETE FROM prodotto WHERE posizione = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQta($value){
		$sql = 'DELETE FROM prodotto WHERE qta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProdottoMySql 
	 */
	protected function readRow($row){
		$prodotto = new Prodotto();
		
		$prodotto->id = $row['id'];
		$prodotto->codice = $row['codice'];
		$prodotto->barcode = $row['barcode'];
		$prodotto->descrizione = $row['descrizione'];
		$prodotto->idCategoria = $row['idCategoria'];
		$prodotto->idFornitore = $row['idFornitore'];
		$prodotto->prezzoAcquisto = $row['prezzoAcquisto'];
		$prodotto->prezzoVendita = $row['prezzoVendita'];
		$prodotto->ricaricoPerc = $row['ricaricoPerc'];
		$prodotto->ricarico = $row['ricarico'];
		$prodotto->utilePerc = $row['utilePerc'];
		$prodotto->utile = $row['utile'];
		$prodotto->idAliquota = $row['idAliquota'];
		$prodotto->immagine = $row['immagine'];
		$prodotto->tipoImmagine = $row['tipoImmagine'];
		$prodotto->um = $row['um'];
		$prodotto->scaffale = $row['scaffale'];
		$prodotto->piano = $row['piano'];
		$prodotto->posizione = $row['posizione'];
		$prodotto->qta = $row['qta'];

		return $prodotto;
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
	 * @return ProdottoMySql 
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