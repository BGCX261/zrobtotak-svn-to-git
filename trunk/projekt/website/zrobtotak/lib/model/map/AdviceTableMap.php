<?php


/**
 * This class defines the structure of the 'advice' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 05/09/10 07:49:06
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AdviceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AdviceTableMap';

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
		$this->setName('advice');
		$this->setPhpName('Advice');
		$this->setClassname('Advice');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', true, 400, null);
		$this->addColumn('RATING', 'Rating', 'SMALLINT', false, null, 0);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('INSTRUCTION', 'Instruction', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', false, null, false);
		$this->addColumn('MOVIE', 'Movie', 'VARCHAR', false, 400, null);
		$this->addColumn('LEVEL', 'Level', 'SMALLINT', false, null, null);
		$this->addColumn('VISITED', 'Visited', 'INTEGER', false, null, 1);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 400, null);
		$this->addForeignKey('CATEGORY_ID', 'CategoryId', 'INTEGER', 'categories', 'ID', false, null, null);
		$this->addForeignKey('CATEGORY_UPCATEGORY_ID', 'CategoryUpcategoryId', 'INTEGER', 'categories', 'CATEGORYUP_ID', false, null, null);
		$this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CategoriesRelatedByCategoryId', 'Categories', RelationMap::MANY_TO_ONE, array('category_id' => 'id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('CategoriesRelatedByCategoryUpcategoryId', 'Categories', RelationMap::MANY_TO_ONE, array('category_upcategory_id' => 'categoryup_id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Tags', 'Tags', RelationMap::ONE_TO_MANY, array('id' => 'advice_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Images', 'Images', RelationMap::ONE_TO_MANY, array('id' => 'advice_id', ), 'CASCADE', 'CASCADE');
    $this->addRelation('Comments', 'Comments', RelationMap::ONE_TO_MANY, array('id' => 'advice_id', ), 'CASCADE', 'CASCADE');
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // AdviceTableMap
