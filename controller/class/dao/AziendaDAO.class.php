<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AziendaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Azienda 
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
 	 * @param azienda primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Azienda azienda
 	 */
	public function insert($azienda);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Azienda azienda
 	 */
	public function update($azienda);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCitta($value);

	public function queryByCap($value);

	public function queryByRagioneSociale($value);

	public function queryByDenominazione($value);

	public function queryByIndirizzo($value);

	public function queryByPiva($value);

	public function queryByCodFisc($value);

	public function queryByCodiceUnivoco($value);

	public function queryByTelefono($value);

	public function queryByTelefono2($value);

	public function queryByFax($value);

	public function queryByCellulare($value);

	public function queryByEmail($value);

	public function queryByPec($value);

	public function queryBySitoWeb($value);

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByHost($value);

	public function queryByPorta($value);

	public function queryByDbname($value);

	public function queryByLastaccess($value);

	public function queryByTipoImmagine($value);

	public function queryByLogo($value);


	public function deleteByIdCitta($value);

	public function deleteByCap($value);

	public function deleteByRagioneSociale($value);

	public function deleteByDenominazione($value);

	public function deleteByIndirizzo($value);

	public function deleteByPiva($value);

	public function deleteByCodFisc($value);

	public function deleteByCodiceUnivoco($value);

	public function deleteByTelefono($value);

	public function deleteByTelefono2($value);

	public function deleteByFax($value);

	public function deleteByCellulare($value);

	public function deleteByEmail($value);

	public function deleteByPec($value);

	public function deleteBySitoWeb($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByHost($value);

	public function deleteByPorta($value);

	public function deleteByDbname($value);

	public function deleteByLastaccess($value);

	public function deleteByTipoImmagine($value);

	public function deleteByLogo($value);


}
?>