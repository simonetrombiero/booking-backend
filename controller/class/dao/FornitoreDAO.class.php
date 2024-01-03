<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface FornitoreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Fornitore 
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
 	 * @param fornitore primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Fornitore fornitore
 	 */
	public function insert($fornitore);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Fornitore fornitore
 	 */
	public function update($fornitore);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodice($value);

	public function queryByRagioneSociale($value);

	public function queryByPiva($value);

	public function queryByFiscale($value);

	public function queryByIndirizzo($value);

	public function queryByCap($value);

	public function queryByIdCitta($value);

	public function queryByTelefono($value);

	public function queryByFax($value);

	public function queryByCellulare($value);

	public function queryByEmail($value);

	public function queryBySitoweb($value);


	public function deleteByCodice($value);

	public function deleteByRagioneSociale($value);

	public function deleteByPiva($value);

	public function deleteByFiscale($value);

	public function deleteByIndirizzo($value);

	public function deleteByCap($value);

	public function deleteByIdCitta($value);

	public function deleteByTelefono($value);

	public function deleteByFax($value);

	public function deleteByCellulare($value);

	public function deleteByEmail($value);

	public function deleteBySitoweb($value);


}
?>