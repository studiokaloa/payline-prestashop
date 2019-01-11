<?php
/**
 * Payline module for PrestaShop
 *
 * @author    Monext <support@payline.com>
 * @copyright Monext - http://www.payline.com
 */

class paylineValidationModuleFrontController extends ModuleFrontController
{
    public $ssl = true;

    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $paylineToken = null;

        if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $this->setTemplate('module:payline/views/templates/front/1.7/validation.tpl');
        } else {
            $this->setTemplate('1.6/validation.tpl');
        }

        if (Tools::getValue('paylinetoken')) {
            // Token from widget
            $paylineToken = Tools::getValue('paylinetoken');
        } elseif (Tools::getValue('token')) {
            // Token from Payline (redirect)
            $paylineToken = Tools::getValue('token');
        }

        if (!empty($paylineToken)) {
            $this->module->processCustomerPaymentReturn($paylineToken);
        }
    }
}
