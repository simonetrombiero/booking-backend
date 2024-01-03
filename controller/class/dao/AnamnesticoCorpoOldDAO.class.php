<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoCorpoOldDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoCorpoOld 
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
 	 * @param anamnesticoCorpoOld primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpoOld anamnesticoCorpoOld
 	 */
	public function insert($anamnesticoCorpoOld);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpoOld anamnesticoCorpoOld
 	 */
	public function update($anamnesticoCorpoOld);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAnamnestico($value);

	public function queryByRiga($value);

	public function queryByDescrizione($value);


	public function deleteByIdAnamnestico($value);

	public function deleteByRiga($value);

	public function deleteByDescrizione($value);


}
?>