<?php
namespace sednanref\userguide;

use sednanref\userguide\models\SettingsModel;

/**
 * Class Plugin
 * @package sednanref\userguide
 * User guide Plugin
 */
class Plugin extends \craft\base\Plugin
{
    public $hasCpSection = true;

    public $hasCpSettings = true;

    public function init() {

        /** @var SettingsModel $settings */
        $settings = $this->getSettings();
        $this->hasCpSection = $settings->userGuideEnabled;
    }

    protected function createSettingsModel() {
        return new SettingsModel();
    }

    protected function settingsHtml() {
        return \Craft::$app->getView()->renderTemplate('user-guide/_settings', [
            'settings' => $this->getSettings()
        ]);
    }
}