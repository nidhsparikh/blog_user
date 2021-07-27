<?php

namespace App\Http\Controllers;

use App\assign_user;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['Admin','auth']);
    }
    public function index()
    {
        $users = User::where('is_superadmin', 0)->get();
        return view('sadmin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $admin= user::where('role','admin')->orderBy('id', 'ASC')->get();
        if ($user) {
            return view('sadmin.assign', compact('user','admin','id'));
        } else {
            return back()->with('error', 'Data not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return view('sadmin.edit', compact('user'));
        } else {
            return back()->with('error', 'Data not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {

            $this->validate($request, [
                'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'mobile_number' => ['nullable', 'max:12'],
                'role' => ['required', 'string', 'max:255'],
            ]);
            $data = $request->all();
            
            $status = $user->fill($data)->save();
            if ($status) {
                return redirect()->route('users.index');
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function update_admin(Request $request)
    {
            $this->validate($request, [
                'assign_admin' => ['required'],
            ]);

            $data = $request->all();
            $data['user_id'] = $request->user_id;
            $status = assign_user::create($data);
            // $status = $user->fill($data)->save();
            if ($status) {
                return redirect()->route('users.index');
            } else {
                return back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
