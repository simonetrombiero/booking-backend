<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface SedeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Sede 
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
 	 * @param sede primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Sede sede
 	 */
	public function insert($sede);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Sede sede
 	 */
	public function update($sede);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByIndirizzo($value);

	public function queryByIdCitta($value);

	public function queryByCap($value);

	public function queryByTelefono($value);

	public function queryByTelefono2($value);

	public function queryByFax($value);

	public function queryByCellulare($value);

	public function queryByEmail($value);

	public function queryByIsPrincipale($value);


	public function deleteByNome($value);

	public function deleteByIndirizzo($value);

	public function deleteByIdCitta($value);

	public function deleteByCap($value);

	public function deleteByTelefono($value);

	public function deleteByTelefono2($value);

	public function deleteByFax($value);

	public function deleteByCellulare($value);

	public function deleteByEmail($value);

	public function deleteByIsPrincipale($value);


}
?>