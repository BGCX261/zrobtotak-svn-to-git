<?php

/**
 * advice actions.
 *
 * @package    zrobtotak.pl
 * @subpackage advice
 * @author     Marek Synoradzki
 */
class adviceActions extends sfActions
{

    /*
     * odpowiedzialny za stronnicowanie wynikow i wybieranie odpowiednich porad
     */
  public function executeIndex(sfWebRequest $request)
  {
      //tutaj na podstawienie przyjetych parametrow bede wyciagal z bazy odpowiednie
      //porady

    $crit = new Criteria();
    //$this->Advices = AdvicePeer::doSelect($crit);
    $this->pager = new sfPropelPager('Advice', 10);
    $this->pager->setCriteria($crit);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();



  }


  /**
   *Method responsible for showing only piece of advice. It transfers advice and author object
   * @param sfWebRequest $request 
   */
  public function executeShow(sfWebRequest $request)
  {
    $myadvice=$this->getRoute()->getObject();
    $this->thisauthor=sfGuardUserPeer::getUserBy($myadvice->getUserId());
    $this->advice=$myadvice;
    $this->forward404Unless($this->advice);


  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AdviceForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AdviceForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Advice = AdvicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Advice does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdviceForm($Advice);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Advice = AdvicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Advice does not exist (%s).', $request->getParameter('id')));
    $this->form = new AdviceForm($Advice);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Advice = AdvicePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Advice does not exist (%s).', $request->getParameter('id')));
    $Advice->delete();

    $this->redirect('advice/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Advice = $form->save();

      $this->redirect('advice/edit?id='.$Advice->getId());
    }
  }
}
