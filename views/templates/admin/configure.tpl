{*
*
* Payline module for PrestaShop
*
* @author    Monext <support@payline.com>
* @copyright Monext - http://www.payline.com
*
*}

<div class="col-lg-2">
    <a href="#landing-configuration" class="list-group-item {if $payline_active_tab == 'landing'}selected_tab active{/if}" data-toggle="tab" data-identifier="payline-configuration"><i class="icon icon-question"></i>&nbsp;&nbsp;{l s='What is Payline?' mod='payline'}</a>
    <a href="#payline-configuration" class="list-group-item {if $payline_active_tab == 'payline'}selected_tab active{/if}{if empty($payline_api_status)} list-group-item-danger{/if}" data-toggle="tab" data-identifier="payline-configuration"><i class="icon icon-money"></i>&nbsp;&nbsp;{l s='Payline configuration' mod='payline'}</a>
    <a href="#web-payment-configuration" class="list-group-item {if $payline_active_tab == 'web-payment'}selected_tab active{/if}" data-toggle="tab" data-identifier="web-payment-configuration"><i class="icon icon-cogs"></i>&nbsp;&nbsp;{l s='Web payment' mod='payline'}</a>
    {if !empty($payline_api_status)}<a href="#contracts-configuration" class="list-group-item {if $payline_active_tab == 'contracts'}selected_tab active{/if}{if !empty($payline_contracts_errors)} list-group-item-warning{/if}" data-toggle="tab" data-identifier="payline-configuration"><i class="icon icon-credit-card"></i>&nbsp;&nbsp;{l s='Contracts configuration' mod='payline'}</a>{/if}
</div>
<div class="tab-content col-lg-10">
    <div class="tab-pane {if $payline_active_tab == 'landing'}active{/if}" id="landing-configuration">{include file="./landing.tpl"}</div>
    <div class="tab-pane {if $payline_active_tab == 'web-payment'}active{/if}" id="web-payment-configuration">{$payline_web_payment_configuration}{* HTML *}</div>
    <div class="tab-pane {if $payline_active_tab == 'payline'}active{/if}" id="payline-configuration">{$payline_credentials_configuration}{* HTML *}</div>
    {if !empty($payline_api_status)}
    <div class="tab-pane {if $payline_active_tab == 'contracts'}active{/if}" id="contracts-configuration">{$payline_contracts_configuration}{* HTML *}</div>
    {/if}
</div>
