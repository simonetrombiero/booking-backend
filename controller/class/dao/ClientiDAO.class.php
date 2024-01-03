<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ClientiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Clienti 
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
 	 * @param clienti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Clienti clienti
 	 */
	public function insert($clienti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Clienti clienti
 	 */
	public function update($clienti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRagioneSociale($value);

	public function queryByCognome($value);

	public function queryByNome($value);

	public function queryBySesso($value);

	public function queryByIndirizzo($value);

	public function queryByCivico($value);

	public function queryByCap($value);

	public function queryByRegione($value);

	public function queryByProvincia($value);

	public function queryByCitta($value);

	public function queryByTelefono($value);

	public function queryByCellulare($value);

	public function queryByEmail($value);

	public function queryByDataNascita($value);

	public function queryByLuogo($value);

	public function queryByCFiscale($value);

	public function queryByPartitaIva($value);


	public function deleteByRagioneSociale($value);

	public function deleteByCognome($value);

	public function deleteByNome($value);

	public function deleteBySesso($value);

	public function deleteByIndirizzo($value);

	public function deleteByCivico($value);

	public function deleteByCap($value);

	public function deleteByRegione($value);

	public function deleteByProvincia($value);

	public function deleteByCitta($value);

	public function deleteByTelefono($value);

	public function deleteByCellulare($value);

	public function deleteByEmail($value);

	public function deleteByDataNascita($value);

	public function deleteByLuogo($value);

	public function deleteByCFiscale($value);

	public function deleteByPartitaIva($value);


}
?>