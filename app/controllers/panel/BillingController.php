<?php

namespace Panel;

use View;

class BillingController extends BaseController {
    
    public function getIndex() {

        return View::make('panel.billing.index');
    }

    public function getThanks() {

        return View::make('panel.billing.thanks');
    }

    /*
    public function postCoinbase() {
        // Coming Soon
    }

    public function postBraintree() {
        Braintree_Configuration::environment(Config::get('billing.braintree.environment'));
        Braintree_Configuration::merchantId(Config::get('billing.braintree.merchantId'));
        Braintree_Configuration::publicKey(Config::get('billing.braintree.publicKey'));
        Braintree_Configuration::privateKey(Config::get('billing.braintree.privateKey'));

        $result = Braintree_Transaction::sale(array(
            'amount' => Config::get('billing.plans.pro'),
            'creditCard' => array(
                'number' => Input::get('number'),
                'cvv' => Input::get('cvv'),
                'expirationMonth' => Input::get('month'),
                'expirationYear' => Input::get('year')
            ),
            'options' => array(
                'submitForSettlement' => true
            )
        ));

        var_dump($result);

        if ($result->success) {
            echo "<h1>Success! Transaction ID: " . $result->transaction->id . "</h1>";
        } else {
            echo "<h1>Error: " . $result->message . "</h1>";
        }
    }
    */

}
