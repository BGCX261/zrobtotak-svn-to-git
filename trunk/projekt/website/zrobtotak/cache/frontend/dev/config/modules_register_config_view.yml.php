<?php
// auto-generated by sfViewConfigHandler
// date: 2010/05/09 12:40:51
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('layout_style.css', '', array ());
  $response->addStylesheet('last_added.css', '', array ());
  $response->addStylesheet('main_menu.css', '', array ());
  $response->addStylesheet('green_menu.css', '', array ());
  $response->addStylesheet('news.css', '', array ());
  $response->addStylesheet('main_page.css', '', array ());
  $response->addStylesheet('advice_lists.css', '', array ());
  $response->addStylesheet('advice.css', '', array ());


