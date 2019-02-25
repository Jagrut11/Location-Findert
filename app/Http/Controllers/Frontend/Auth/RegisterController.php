<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        // Where to redirect users after registering
        $this->redirectTo = route('frontend.index');

        $this->user = $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        /*if (config('access.users.confirm_email')) {
            $user = $this->user->create($request->all());
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.created_confirm'));
        } else {
            access()->login($this->user->create($request->all()));
            event(new UserRegistered(access()->user()));

            return redirect($this->redirectPath());
        }*/

        if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
<<<<<<< HEAD
            $user = $this->user->create($request->only('first_name', 'last_name', 'email', 'password', 'is_term_accept','designation'));
=======

            $user = $this->user->create($request->all());
>>>>>>> 99fbb850d59c32643b0c4f01cd2f8b12eef7da57
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(
                config('access.users.requires_approval') ?
                    trans('exceptions.frontend.auth.confirmation.created_pending') :
                    trans('exceptions.frontend.auth.confirmation.created_confirm')
            );
        } else {
            access()->login($this->user->create($request->only('first_name', 'last_name', 'email', 'password', 'is_term_accept','designation','contact','department')));
            event(new UserRegistered(access()->user()));

            return redirect($this->redirectPath());
        }
    }
}
