<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PostazioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Postazioni 
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
 	 * @param postazioni primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Postazioni postazioni
 	 */
	public function insert($postazioni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Postazioni postazioni
 	 */
	public function update($postazioni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPostazione($value);

	public function queryByIsSospeso($value);


	public function deleteByPostazione($value);

	public function deleteByIsSospeso($value);


}
?>