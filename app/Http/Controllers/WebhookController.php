<?php

namespace App\Http\Controllers;

use NextcloudApiWrapper\Wrapper;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebhookController extends CashierController
{
    //
    public function handleCustomerSubscriptionDeleted($payload){
      $user = \App\User::where('stripe_id',$payload->id)->first();
      //The base path to Nextcloud api entry point, dont forget the last '/'
      $basePath   = 'https://box.jyroneparkeremail.space/cloud/ocs/';
      $username   = 'inquiries@jyroneparker.com';
      $password   = 'n1nt3nd0';

      $wrapper    = Wrapper::build($basePath, $username, $password);

      // https://docs.nextcloud.com/server/12/admin_manual/configuration_user/user_provisioning_api.html
      $userClient                 = $wrapper->getUsersClient();

      //Instance of \NextcloudApiWrapper\NextcloudResponse
      $response   = $userClient->disableUser($user->email);

      $code       = $response->getStatusCode();   //status code
      $users      = $response->getData();         //data as array
      $message    = $response->getStatus();       //status message
      $guzzle     = $response->getRawResponse();  //Guzzle response
    }

}
