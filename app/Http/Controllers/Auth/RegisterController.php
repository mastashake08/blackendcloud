<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use NextcloudApiWrapper\Wrapper;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->createNextCloudUser($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'trial_ends_at' => now()->addDays(3),
        ]);
    }

    private function createNextCloudUser(array $data){
      //The base path to Nextcloud api entry point, dont forget the last '/'
      $basePath   = 'https://box.jyroneparkeremail.space/cloud/ocs/';
      $username   = 'inquiries@jyroneparker.com';
      $password   = 'n1nt3nd0';

      $wrapper    = Wrapper::build($basePath, $username, $password);

      // https://docs.nextcloud.com/server/12/admin_manual/configuration_user/user_provisioning_api.html
      $userClient                 = $wrapper->getUsersClient();

      //Instance of \NextcloudApiWrapper\NextcloudResponse
      $response   = $userClient->addUser($data['email'],$data['password']);

      $code       = $response->getStatusCode();   //status code
      $users      = $response->getData();         //data as array
      $message    = $response->getStatus();       //status message
      $guzzle     = $response->getRawResponse();  //Guzzle response
      // disable user until their payment goes through
      $response2   = $userClient->disableUser($data['email']);
      $code2       = $response->getStatusCode();   //status code
      $users2      = $response->getData();         //data as array
      $message2    = $response->getStatus();       //status message
      $guzzle2     = $response->getRawResponse();  //Guzzle response


    }
}
