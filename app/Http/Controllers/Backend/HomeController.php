<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Borrow;
use App\User;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Display view Homepage
     *
     * @return void
     */
    public function index()
    {
        return view('admin.chart');
    }
    /**
     * Get API for chart.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApiBorrow()
    {
        $result = Borrow::selectRaw('count(id) as "total", Date(created_at) as "datecreate", sum(quantity) as quantitys')->groupBy('datecreate')->orderBy('created_at', 'ASC')->get();
        if (!$result) {
            Session::flash('danger', trans('labels.danger'));
        }
        return response()->json($result, 200);
    }
    /**
     * Get API for chart.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getApiUser(Request $request)
    {
        $data=$request->all();
        if (!$data) {
            Session::flash('danger', trans('labels.danger'));
        } else {
            $result = User::selectRaw('count(id) as "userid", Date(created_at) as "created"')->groupBy('created')->orderBy('created', 'ASC')->get();
            if (!$result) {
                Session::flash('danger', trans('labels.danger'));
            }
            for ($i=0; $i<count($result); $i++) {
                $date=$result[$i]['created'];
                $years=substr($date, 0, 4);
                if ($years==$data['year']) {
                    $list[]=['userid'=>  $result[$i]['userid'],
                              'created'=> substr($result[$i]['created'], 5, 2)
                            ];
                }
            }
            return response()->json($list, 200);
        }
    }
}
