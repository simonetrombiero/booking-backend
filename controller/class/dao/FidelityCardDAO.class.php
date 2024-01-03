<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface FidelityCardDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FidelityCard 
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
 	 * @param fidelityCard primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FidelityCard fidelityCard
 	 */
	public function insert($fidelityCard);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FidelityCard fidelityCard
 	 */
	public function update($fidelityCard);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodiceInterno($value);

	public function queryByCodiceBarre($value);

	public function queryByDataEmissione($value);

	public function queryByDataScadenza($value);

	public function queryByDataSospensione($value);

	public function queryBySaldoPunti($value);

	public function queryByNote($value);

	public function queryByUltimaModifica($value);

	public function queryByIsSospesa($value);


	public function deleteByCodiceInterno($value);

	public function deleteByCodiceBarre($value);

	public function deleteByDataEmissione($value);

	public function deleteByDataScadenza($value);

	public function deleteByDataSospensione($value);

	public function deleteBySaldoPunti($value);

	public function deleteByNote($value);

	public function deleteByUltimaModifica($value);

	public function deleteByIsSospesa($value);


}
?>