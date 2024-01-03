<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface FidelityClienteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FidelityCliente 
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
 	 * @param fidelityCliente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCliente fidelityCliente
 	 */
	public function insert($fidelityCliente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCliente fidelityCliente
 	 */
	public function update($fidelityCliente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCard($value);

	public function queryByIdCliente($value);


	public function deleteByIdCard($value);

	public function deleteByIdCliente($value);


}
?>