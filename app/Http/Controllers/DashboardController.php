<?php

namespace App\Http\Controllers;

use App\Division;
use App\RequestCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $divisions = Division::all();
        $pengajuans = \App\Request::all();
        $pengajuan_user = \App\Request::where('applicant_id', Auth::id())->get();
        $pengajuan_acc = \App\Request::where('status', 'approve')->get();
        $categories = RequestCategory::all();

        return view('home.index', compact('users', 'divisions', 'pengajuans','pengajuan_user', 'pengajuan_acc', 'categories'));
    }
}
