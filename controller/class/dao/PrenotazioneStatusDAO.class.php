<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PrenotazioneStatusDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrenotazioneStatus 
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
 	 * @param prenotazioneStatu primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrenotazioneStatus prenotazioneStatu
 	 */
	public function insert($prenotazioneStatu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrenotazioneStatus prenotazioneStatu
 	 */
	public function update($prenotazioneStatu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStatus($value);


	public function deleteByStatus($value);


}
?>