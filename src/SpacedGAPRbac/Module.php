<?php
namespace SpacedGAPRbac;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use SpacedGAP\AbstractZf2Module;
use Zend\Navigation\Page\Mvc;

class Module 
    extends AbstractZf2Module
{

    public function onBootstrap(MvcEvent $e)
    {
        parent::onBootstrap($e);

        $eventManager        = $e->getApplication()->getEventManager();
        $eventSharedManager  = $eventManager->getSharedManager();

        $eventSharedManager->attach('ZfcUser\Form\Login', 'init', [$this, 'updateZfcUserFormLogin']);
    }

    public function updateZfcUserFormLogin (\Zend\EventManager\Event $e)
    {
        $form = $e->getTarget();

        $identity         = $form->get('identity');
        $identity_options = $identity->getOptions();

        $identity_options['twb-layout']       = \TwbBundle\Form\View\Helper\TwbBundleForm::LAYOUT_HORIZONTAL;
        $identity_options['column-size']      = 'md-10';
        $identity_options['label']            = $identity->getLabel();
        $identity_options['label_attributes'] = array('class' => 'col-md-2');
        $identity->setOptions($identity_options);

        $credential         = $form->get('credential');
        $credential_options = $credential->getOptions();

        $credential_options['twb-layout']       = \TwbBundle\Form\View\Helper\TwbBundleForm::LAYOUT_HORIZONTAL;
        $credential_options['column-size']      = 'md-10';
        $credential_options['label']            = $credential->getLabel();
        $credential_options['label_attributes'] = array('class' => 'col-md-2');
        $credential->setOptions($credential_options);
    }
/*
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
*/    
}
