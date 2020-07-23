<?php

namespace App\Http\Controllers;

use App\ReportBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportBillController extends Controller
{

    private $url = 'uploads/bills';

    public function store(Request $request)
    {
        $this->validate($request, [
            'report_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $image = $request->image;

        $imageName = time().'.'.$image->extension();
        $image->move($this->url,$imageName);

        ReportBill::create([
            'report_id' => $request->report_id,
            'bill' => $this->url . '/' .$imageName,
        ]);
   
        return redirect()->back();
    }

    public function destroy($id)
    {
        $bill = ReportBill::whereId($id)->first();
        File::delete($bill->bill);
        $bill->delete();

        return redirect()->back()->withSuccess('Bill has been Deleted');
    }
}
