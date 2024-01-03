<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PrenotazioniDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrenotazioniDettaglio 
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
 	 * @param prenotazioniDettaglio primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioniDettaglio prenotazioniDettaglio
 	 */
	public function insert($prenotazioniDettaglio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioniDettaglio prenotazioniDettaglio
 	 */
	public function update($prenotazioniDettaglio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPrenotazione($value);

	public function queryByIdTrattamento($value);

	public function queryByTrattamento($value);

	public function queryByIdOperatore($value);

	public function queryByIdPostazione($value);

	public function queryByNote($value);


	public function deleteByPrenotazione($value);

	public function deleteByIdTrattamento($value);

	public function deleteByTrattamento($value);

	public function deleteByIdOperatore($value);

	public function deleteByIdPostazione($value);

	public function deleteByNote($value);


}
?>