<?php
    /**
     * View File _calendar_List
     * @author      Christopher Stebe <cstebe@iserv4u.com>
     * @date        2014-02-10
     * @link        https://github.com/Quexer69/yii-gcal-flow
     * @copyright   Copyright &copy; 2014 iServ4u GbR
     * @version     1.0.0
     * @package     quexer69/yii-gcal-flow
     * @description jQuery Google Calendar Widget for Yii-Framework
     */
?>
<div id="gcf-container">
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
    <div class="gcf-last-update-block">
        <?php echo Yii::t('app', 'Last update'); ?>&nbsp;<span class="gcf-last-update"></span>
    </div>
</div>
<div class="clearfix"></div>