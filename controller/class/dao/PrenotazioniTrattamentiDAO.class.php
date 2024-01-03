<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PrenotazioniTrattamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrenotazioniTrattamenti 
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
 	 * @param prenotazioniTrattamenti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioniTrattamenti prenotazioniTrattamenti
 	 */
	public function insert($prenotazioniTrattamenti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioniTrattamenti prenotazioniTrattamenti
 	 */
	public function update($prenotazioniTrattamenti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPrenotazione($value);

	public function queryByIdTrattamento($value);


	public function deleteByIdPrenotazione($value);

	public function deleteByIdTrattamento($value);


}
?>