<?php

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use NextcloudApiWrapper\Wrapper;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json(new UserResource($request->user()));
});
Route::middleware('auth:api')->post('/subscription', function (Request $request) {
    $user = $request->user();
    $user->newSubscription('main', 'blackendcloud')->create($request->stripeToken);
    //The base path to Nextcloud api entry point, dont forget the last '/'
    $basePath   = 'https://box.jyroneparkeremail.space/cloud/ocs/';
    $username   = 'inquiries@jyroneparker.com';
    $password   = 'n1nt3nd0';

    $wrapper    = Wrapper::build($basePath, $username, $password);

    // https://docs.nextcloud.com/server/12/admin_manual/configuration_user/user_provisioning_api.html
    $userClient                 = $wrapper->getUsersClient();

    //Instance of \NextcloudApiWrapper\NextcloudResponse
    $response   = $userClient->enableUser($request->user()->email);

    $code       = $response->getStatusCode();   //status code
    $users      = $response->getData();         //data as array
    $message    = $response->getStatus();       //status message
    $guzzle     = $response->getRawResponse();  //Guzzle response

    return response()->json(new UserResource($user));
});
Route::middleware('auth:api')->post('/subscription/update', function (Request $request) {
    $user = $request->user();
    $user->updateCard($request->stripeToken);

    return response()->json(new UserResource($user));
});
Route::middleware('auth:api')->post('/subscription/stop', function (Request $request) {
    $user = $request->user();
    $user->subscription('main')->cancelNow();
    //The base path to Nextcloud api entry point, dont forget the last '/'
    $basePath   = 'https://box.jyroneparkeremail.space/cloud/ocs/';
    $username   = 'inquiries@jyroneparker.com';
    $password   = 'n1nt3nd0';

    $wrapper    = Wrapper::build($basePath, $username, $password);

    // https://docs.nextcloud.com/server/12/admin_manual/configuration_user/user_provisioning_api.html
    $userClient                 = $wrapper->getUsersClient();

    //Instance of \NextcloudApiWrapper\NextcloudResponse
    $response   = $userClient->disableUser($request->user()->email);

    $code       = $response->getStatusCode();   //status code
    $users      = $response->getData();         //data as array
    $message    = $response->getStatus();       //status message
    $guzzle     = $response->getRawResponse();  //Guzzle response

    return response()->json(new UserResource($user));
});
Route::post(
    'stripe/webhook',
    '\App\Http\Controllers\WebhookController@handleWebhook'
);
