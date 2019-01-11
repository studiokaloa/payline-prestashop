<?php
/**
 * Payline module for PrestaShop
 *
 * @author    Monext <support@payline.com>
 * @copyright Monext - http://www.payline.com
 */

class paylineNotificationModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $this->setTemplate('module:payline/views/templates/front/1.7/notification.tpl');
        } else {
            $this->setTemplate('1.6/notification.tpl');
        }
        $notificationType = Tools::getValue('notificationType');

        if ($notificationType == 'WEBTRS' && Tools::getValue('token')) {
            $this->module->processNotification(Tools::getValue('token'));
        } elseif ($notificationType == 'TRS' && Tools::getValue('transactionId')) {
            $this->module->processTransactionNotification(Tools::getValue('transactionId'));
        } elseif ($notificationType == 'BILL' && Tools::getValue('transactionId') && Tools::getValue('paymentRecordId') && Tools::getValue('paymentMode') == 'NX') {
            $this->module->processNxNotification(Tools::getValue('transactionId'), Tools::getValue('paymentRecordId'));
        } elseif ($notificationType == 'BILL' && Tools::getValue('transactionId') && Tools::getValue('paymentRecordId') && Tools::getValue('paymentMode') == 'REC') {
            $this->module->processRecNotification(Tools::getValue('transactionId'), Tools::getValue('paymentRecordId'));
        } else {
            PrestaShopLogger::addLog('Payline - Unknown notification type "'. $notificationType .'"');
        }
    }

    /**
     * @see FrontController::displayMaintenancePage()
     */
    protected function displayMaintenancePage()
    {
        // Prevent maintenance page to be triggered
    }
}
