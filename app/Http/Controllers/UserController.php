<?php

namespace App\Http\Controllers;

use App\Division;
use App\Level;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PositionSeeder;

class UserController extends Controller
{

    protected $url_file = "uploads/users/";
    protected $url_file_signature = "uploads/users/signature/";
    protected $image_name = 'default.png';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        $levels = Level::all();
        $positions = Position::all();
        return view('user.create', compact('divisions','levels', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:13',
            'address' => 'required',
            'level' => 'required',
            'division' => 'required',
            'position' => 'required',
        ]);

        $password = bcrypt('1234');
        if ($request->input('password')) {
            $this->validate($request,[
                'password' => 'required|string|min:6|confirmed',               
            ]);
            $password = bcrypt($request->password);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'level_id' => $request->level,
            'division_id' => $request->division,
            'password' => $password,
            'image' => $this->url_file . $this->image_name,
            'signature' => $this->url_file_signature . $this->image_name
        ];

        if ($request->has('image')) {
            $image = $request->image;
            $this->image_name = time().$image->getClientOriginalName();
            $data['image'] = $this->url_file . $this->image_name;
            $image->move($this->url_file, $this->image_name);
        }

        if ($request->has('signature')) {
            $image = $request->image;
            $this->image_name = time().$image->getClientOriginalName();
            $data['signature'] = $this->url_file_signature . $this->image_name;
            $image->move($this->url_file_signature , $this->image_name);
        }

        $user = User::create($data);
        $user->positions()->attach($request->position);

        return redirect()->back()->withSuccess("User : $request->name, Has Been Created");

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
        $requests = \App\Request::where('applicant_id', $id)->paginate(10);
        return view('user.detail', compact('user', 'requests'));
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
        $divisions = Division::all();
        $levels = Level::all();
        $positions = Position::all();
        return view('user.edit', compact('user', 'divisions','levels', 'positions'));
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

        // dd($request->all());
        $user = User::findOrFail($id);
        if ($user->email == $request->email) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|max:13',
                'address' => 'required',
                'level' => 'required',
                'division' => 'required',
                'position' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|max:13',
                'address' => 'required',
                'level' => 'required',
                'division' => 'required',
                'position' => 'required',
            ]);
        }

        if ($request->input('password')) {
            $this->validate($request,[
                'password' => 'required|string|min:6|confirmed',               
            ]);
            $password = bcrypt($request->password);
            User::whereId($id)->update(['password' => bcrypt($request->password)]);
        }

        if ($request->has('image')) {
            // dd($this->url_file . 'default.png');
            $image = $request->image;
            $this->image_name = time().$image->getClientOriginalName();
            $image_name = $this->url_file . $this->image_name;
            if ($user->image != $this->url_file . 'default.png') {
                File::delete($user->image);
            }
            $image->move($this->url_file, $this->image_name);
            User::whereId($id)->update(['image' => $image_name]);
        }

        if ($request->has('signature')) {
            $image = $request->signature;
            $this->image_name = time().$image->getClientOriginalName();
            $image_name_signature = $this->url_file_signature . $this->image_name;
            if ($user->signature != $this->url_file_signature . 'default.png') {
                File::delete($user->signature);
            }
            $image->move($this->url_file_signature, $this->image_name);
            User::whereId($id)->update(['signature' => $image_name_signature]);
        }
        

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'level_id' => $request->level,
            'division_id' => $request->division,
        ];

        $user->positions()->sync($request->position);
        $user = User::whereId($id)->update($data);

        return redirect()->route('user.show', $id)->withSuccess("User : $request->name, Has Been Created");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        $user = User::findOrFail(Auth::id());
        $requests = \App\Request::where('applicant_id', Auth::id())->paginate(10);
        return view('user.profile', compact('user', 'requests'));
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user_name = $user->name;
        $user->delete();

        return redirect()->route('user.index')->withSuccess("User : <strong>$user_name</strong> Moved To Trash");
    }

    public function trash_user()
    {
        $users = user::onlyTrashed()->paginate(10);
        return view('user.trash', compact('users'));
    }

    public function restore_user($id)
    {
        $user = user::withTrashed()->where('id', $id)->first();
        $user_name = $user->name;
        $user->restore();

        return redirect()->back()->withSuccess("User : <strong>$user_name</strong> Moved To User");
    }

    public function permanent_delete($id)
    {
        $user = user::withTrashed()->where('id', $id)->first();
        $user_name = $user->name;
        $user->forceDelete();

        return redirect()->back()->with('success', "User : <strong>$user_name</strong> Has Been Permanent Delete");
    }
}
