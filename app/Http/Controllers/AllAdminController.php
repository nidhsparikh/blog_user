<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['Auser','auth']);
    }

    public function index()
    {
        $id = Auth::user()->id;
        $admins = DB::table('table_assignusers')
        ->leftJoin('users','users.id','=','table_assignusers.user_id')
        ->select('table_assignusers.*','users.*')
        ->where([
            ['users.is_superadmin','=', '0'],
            ['table_assignusers.assign_admin','=',$id],
        ])
        ->get();
        $users = User::where('id', $id )->find($id);
        // dd($users);
        return view('admin.index', compact('admins','users'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = User::where('is_superadmin', 0)->findOrFail($id);
        if ($admins) {
            return view('admin.edit', compact('admins'));
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
        $admins = User::find($id);
        if ($admins) {

            $this->validate($request, [
                'f_name' => ['required', 'string', 'max:255'],
                'l_name' => ['required', 'string', 'max:255'],
                'mobile_number' => ['nullable', 'max:12'],
                'role' => ['required', 'string', 'max:255'],
            ]);
            $data = $request->all();
            
            $status = $admins->fill($data)->save();
            if ($status) {
                return redirect()->route('admin');
            } else {
                return back();
            }
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
