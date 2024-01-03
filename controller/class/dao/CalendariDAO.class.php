<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface CalendariDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Calendari 
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
 	 * @param calendari primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Calendari calendari
 	 */
	public function insert($calendari);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Calendari calendari
 	 */
	public function update($calendari);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCalendario($value);

	public function queryByIdPostazione($value);

	public function queryByAttivo($value);

	public function queryByBackgroundColor($value);


	public function deleteByCalendario($value);

	public function deleteByIdPostazione($value);

	public function deleteByAttivo($value);

	public function deleteByBackgroundColor($value);


}
?>