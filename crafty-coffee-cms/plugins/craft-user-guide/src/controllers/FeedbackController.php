<?php
namespace sednanref\userguide\controllers;


use craft\web\Controller;
use sednanref\userguide\models\SettingsModel;
use sednanref\userguide\Plugin;

class FeedbackController extends Controller {


    public function actionSend(){

        $request = \Craft::$app->getRequest();

        $subject = $request->getRequiredParam('subject');
        $topic = $request->getRequiredParam('topic');
        $message = $request->getRequiredParam('message');

        $user = \Craft::$app->getUser()->getIdentity();

        /** @var SettingsModel $settings */
        $settings = Plugin::getInstance()->getSettings();

        $mailer = \Craft::$app->getMailer();

        $message = $mailer->compose()
            ->setFrom($user->email)
            ->setTo($settings->notificationEmail)
            ->setSubject($subject)
            ->setHtmlBody($message);

        $success = $message->send();

        if ($success) {
            \Craft::$app->getSession()->setNotice('Message successfully sent.');
        } else {
            \Craft::$app->getSession()->setError('Message could not be sent.');
        }
    }
}