<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ProvinceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Province 
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
 	 * @param province primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Province province
 	 */
	public function insert($province);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Province province
 	 */
	public function update($province);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdRegione($value);

	public function queryByProvincia($value);

	public function queryBySigla($value);


	public function deleteByIdRegione($value);

	public function deleteByProvincia($value);

	public function deleteBySigla($value);


}
?>