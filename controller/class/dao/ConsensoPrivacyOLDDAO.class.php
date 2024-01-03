<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ConsensoPrivacyOLDDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ConsensoPrivacyOLD 
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
 	 * @param consensoPrivacyOLD primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoPrivacyOLD consensoPrivacyOLD
 	 */
	public function insert($consensoPrivacyOLD);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoPrivacyOLD consensoPrivacyOLD
 	 */
	public function update($consensoPrivacyOLD);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPaziente($value);

	public function queryByDataCompilazione($value);


	public function deleteByIdPaziente($value);

	public function deleteByDataCompilazione($value);


}
?>