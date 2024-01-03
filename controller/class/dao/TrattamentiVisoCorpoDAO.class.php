<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface TrattamentiVisoCorpoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TrattamentiVisoCorpo 
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
 	 * @param trattamentiVisoCorpo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TrattamentiVisoCorpo trattamentiVisoCorpo
 	 */
	public function insert($trattamentiVisoCorpo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TrattamentiVisoCorpo trattamentiVisoCorpo
 	 */
	public function update($trattamentiVisoCorpo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByData($value);

	public function queryByZonaTrattata($value);

	public function queryByDurata($value);

	public function queryByMisurazioni($value);

	public function queryByPesoCorporeo($value);

	public function queryByAnnotazioni($value);

	public function queryByFoto1($value);

	public function queryByFoto2($value);

	public function queryByFoto3($value);

	public function queryByFoto4($value);


	public function deleteByIdCliente($value);

	public function deleteByData($value);

	public function deleteByZonaTrattata($value);

	public function deleteByDurata($value);

	public function deleteByMisurazioni($value);

	public function deleteByPesoCorporeo($value);

	public function deleteByAnnotazioni($value);

	public function deleteByFoto1($value);

	public function deleteByFoto2($value);

	public function deleteByFoto3($value);

	public function deleteByFoto4($value);


}
?>