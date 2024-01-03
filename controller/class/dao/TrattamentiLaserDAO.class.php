<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface TrattamentiLaserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TrattamentiLaser 
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
 	 * @param trattamentiLaser primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TrattamentiLaser trattamentiLaser
 	 */
	public function insert($trattamentiLaser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TrattamentiLaser trattamentiLaser
 	 */
	public function update($trattamentiLaser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByData($value);

	public function queryByZonaTrattata($value);

	public function queryByDurata($value);

	public function queryByFototipo($value);

	public function queryByPotenza($value);

	public function queryByImpulso($value);

	public function queryByFrequenza($value);

	public function queryByNote($value);


	public function deleteByIdCliente($value);

	public function deleteByData($value);

	public function deleteByZonaTrattata($value);

	public function deleteByDurata($value);

	public function deleteByFototipo($value);

	public function deleteByPotenza($value);

	public function deleteByImpulso($value);

	public function deleteByFrequenza($value);

	public function deleteByNote($value);


}
?>