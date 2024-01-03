<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Anamnestico 
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
 	 * @param anamnestico primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Anamnestico anamnestico
 	 */
	public function insert($anamnestico);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Anamnestico anamnestico
 	 */
	public function update($anamnestico);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByData($value);

	public function queryByIsScaduto($value);


	public function deleteByDescrizione($value);

	public function deleteByData($value);

	public function deleteByIsScaduto($value);


}
?>