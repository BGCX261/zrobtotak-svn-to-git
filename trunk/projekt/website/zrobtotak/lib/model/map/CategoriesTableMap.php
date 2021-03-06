<?php


/**
 * This class defines the structure of the 'categories' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 05/09/10 07:49:05
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CategoriesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CategoriesTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('categories');
		$this->setPhpName('Categories');
		$this->setClassname('Categories');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', true, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 255, null);
		$this->addForeignKey('CATEGORYUP_ID', 'CategoryupId', 'INTEGER', 'categories', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CategoriesRelatedByCategoryupId', 'Categories', RelationMap::MANY_TO_ONE, array('categoryup_id' => 'id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('CategoriesRelatedByCategoryupId', 'Categories', RelationMap::ONE_TO_MANY, array('id' => 'categoryup_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('AdviceRelatedByCategoryId', 'Advice', RelationMap::ONE_TO_MANY, array('id' => 'category_id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('AdviceRelatedByCategoryUpcategoryId', 'Advice', RelationMap::ONE_TO_MANY, array('categoryup_id' => 'category_upcategory_id', ), 'SET NULL', 'SET NULL');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // CategoriesTableMap
