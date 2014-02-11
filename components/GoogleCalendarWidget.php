<?php

    /**
     * Class File GoogleCalendarWidget
     * @author      Christopher Stebe <cstebe@iserv4u.com>
     * @date        2014-02-10
     * @link        https://github.com/Quexer69/yii-gcal-flow
     * @copyright   Copyright &copy; 2014 iServ4u GbR
     * @version     2.0.0
     * @package     quexer69/yii-gcal-flow
     * @description jQuery Google Calendar Widget for Yii-Framework
     */
    class GoogleCalendarWidget extends CWidget
    {
        // Google Calendar-ID
        public $calandarId;

        // Debug-Mode
        public $debug = false;
        public $maxitem = 6;
        public $mode = 'upcoming';
        public $no_items_html;
        public $link_item_title = true;
        public $link_item_description = false;
        public $auto_scroll = true;
        public $height = '500px';
        public $width = '100%';

        function init()
        {
            parent::init();
        }

        public function run()
        {
            // Register some JS Code for features used in the google calendar widget
            Yii::app()->clientScript->registerScript('gcf' . 'calendar' . 'js', "
                _gCalFlow_debug = " . $this->debug . ";
                var $ = jQuery;
                    $(function() {
                        $('#gcf-container').gCalFlow({
                            calid: '" . $this->calandarId . "',
                            maxitem: " . $this->maxitem . ",
                            mode: '" . $this->mode . "',
                            no_items_html: '" . $this->no_items_html . "',
                            link_item_title: " . $this->link_item_title . ",
                            link_item_description: " . $this->link_item_description . ",
                            auto_scroll: " . $this->auto_scroll . ",
                            date_formatter: function(d, allday_p) { return d.getDate() + '.' + (d.getMonth()+1) + '.' + d.getFullYear() }
                        });
                    });", CClientScript::POS_READY
            );
            // Register some css code
            Yii::app()->clientScript->registerCss('gcf' . 'calendar' . 'css', "
                #gcf-container {
                    height: " . $this->height . " !important;
                    width: " . $this->width . " !important;
                }"
            );
            // Render Markup
            echo '<div id="gcf-container">
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