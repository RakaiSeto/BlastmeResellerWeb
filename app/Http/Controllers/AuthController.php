<?php

namespace App\Http\Controllers;

use Grpc\ChannelCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Rootadminweb\DoLoginRequest;
use Rootadminweb\DoLogoutRequest;
use Rootadminweb\RootAdminWebServiceClient;
use Validator;
use App\Models\User;

class AuthController extends Controller {

    /**
     * Display login of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function login(){
        $title = "Login";
        $description = "Some description for the page";
        return view('auth.login',compact('title','description'));
    }

    /**
     * Display register of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function register(){
        $title = "Register";
        $description = "Some description for the page";
        return view('auth.register',compact('title','description'));
    }

    /**
     * Display forget password of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function forgetPassword(){
        $title = "Forget Password";
        $description = "Some description for the page";
        return view('auth.forget_password',compact('title','description'));
    }

    /**
     * make the user able to register
     *
     * @return
     */
    public function signup(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('register')->withErrors($validators)->withInput();
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            auth()->login($user);
            return redirect()->intended(route('dashboard.demo_one','en'))->with('message','Registration was successfull !');
        }
    }

    /**
     * make the user able to login
     *
     * @return
     */
    public function authenticate(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return redirect()->route('login')->withErrors($validators)->withInput();
        }else{
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->intended(route('dashboard.demo_one','en'))->with('message','Welcome back !');
            }else{
                return redirect()->route('login')->with('message','Login failed !Email/Password is incorrect !');
            }
        }
    }

    public function doLogin(Request $request){
        Log::debug('DoLogin');

        $payloadArray = json_decode($request->getContent(), true);

        $grpcRootAdminWeb = new RootAdminWebServiceClient(RPCAddressRootAdmin, ['credentials' => ChannelCredentials::createInsecure()]);
        $grpcRequest = new DoLoginRequest();
        $grpcRequest->setEmail($payloadArray[0]);
        $grpcRequest->setPassword($payloadArray[1]);

        list($result, $status) = $grpcRootAdminWeb->DoLogin($grpcRequest)->wait();

        $grpcHitStatus = $status->code;

        Log::debug('DoLogin Hit Status: ' . $grpcHitStatus);

        $respStatus = $result->getStatuscode();
        $description = $result->getDescription();
        if ($grpcHitStatus === 0) {
            Log::debug('DoLogin Status Hit: ' . $respStatus);
            Log::debug('Login Status Code: ' . $respStatus);
            if ($respStatus === '000') {

                $sessionResult = $result->getResult()[0];

                $request->session()->put('sessionSignature', $result->getSession());
                $request->session()->put('sessionAccountId', $sessionResult->getId());
                $request->session()->put('sessionRoleId', $sessionResult->getRoleid());
                $request->session()->put('sessionEmail', $sessionResult->getEmail());
                $request->session()->put('sessionPhone', $sessionResult->getPhone());
                $request->session()->put('sessionFirstName', $sessionResult->getFirstname());
                $request->session()->put('sessionLastName', $sessionResult->getLastname());
                $request->session()->put('sessionFullName', $sessionResult->getFullname());
                $request->session()->put('sessionClientId', $sessionResult->getClientid());

                echo 'yes';
            } else if ($respStatus === '700') {
                echo 'Invalid Credential';
            } else {
                echo 'Failed Login : ' . $description . '. Please try again.';
            }
        } else {
            Log::debug('DoLogin Failed Status Hit: ' . $respStatus);
        }


        echo '';
    }

    /**
     * make the user able to logout
     *
     * @return
     */
    public function logout(Request $request){
        $grpcRootAdminWeb = new RootAdminWebServiceClient(RPCAddressRootAdmin, ['credentials' => ChannelCredentials::createInsecure()]);
        $grpcRequest = new DoLogoutRequest();
        $grpcRequest->setEmail($request->session()->get('sessionEmail'));

        list($result, $status) = $grpcRootAdminWeb->DoLogout($grpcRequest)->wait();

        $grpcHitStatus = $status->code;

        Log::debug('DoLogout Hit Status: ' . $grpcHitStatus);
        $respStatus = $result->getStatuscode();
        Log::debug('Login Status Code: ' . $respStatus);

        Auth::logout();
        return redirect()->route('login')->with('error','Successfully Logged out !');
    }
}
