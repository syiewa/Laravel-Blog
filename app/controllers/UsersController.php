<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        View::share('active', 'users');
    }

    public function index() {
        //
        $this->data['users'] = Sentry::findAllUsers();
        $this->data['status'] = User::$status;
        return View::make('admin.users.index', $this->data);
    }

    public function login() {
        if (Sentry::check()) {
            return Redirect::to('admin/artikel');
        }
        return View::make('admin.users.login');
    }

    public function logout() {
        Sentry::logout();
        return Redirect::to('/login');
    }

    public function doLogin() {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );
        $input = Input::get();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('login')->withInput()
                            ->withErrors($validation);
        }
        try {
            $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));
            if (Input::get('remember')) {
                Sentry::authenticate($credentials, true);
            } else {
                Sentry::authenticate($credentials, false);
            }
            return Redirect::to('admin/artikel');
        } catch (\Exception $e) {
            return Redirect::to('login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        $groups = Sentry::findAllGroups();
        $this->data['groups'] = array();
        foreach ($groups as $gr) {
            $this->data['groups'] = array(
                $gr->id => $gr->name,
            );
        }
        return View::make('admin.users.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $input = Input::except('group', 'password_confirmation');
        $validation = Validator::make(Input::except('group'), User::$rules);
        if (Input::get('group') == '1') {
            $input['permissions'] = array(
                'admin' => 1,
                'user' => 1
            );
        }
        if ($validation->passes()) {
            $user = Sentry::createUser($input);
            if ($user) {
                $adminGroup = Sentry::findGroupById(Input::get('group'));
                $user->addGroup($adminGroup);
            }
            return Redirect::route('admin.users.index');
        }
        return Redirect::route('admin.users.create')
                        ->withInput()
                        ->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $groups = Sentry::findAllGroups();
        $this->data['groups'] = array();
        foreach ($groups as $gr) {
            $this->data['groups'] = array(
                $gr->id => $gr->name,
            );
        }
        $this->data['user'] = Sentry::findUserById($id);
        if (is_null($this->data['user'])) {
            return Redirect::route('admin.users.index');
        }
        return View::make('admin.users.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $user = Sentry::findUserById($id);
        $rules = array(
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed|min:5',
        );
        $input = Input::get();
        $validation = Validator::make($input, $rules);
        if ($validation->passes()) {
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            if (Input::get('password') != '')
                $user->password = Input::get('password');
            if ($id == Sentry::getUser()->id) {
                $user->activated = '1';
            } else {
                $user->activated = Input::get('activated');
            }
            if ($user->save()) {
                $adminGroup = Sentry::findGroupById(Input::get('group'));
                $user->addGroup($adminGroup);
                return Redirect::route('admin.users.index');
            }
        }
        return Redirect::route('admin.users.edit', $id)
                        ->withInput()
                        ->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        try {
            // Find the user using the user id
            $user = Sentry::findUserById($id);

            // Delete the user
            if ($user->delete()) {
                return Redirect::route('admin.users.index');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('admin.users.edit', $id)
                            ->withInput()
                            ->withErrors('User was not found.');
        }
    }

}
