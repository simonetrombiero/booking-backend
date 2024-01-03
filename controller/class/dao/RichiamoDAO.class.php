<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-06-08 12:37
 */
interface RichiamoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Richiamo 
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
 	 * @param richiamo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Richiamo richiamo
 	 */
	public function insert($richiamo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Richiamo richiamo
 	 */
	public function update($richiamo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTitolo($value);

	public function queryByPaziente($value);

	public function queryByRichiestoDa($value);

	public function queryByMotivoRichiamo($value);

	public function queryByData($value);

	public function queryByDataPrevista($value);

	public function queryByNote($value);

	public function queryByStatus($value);

	public function queryByNoShow($value);


	public function deleteByTitolo($value);

	public function deleteByPaziente($value);

	public function deleteByRichiestoDa($value);

	public function deleteByMotivoRichiamo($value);

	public function deleteByData($value);

	public function deleteByDataPrevista($value);

	public function deleteByNote($value);

	public function deleteByStatus($value);

	public function deleteByNoShow($value);


}
?>