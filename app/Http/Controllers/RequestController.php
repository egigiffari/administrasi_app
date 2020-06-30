<?php

namespace App\Http\Controllers;

use App\Notification;
use App\RequestCategory;
// use App\Request;
use App\RequestApprove;
use App\RequestItems;
use Carbon\Carbon;

use App\Providers\AppServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequestCategory $id)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequestCategory $id)
    {
        // $users = User::where('level_id', 1)->orWhere('level_id', 2)->orWhere('level_id', 3)->get();
        // dd($users);
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

        $notification = Notification::where('request_id', $id)->where('is_read', 0)->get();
        foreach ($notification as $notif)
        {
            if($notif->user_id == Auth::id())
            {
                // dd($notif->id);
                $update = Notification::find($notif->id);
                $update->is_read = 1;
                $update->save();
            }
        }

        $request = \App\Request::findOrFail($id);
        $category = RequestCategory::findOrFail($request->category_id);
        $items = RequestItems::where('request_id', $request->id)->get();
        $responsibles = RequestApprove::where('request_id', $request->id)->orderBy('priority', 'asc')->get();
        return view('request.request_category.detail', compact('request', 'items', 'category', 'responsibles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = \App\Request::findOrFail($id);
        $request_name = $request->categories->name;

        RequestItems::where('request_id', $id)->delete();
        RequestApprove::where('request_id', $id)->delete();
        $request->delete();

        return redirect()->back()->withSuccess("$request_name, Has Been Deleted");
    }

    public function approve(Request $request)
    {
        $this->validate($request, ['status' => 'required']);
        if (preg_match('/all-/',$request->status))
        {
            $approve = RequestApprove::where('request_id', $request->request_id)->get();
            $status = $request->status;
            if ($status == 'all-reset')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestApprove::whereId($approve[$i]['id'])->update(['status' => 'waiting']);
                    \App\Request::whereId($request->request_id)->update(['status' => 'on proses']);
                }
            } elseif ($status == 'all-acc')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestApprove::whereId($approve[$i]['id'])->update(['status' => 'acc']);
                    \App\Request::whereId($request->request_id)->update(['status' => 'approve']);
                }
            } elseif ($status == 'all-revision')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestApprove::whereId($approve[$i]['id'])->update(['status' => 'revision']);
                    \App\Request::whereId($request->request_id)->update(['status' => 'revision']);
                }
            }

            return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
            
        }
        $status = $request->status;
        $approve = RequestApprove::where('request_id', $request->request_id)->where('user_id', Auth::id())->first();
        RequestApprove::whereId($approve->id)->update(['status' => $status]);

        // GET ALL STATUS APPROVER
        $approver = RequestApprove::where('request_id', $request->request_id)->get();

        // LOOP ALL STATUS
        for ($i=0; $i < count($approver); $i++) {

            // CHECK ALL STATUS AND UPDATE REQUEST STATUS LIKE APPROVE STATUS
            if ($approver[$i]['status'] == 'cancel')
            {
                \App\Request::whereId($request->request_id)->update(['status' => 'cancel']);
                break; 
            }
            elseif($approver[$i]['status'] == 'hold')
            {
                \App\Request::whereId($request->request_id)->update(['status' => 'hold']);
                break;
            }
            elseif ($approver[$i]['status'] == 'revision')
            {
                \App\Request::whereId($request->request_id)->update(['status' => 'revision']);
                break;
            }
            elseif ($approver[$i]['status'] == 'waiting')
            {
                \App\Request::whereId($request->request_id)->update(['status' => 'on proses']);
                break;
            }
            elseif ($approver[count($approver) - 1]['status'] == 'acc')
            {
                \App\Request::whereId($request->request_id)->update(['status' => 'approve']);
                break;
            }
        }

        return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
        
    }



    public function deleteItem($id)
    {
        $item = RequestItems::findOrFail($id);
        $item->delete();

        return redirect()->back()->withSuccess("Items Has Been Deleted");
    }
}
