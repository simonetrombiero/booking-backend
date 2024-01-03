<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface RichiamoStatoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RichiamoStato 
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
 	 * @param richiamoStato primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RichiamoStato richiamoStato
 	 */
	public function insert($richiamoStato);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RichiamoStato richiamoStato
 	 */
	public function update($richiamoStato);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByStato($value);

	public function queryByOrdine($value);

	public function queryByIsVisibile($value);


	public function deleteByStato($value);

	public function deleteByOrdine($value);

	public function deleteByIsVisibile($value);


}
?>