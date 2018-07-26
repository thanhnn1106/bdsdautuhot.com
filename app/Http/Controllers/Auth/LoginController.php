<?php


namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var App|Application
     */
    protected $app;
    protected $mailer;

    // Overwrite
    protected $redirectAfterLogout = '/home';
    protected $redirectPath        = '/home';

    /**
     * AuthController constructor.
     * @param Application $app
     * @param Mailer $mailer
     */
    public function __construct(Application $app, Mailer $mailer)
    {
        $this->middleware('guest:web', [
            'except' => [
                'logout',
            ],
        ]);
    }

    /**
     * Log the user out of the application.
     * Overwrite
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('front.home');
    }

    /**
     * @return string
     */
    public function redirectPath()
    {
        return route('front.home');
    }

    /**
     * Get the guard to be used during authentication.
     * Overwrite
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    /**
     * Get the needed authorization credentials from the request.
     * Overwrite
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials           = $request->only('email', 'password', 'status');
        $credentials['status'] = config('site.user_status.value.active');

        return $credentials;
    }

}
