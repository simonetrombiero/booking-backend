<?php
/**
 * Class that operate on table 'documento_sas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 11:41
 */
class DocumentoSasMySqlDAO implements DocumentoSasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DocumentoSasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM documento_sas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM documento_sas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM documento_sas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param documentoSa primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM documento_sas WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentoSasMySql documentoSa
 	 */
	public function insert($documentoSa){
		$sql = 'INSERT INTO documento_sas (idIndiceDocumento, idTipoDocumento, idClienteDoc, idFornitoreDoc, idDestinazioneDoc, idPagamentoDoc, progressivo, anno, data, totaleIva, imponibile, totaleDocumento, totaleDaSaldare, totaleSaldato, abbuono, eccedenza, causale, aspetto, dataConsegna, oraConsegna, porto, colli, pesoNetto, pesoLordo, note, isDefinitivo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentoSa->idIndiceDocumento);
		$sqlQuery->setNumber($documentoSa->idTipoDocumento);
		$sqlQuery->setNumber($documentoSa->idClienteDoc);
		$sqlQuery->setNumber($documentoSa->idFornitoreDoc);
		$sqlQuery->setNumber($documentoSa->idDestinazioneDoc);
		$sqlQuery->setNumber($documentoSa->idPagamentoDoc);
		$sqlQuery->setNumber($documentoSa->progressivo);
		$sqlQuery->setNumber($documentoSa->anno);
		$sqlQuery->set($documentoSa->data);
		$sqlQuery->set($documentoSa->totaleIva);
		$sqlQuery->set($documentoSa->imponibile);
		$sqlQuery->set($documentoSa->totaleDocumento);
		$sqlQuery->set($documentoSa->totaleDaSaldare);
		$sqlQuery->set($documentoSa->totaleSaldato);
		$sqlQuery->set($documentoSa->abbuono);
		$sqlQuery->set($documentoSa->eccedenza);
		$sqlQuery->set($documentoSa->causale);
		$sqlQuery->set($documentoSa->aspetto);
		$sqlQuery->set($documentoSa->dataConsegna);
		$sqlQuery->set($documentoSa->oraConsegna);
		$sqlQuery->set($documentoSa->porto);
		$sqlQuery->setNumber($documentoSa->colli);
		$sqlQuery->set($documentoSa->pesoNetto);
		$sqlQuery->set($documentoSa->pesoLordo);
		$sqlQuery->set($documentoSa->note);
		$sqlQuery->setNumber($documentoSa->isDefinitivo);

		$id = $this->executeInsert($sqlQuery);	
		$documentoSa->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentoSasMySql documentoSa
 	 */
	public function update($documentoSa){
		$sql = 'UPDATE documento_sas SET idIndiceDocumento = ?, idTipoDocumento = ?, idClienteDoc = ?, idFornitoreDoc = ?, idDestinazioneDoc = ?, idPagamentoDoc = ?, progressivo = ?, anno = ?, data = ?, totaleIva = ?, imponibile = ?, totaleDocumento = ?, totaleDaSaldare = ?, totaleSaldato = ?, abbuono = ?, eccedenza = ?, causale = ?, aspetto = ?, dataConsegna = ?, oraConsegna = ?, porto = ?, colli = ?, pesoNetto = ?, pesoLordo = ?, note = ?, isDefinitivo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($documentoSa->idIndiceDocumento);
		$sqlQuery->setNumber($documentoSa->idTipoDocumento);
		$sqlQuery->setNumber($documentoSa->idClienteDoc);
		$sqlQuery->setNumber($documentoSa->idFornitoreDoc);
		$sqlQuery->setNumber($documentoSa->idDestinazioneDoc);
		$sqlQuery->setNumber($documentoSa->idPagamentoDoc);
		$sqlQuery->setNumber($documentoSa->progressivo);
		$sqlQuery->setNumber($documentoSa->anno);
		$sqlQuery->set($documentoSa->data);
		$sqlQuery->set($documentoSa->totaleIva);
		$sqlQuery->set($documentoSa->imponibile);
		$sqlQuery->set($documentoSa->totaleDocumento);
		$sqlQuery->set($documentoSa->totaleDaSaldare);
		$sqlQuery->set($documentoSa->totaleSaldato);
		$sqlQuery->set($documentoSa->abbuono);
		$sqlQuery->set($documentoSa->eccedenza);
		$sqlQuery->set($documentoSa->causale);
		$sqlQuery->set($documentoSa->aspetto);
		$sqlQuery->set($documentoSa->dataConsegna);
		$sqlQuery->set($documentoSa->oraConsegna);
		$sqlQuery->set($documentoSa->porto);
		$sqlQuery->setNumber($documentoSa->colli);
		$sqlQuery->set($documentoSa->pesoNetto);
		$sqlQuery->set($documentoSa->pesoLordo);
		$sqlQuery->set($documentoSa->note);
		$sqlQuery->setNumber($documentoSa->isDefinitivo);

		$sqlQuery->setNumber($documentoSa->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM documento_sas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdIndiceDocumento($value){
		$sql = 'SELECT * FROM documento_sas WHERE idIndiceDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdTipoDocumento($value){
		$sql = 'SELECT * FROM documento_sas WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdClienteDoc($value){
		$sql = 'SELECT * FROM documento_sas WHERE idClienteDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdFornitoreDoc($value){
		$sql = 'SELECT * FROM documento_sas WHERE idFornitoreDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdDestinazioneDoc($value){
		$sql = 'SELECT * FROM documento_sas WHERE idDestinazioneDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIdPagamentoDoc($value){
		$sql = 'SELECT * FROM documento_sas WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProgressivo($value){
		$sql = 'SELECT * FROM documento_sas WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnno($value){
		$sql = 'SELECT * FROM documento_sas WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM documento_sas WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleIva($value){
		$sql = 'SELECT * FROM documento_sas WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImponibile($value){
		$sql = 'SELECT * FROM documento_sas WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDocumento($value){
		$sql = 'SELECT * FROM documento_sas WHERE totaleDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleDaSaldare($value){
		$sql = 'SELECT * FROM documento_sas WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTotaleSaldato($value){
		$sql = 'SELECT * FROM documento_sas WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAbbuono($value){
		$sql = 'SELECT * FROM documento_sas WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEccedenza($value){
		$sql = 'SELECT * FROM documento_sas WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCausale($value){
		$sql = 'SELECT * FROM documento_sas WHERE causale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAspetto($value){
		$sql = 'SELECT * FROM documento_sas WHERE aspetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataConsegna($value){
		$sql = 'SELECT * FROM documento_sas WHERE dataConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOraConsegna($value){
		$sql = 'SELECT * FROM documento_sas WHERE oraConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPorto($value){
		$sql = 'SELECT * FROM documento_sas WHERE porto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByColli($value){
		$sql = 'SELECT * FROM documento_sas WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesoNetto($value){
		$sql = 'SELECT * FROM documento_sas WHERE pesoNetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPesoLordo($value){
		$sql = 'SELECT * FROM documento_sas WHERE pesoLordo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNote($value){
		$sql = 'SELECT * FROM documento_sas WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIsDefinitivo($value){
		$sql = 'SELECT * FROM documento_sas WHERE isDefinitivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdIndiceDocumento($value){
		$sql = 'DELETE FROM documento_sas WHERE idIndiceDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTipoDocumento($value){
		$sql = 'DELETE FROM documento_sas WHERE idTipoDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdClienteDoc($value){
		$sql = 'DELETE FROM documento_sas WHERE idClienteDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFornitoreDoc($value){
		$sql = 'DELETE FROM documento_sas WHERE idFornitoreDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdDestinazioneDoc($value){
		$sql = 'DELETE FROM documento_sas WHERE idDestinazioneDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdPagamentoDoc($value){
		$sql = 'DELETE FROM documento_sas WHERE idPagamentoDoc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProgressivo($value){
		$sql = 'DELETE FROM documento_sas WHERE progressivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnno($value){
		$sql = 'DELETE FROM documento_sas WHERE anno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM documento_sas WHERE data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleIva($value){
		$sql = 'DELETE FROM documento_sas WHERE totaleIva = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImponibile($value){
		$sql = 'DELETE FROM documento_sas WHERE imponibile = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDocumento($value){
		$sql = 'DELETE FROM documento_sas WHERE totaleDocumento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleDaSaldare($value){
		$sql = 'DELETE FROM documento_sas WHERE totaleDaSaldare = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTotaleSaldato($value){
		$sql = 'DELETE FROM documento_sas WHERE totaleSaldato = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAbbuono($value){
		$sql = 'DELETE FROM documento_sas WHERE abbuono = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEccedenza($value){
		$sql = 'DELETE FROM documento_sas WHERE eccedenza = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCausale($value){
		$sql = 'DELETE FROM documento_sas WHERE causale = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAspetto($value){
		$sql = 'DELETE FROM documento_sas WHERE aspetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataConsegna($value){
		$sql = 'DELETE FROM documento_sas WHERE dataConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOraConsegna($value){
		$sql = 'DELETE FROM documento_sas WHERE oraConsegna = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPorto($value){
		$sql = 'DELETE FROM documento_sas WHERE porto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByColli($value){
		$sql = 'DELETE FROM documento_sas WHERE colli = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesoNetto($value){
		$sql = 'DELETE FROM documento_sas WHERE pesoNetto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPesoLordo($value){
		$sql = 'DELETE FROM documento_sas WHERE pesoLordo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNote($value){
		$sql = 'DELETE FROM documento_sas WHERE note = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsDefinitivo($value){
		$sql = 'DELETE FROM documento_sas WHERE isDefinitivo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DocumentoSasMySql 
	 */
	protected function readRow($row){
		$documentoSa = new DocumentoSa();
		
		$documentoSa->id = $row['id'];
		$documentoSa->idIndiceDocumento = $row['idIndiceDocumento'];
		$documentoSa->idTipoDocumento = $row['idTipoDocumento'];
		$documentoSa->idClienteDoc = $row['idClienteDoc'];
		$documentoSa->idFornitoreDoc = $row['idFornitoreDoc'];
		$documentoSa->idDestinazioneDoc = $row['idDestinazioneDoc'];
		$documentoSa->idPagamentoDoc = $row['idPagamentoDoc'];
		$documentoSa->progressivo = $row['progressivo'];
		$documentoSa->anno = $row['anno'];
		$documentoSa->data = $row['data'];
		$documentoSa->totaleIva = $row['totaleIva'];
		$documentoSa->imponibile = $row['imponibile'];
		$documentoSa->totaleDocumento = $row['totaleDocumento'];
		$documentoSa->totaleDaSaldare = $row['totaleDaSaldare'];
		$documentoSa->totaleSaldato = $row['totaleSaldato'];
		$documentoSa->abbuono = $row['abbuono'];
		$documentoSa->eccedenza = $row['eccedenza'];
		$documentoSa->causale = $row['causale'];
		$documentoSa->aspetto = $row['aspetto'];
		$documentoSa->dataConsegna = $row['dataConsegna'];
		$documentoSa->oraConsegna = $row['oraConsegna'];
		$documentoSa->porto = $row['porto'];
		$documentoSa->colli = $row['colli'];
		$documentoSa->pesoNetto = $row['pesoNetto'];
		$documentoSa->pesoLordo = $row['pesoLordo'];
		$documentoSa->note = $row['note'];
		$documentoSa->isDefinitivo = $row['isDefinitivo'];

		return $documentoSa;
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
	 * @return DocumentoSasMySql 
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