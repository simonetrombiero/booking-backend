<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface FidelityCardCatalogoPremiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FidelityCardCatalogoPremi 
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
 	 * @param fidelityCardCatalogoPremi primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCardCatalogoPremi fidelityCardCatalogoPremi
 	 */
	public function insert($fidelityCardCatalogoPremi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCardCatalogoPremi fidelityCardCatalogoPremi
 	 */
	public function update($fidelityCardCatalogoPremi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodice($value);

	public function queryByTitolo($value);

	public function queryByDescrizione($value);

	public function queryByPuntiRichiesti($value);

	public function queryByValidoDa($value);

	public function queryByValidoA($value);

	public function queryByContributoEconomico($value);


	public function deleteByCodice($value);

	public function deleteByTitolo($value);

	public function deleteByDescrizione($value);

	public function deleteByPuntiRichiesti($value);

	public function deleteByValidoDa($value);

	public function deleteByValidoA($value);

	public function deleteByContributoEconomico($value);


}
?>