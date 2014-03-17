<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $this->data['users'] = Sentry::findAllUsers();
        $this->data['status'] = User::$status;
        return View::make('users.index', $this->data);
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
        return View::make('users.create', $this->data);
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
        if ($validation->passes()) {
            $user = Sentry::createUser($input);
            if ($user) {
                $adminGroup = Sentry::findGroupById(Input::get('group'));
                $user->addGroup($adminGroup);
            }
            return View::make('users.create', $this->data);
        }
        return Redirect::route('users.create')
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
        $user = Sentry::findUserById($id);
        if (is_null($user)) {
            return Redirect::route('users.index');
        }
        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
