<?php

namespace App\Http\Controllers;

use App\ReportSetting;
use Illuminate\Http\Request;

class ReportSettingController extends Controller
{

    public function index()
    {
        $report = ReportSetting::first();
        // dd($report);
        return view('request.report.setting', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $setting = ReportSetting::whereid($id)->first();
        $data = $this->validate($request, [
            'syarat' => 'required'
        ]);

        $setting->update($data);

        return redirect()->back()->withSuccess('Settings Has Been Saved');
    }

}
