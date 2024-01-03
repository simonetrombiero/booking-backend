<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ConsensoPrivacyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ConsensoPrivacy 
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
 	 * @param consensoPrivacy primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ConsensoPrivacy consensoPrivacy
 	 */
	public function insert($consensoPrivacy);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ConsensoPrivacy consensoPrivacy
 	 */
	public function update($consensoPrivacy);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByDataCompilazione($value);

	public function queryByTrattamento($value);

	public function queryByFirmaTrattamento($value);

	public function queryByComunicazione($value);

	public function queryByFirmaComunicazione($value);

	public function queryByFidelity($value);

	public function queryByFirmaFidelity($value);


	public function deleteByIdCliente($value);

	public function deleteByDataCompilazione($value);

	public function deleteByTrattamento($value);

	public function deleteByFirmaTrattamento($value);

	public function deleteByComunicazione($value);

	public function deleteByFirmaComunicazione($value);

	public function deleteByFidelity($value);

	public function deleteByFirmaFidelity($value);


}
?>