<?php

/**
 * register actions.
 *
 * @package    zrobtotak.pl
 * @subpackage register
 * @author     Marek Synoradzki
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new RegisterForm();
      if ($request->isMethod('post'))
       {
        $this->form->bind($request->getParameter('sf_guard_user'));
        if ($this->form->isValid())
        {
         $this->form->save();
        $this->getUser()->signIn($this->form->getObject());
        $this->redirect('@homepage');
        }
}

    //$this->forward('default', 'module');
  }
}
