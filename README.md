yii-gcal-flow
=============

Version 3.1.0

This jQuery plug-in for yii-framework provides a widget to show event list of your google calendar
with configurable options and fully customizable HTML design template. With composer support.


Quick-Start
=============

### Composer
If you have [composer already installed](http://getcomposer.org/doc/00-intro.md#installation-nix)

`composer.phar require quexer69/yii-gcal-flow 3.*`

**or**

add the package `quexer69/yii-gcal-flow` to your composer.json

Setup
=============
[SETUP] edit in app/config/main.php

**REQUIRED**
```php
'modules' => array(
        'gCalFlow' => array(
            'class' = 'vendor.quexer69.yii-gcal-flow.GoogleCalendarWidget',
        ),
```

Notice:
If you define an alias for 'vendor.quexer69.yii-gcal-flow.GoogleCalendarWidget'
would be more comfortable to call the widget.

i.e. `'aliases' => array(
        ...
        'GCalFlow' => 'vendor.quexer69.yii-gcal-flow.GoogleCalendarWidget',
        ...
       ),`

Run widget
=============

**Default Call of the slitSlider Widget**
```php

    $this->widget('vendor.quexer69.yii-gcal-flow.GoogleCalendarWidget');

```

**Params Call of the GoogleCalendarWidget Widget**
```php

    $this->widget('GCalFlow',
           array(
               'calandarId'             => 'YOUR_GOOGLE_CALENDAR_ID',
               'maxitem'                => 6,
               'mode'                   => 'upstream',                          // [upcoming | updates]
               'no_items_html'          => '<span>No Events availible!</span>', // HTML for empty calendar
               'link_item_title'        => true,
               'link_item_description'  => false,
               'auto_scroll'            => true,
               'height'                 => '300px',                             // css height of the #gcf-container
               'width'                  => '100%',                              // css width of the #gcf-container
               'debug'                  => false,                               // turn on debug console
           )
    );

```

**Or easily add through P3WidgetContainer (if 'phundament/p3widgets' installed)**

*(you need to add GoogleCalendarWidget to the P3Widgets)*
```php
'p3widgets' => array(
        'params' => array(
            'widgets' => array(
                ...
                'GCalFlow.components.GoogleCalendarWidget' => 'Google Calendar List Widget'
        ),
        ...
```

Documentation
=============

 * [The Definitive Guide to Phundament](https://github.com/phundament/app/wiki)
 * [gCalFlow: jQuery Google Calendar Event List Plug-in](http://sugi.github.io/jquery-gcal-flow/)