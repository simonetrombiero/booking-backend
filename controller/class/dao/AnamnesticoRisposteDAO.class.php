<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoRisposteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoRisposte 
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
 	 * @param anamnesticoRisposte primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoRisposte anamnesticoRisposte
 	 */
	public function insert($anamnesticoRisposte);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoRisposte anamnesticoRisposte
 	 */
	public function update($anamnesticoRisposte);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdRisposta($value);

	public function queryByIdDomanda($value);

	public function queryByDomanda($value);

	public function queryByRisposta($value);


	public function deleteByIdRisposta($value);

	public function deleteByIdDomanda($value);

	public function deleteByDomanda($value);

	public function deleteByRisposta($value);


}
?>