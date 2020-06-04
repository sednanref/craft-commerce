<?php
namespace sednanref\userguide\models;

use craft\base\Model;

class SettingsModel extends Model {

    public $userGuideEnabled = true;

    public $notificationEmail;

    public $markdownText = '';

}