<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface DocumentazionePianoTrattamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DocumentazionePianoTrattamento 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param documentazionePianoTrattamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DocumentazionePianoTrattamento documentazionePianoTrattamento
 	 */
	public function insert($documentazionePianoTrattamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DocumentazionePianoTrattamento documentazionePianoTrattamento
 	 */
	public function update($documentazionePianoTrattamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdDocumentazione($value);

	public function queryByIdPianoTrattamento($value);


	public function deleteByIdDocumentazione($value);

	public function deleteByIdPianoTrattamento($value);


}
?>