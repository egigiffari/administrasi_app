<?php

namespace App\Http\Controllers;

use App\Position;
use App\RequestCategory;
use App\RequestResponsible;
use App\User;
use Illuminate\Http\Request;

class RequestResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RequestCategory::orderBy('id', 'desc')->paginate(10);
        return view('request.responsible.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'category_id' => 'required',
            'user_id' => 'required',
            'as' => 'required',
            'subject' => 'required',
            'priority' => 'required'
        ]);

        RequestResponsible::create($data);

        return redirect()->back()->withSuccess("Responsible Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = RequestCategory::findOrFail($id);
        $responsibles = RequestResponsible::where('category_id', $id)->orderBy('priority', 'desc')->paginate(10);
        $users = User::all();
        $positions = Position::all();

        return view('request.responsible.detail', compact('category', 'responsibles', 'users', 'positions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsible = RequestResponsible::findOrFail($id);
        $responsible_name = $responsible->users->name;
        $responsible->delete();

        return redirect()->back()->withSuccess("Penanggungjawab $responsible_name, Has Been Deleted");
    }
}
