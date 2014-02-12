<?php

    /**
     * Class File GoogleCalendarWidget
     *
     * @author      Christopher Stebe <cstebe@iserv4u.com>
     * @date        2014-02-10
     * @link        https://github.com/Quexer69/yii-gcal-flow
     * @copyright   Copyright &copy; 2014 iServ4u GbR
     * @version     3.0.0
     * @package     quexer69/yii-gcal-flow
     * @description jQuery Google Calendar Widget for Yii-Framework
     */
    class GoogleCalendarWidget extends CWidget
    {
        // randomly set widget id if more than one calendar on a page
        public $calandarId;

        // Google Calendar-ID
        public $debug = false;

        // Debug-Mode
        public $maxitem = 6;
        public $mode = 'upcoming';
        public $no_items_html;
        public $link_item_title = true;
        public $link_item_description = false;
        public $auto_scroll = true;
        public $height = '500px';
        public $width = '100%';
        private $widgetId;

        function init()
        {
            parent::init();
            // Register
            $cs = Yii::app()->getClientScript();
            // Register Google JSAPI
            $cs->registerScriptFile('//www.google.com/jsapi', CClientScript::POS_HEAD);
            // gCal_flow.min.js
            $js = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets/js');
            $cs->registerScriptFile($js . "/jquery.gcal_flow.min.js", CClientScript::POS_BEGIN);
            $css = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets/css');
            $cs->registerCssFile($css . "/googleCalendar.css");
        }

        public function run()
        {
            // Generate widget id
            $this->widgetId = rand(0, 100);
            // remove spaces from calendarID
            $this->calandarId = trim($this->calandarId, " ");
            // Register some JS Code for features used in the google calendar widget
            Yii::app()->clientScript->registerScript('gcf' . 'calendar' . 'js' . $this->widgetId, "
                _gCalFlow_debug = " . $this->debug . ";
                var $ = jQuery;
                    $(function() {
                        $('#gcf-container-" . $this->widgetId . "').gCalFlow({
                            calid: '" . $this->calandarId . "',
                            maxitem: " . $this->maxitem . ",
                            mode: '" . $this->mode . "',
                            no_items_html: '" . $this->no_items_html . "',
                            link_item_title: " . $this->link_item_title . ",
                            link_item_description: " . $this->link_item_description . ",
                            auto_scroll: " . $this->auto_scroll . ",
                            daterange_formatter: function(sd, ed, allday_p) {
                                if (sd.getDate() !== (ed.getDate()-1) || (sd.getMonth()+1) !== (ed.getMonth()+1))
                                {
                                    return sd.getDate() + '.' + (sd.getMonth()+1) + '. - ' + (ed.getDate()-1) + '.' + (ed.getMonth()+1) + '.' + ed.getFullYear();
                                } else {
                                    return sd.getDate() + '.' + (sd.getMonth()+1) + '.' + sd.getFullYear();
                                }
                            }
                        });
                    });", CClientScript::POS_READY
            );
            // Register some css code
            Yii::app()->clientScript->registerCss('gcf' . 'calendar' . 'css' . $this->widgetId, "
                #gcf-container-" . $this->widgetId . " {
                    height: " . $this->height . ";
                    width: " . $this->width . ";
                }"
            );
            // Render Markup
            echo '<div id="gcf-container-' . $this->widgetId . '">
                    <div class="gcf-header-block">
                        <div class="gcf-title-block">
                            <span class="gcf-title"></span>
                        </div>
                    </div>
                    <div class="gcf-item-container-block">
                        <div class="gcf-item-block">
                            <div class="gcf-item-header-block">
                                <div class="gcf-item-date-block">
                                    <span class="gcf-item-daterange"></span>
                                </div>
                                <div class="gcf-item-title-block">
                                    <strong class="gcf-item-title"></strong>
                                </div>
                            </div>
                            <div class="gcf-item-body-block">
                                <div class="gcf-item-description">
                                </div>
                                <div class="gcf-item-location">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gcf-last-update-block">' . Yii::t('app', 'Last update') . '&nbsp;<span class="gcf-last-update"></span></div>
                </div>
                <div class="clearfix"></div>';
        }
    }