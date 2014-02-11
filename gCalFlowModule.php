<?php
/**
 * Class File
 * @author      Christopher Stebe <cstebe@iserv4u.com>
 * @date        2014-02-10
 * @link        https://github.com/Quexer69/yii-gcal-flow
 * @copyright   Copyright &copy; 2014 iServ4u GbR
 * @version     1.0.0
 * @package     quexer69/yii-gcal-flow
 * @description jQuery Google Calendar Widget for Yii-Framework
 */
// Set alias for gCal Flow assets
Yii::setPathOfAlias('gCalAssets', realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR));

class GCalFlowModule extends CWebModule
{
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'gCalFlow.components.*',
        ));

        $cs = Yii::app()->getClientScript();
        // JS files
        $cs->registerScriptFile('//www.google.com/jsapi', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::getPathOfAlias('gCalAssets') . '/js/jquery.gcal_flow.min.js', CClientScript::POS_BEGIN);
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        }
        else
            return false;
    }

}
