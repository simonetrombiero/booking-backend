<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnmnesticoRisposteHeadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnmnesticoRisposteHead 
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
 	 * @param anmnesticoRisposteHead primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnmnesticoRisposteHead anmnesticoRisposteHead
 	 */
	public function insert($anmnesticoRisposteHead);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnmnesticoRisposteHead anmnesticoRisposteHead
 	 */
	public function update($anmnesticoRisposteHead);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAnamnestico($value);

	public function queryByDataCompilazione($value);

	public function queryByPaziente($value);

	public function queryByNote($value);


	public function deleteByIdAnamnestico($value);

	public function deleteByDataCompilazione($value);

	public function deleteByPaziente($value);

	public function deleteByNote($value);


}
?>