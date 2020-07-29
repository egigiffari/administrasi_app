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
        $requests = \App\Request::orderBy('updated_at', 'desc')->get();
        $pengajuan_user = \App\Request::where('applicant_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        $pengajuan_acc = \App\Request::where('status', 'approve')->get();
        $categories = RequestCategory::all();

        return view('home.index2', compact('users', 'divisions','requests', 'pengajuans','pengajuan_user', 'pengajuan_acc', 'categories'));
    }
}
