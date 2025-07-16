<?php

namespace App\Http\Controllers\Auth;

use App\DataTables\CmsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\OtpRequest;
use App\Models\User;
use App\Services\Auth\AccountServices;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    protected $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function index(CmsDataTable $dataTable)
    {
        $resource = 'account';
        $page_title = 'List of Account';
        $columns = ['ID', 'NAME', 'ACTION'];
        $data = User::getAllUser();
        return $dataTable
            ->render('account.index', compact(
                'data',
                'resource',
                'page_title',
                'columns'
            ));
    }

    public function store(AccountRequest $request)
    {
        $register = $this->accountServices->storeAccount($request->validated());

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.account.index')
            ->with('success', 'You have successfully an account for' . $register->name);
    }

    public function destroy(User $account)
    {
        $this->accountServices->storeDestroy($account);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.account.index')
            ->with('success', 'You have succcessfully deleted a user!');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginAuthenticate(LoginRequest $request)
    {
        try
        {
            $user = $this->accountServices->authenticate($request->validated());

            if(!$user->email_verified_at)
            {
                $this->accountServices->confirmationSent($user);

                return redirect()
                    ->route('confirmation.index', $user->id)
                    ->with('failed', 'You have to verify your email first. An OTP has been sent to your registered email and contact number.');
            } else {
                return redirect()
                    ->route(Auth::user()->getRoleNames()->first() . '.dashboard')
                    ->with('success', 'Logged in successfully!');
            }
        } catch (AuthenticationException $e) {
            return redirect()
                ->route('login.index')
                ->with('failed', 'Invalid login credentials.');
        }
    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $register = $this->accountServices->register($request->validated());

        return redirect()
            ->route('confirmation.index', $register->id)
            ->with('success', 'Registration successful. Kindly check your email for OTP.');
    }

    public function confirmationIndex(User $user)
    {
        return view('auth.confirmation', compact('user'));
    }

    public function confirm(User $user, OtpRequest $request)
    {
        $verify = $this->accountServices->confirm($request->validated(), $user);

        if($verify)
        {
            return redirect()
                ->route('login.index')
                ->with('success', 'Your account has been successfully confirmed.');
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Invalid OTP. Please try again.');
        }
    }

    public function profileIndex()
    {

    }

    public function updateProfile()
    {

    }

    public function logout()
    {
        $this->accountServices->logout();

        return redirect()
            ->route('login.index')
            ->with('success', 'Logged out successfully!');
    }
}