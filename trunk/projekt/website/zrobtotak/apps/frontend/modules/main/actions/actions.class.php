<?php

/**
 * main actions.
 *
 * @package    zrobtotak.pl
 * @subpackage main
 * @author     Marek Synoradzki
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->news = BaseNewsPeer::doSelect(new Criteria());
  }
}
