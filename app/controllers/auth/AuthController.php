<?php namespace App\Controllers\Auth;
 
    use Auth, BaseController, Form, Input, Redirect, Sentry, View;
 
    class AuthController extends BaseController {
 
        public function getLogin()
        {
            return View::make('auth.login');
        }
 
        public function postLogin()
        {
            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('password')
            );
 
            try
            {
                $user = Sentry::authenticate($credentials, false);
 
                if ($user)
                {
                    return Redirect::to('/');
                }
            }
            catch(\Exception $e)
            {
                return Redirect::route('auth.login')->withErrors(array('login' => $e->getMessage()));
            }
        }
 
        public function getLogout()
        {
            Sentry::logout();
 
            return Redirect::to('/');
        }


    /**
     * Register a new user. 
     *
     * @return Response
     */
    public function getRegister()
    {
        // Show the register form
        return View::make('auth.register');
    }

    public function postRegister() 
    {

        // Gather Sanitized Input
        $input = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation')
            );

        // Set Validation Rules
        $rules = array (
            'email' => 'required|min:4|max:32|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
            );

        //Run input validation
        $v = \Validator::make($input, $rules);

        if ($v->fails())
        {
            // Validation has failed
            return Redirect::to('auth/register')->withErrors($v)->withInput();
        }
        else 
        {

            try {
                //Attempt to register the user. 
                $user = Sentry::register(array('email' => $input['email'], 'password' => $input['password']), true);

                //Add this person to the user group. 
                $userGroup = Sentry::getGroupProvider()->findById(1);
                $user->addGroup($userGroup);

                    $credentials = array(
                        'email'    => $input['email'],
                        'password' => $input['password'],
                    );

                $valid_login = Sentry::authenticate($credentials, false);
                        if ($valid_login)
                        {
                            return Redirect::to('home')->with('success', 'Congratulations, your account has been successfully created!');
                        }
                        else
                        {
                            return Redirect::to('login')->with_errors($errors);
                        }

                \Session::flash('success', 'Your account has been activated. <a href="/users/login">Click here</a> to log in.');
                return Redirect::to('/');

            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                \Session::flash('error', 'Login field required.');
                return Redirect::to('auth/register')->withErrors($v)->withInput();
            }
            catch (Cartalyst\Sentry\Users\UserExistsException $e)
            {
                \Session::flash('error', 'User already exists.');
                return Redirect::to('auth/register')->withErrors($v)->withInput();
            }

        }
    }


 
    }