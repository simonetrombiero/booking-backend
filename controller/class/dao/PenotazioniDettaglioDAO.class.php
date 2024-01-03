<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2022-07-28 10:33
 */
interface PenotazioniDettaglioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PenotazioniDettaglio 
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
 	 * @param penotazioniDettaglio primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PenotazioniDettaglio penotazioniDettaglio
 	 */
	public function insert($penotazioniDettaglio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PenotazioniDettaglio penotazioniDettaglio
 	 */
	public function update($penotazioniDettaglio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTrattamento($value);

	public function queryByTrattamento($value);

	public function queryByNote($value);


	public function deleteByIdTrattamento($value);

	public function deleteByTrattamento($value);

	public function deleteByNote($value);


}
?>