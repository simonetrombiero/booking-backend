<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoCorpoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoCorpo 
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
 	 * @param anamnesticoCorpo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpo anamnesticoCorpo
 	 */
	public function insert($anamnesticoCorpo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpo anamnesticoCorpo
 	 */
	public function update($anamnesticoCorpo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAnamnestico($value);

	public function queryByLabel($value);

	public function queryByDescrizione($value);

	public function queryByOrdine($value);


	public function deleteByIdAnamnestico($value);

	public function deleteByLabel($value);

	public function deleteByDescrizione($value);

	public function deleteByOrdine($value);


}
?>