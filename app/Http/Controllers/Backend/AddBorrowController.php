<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Borrow;
use App\Book;
use App\BookItem;
use App\BorrowDetail;
use Carbon\Carbon;
use DB;
use Auth;

class AddBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.borrows.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     *@param \Illuminate\Http\Request\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=$request->all();
        try {
            $bookitem=BookItem::findOrfail($data['bookID']);
            $book=Book::findOrfail($bookitem['book_id']);
            try {
                $borrowDetailItem=BorrowDetail::where('book_item_id',$bookitem['id'])->first();
                if ($borrowDetailItem['status']=='0') {
                    return response()->json(['mes'=> trans('borrow.book_borrowed')]);
                } else {
                    $bookitem['bookname']=$book['name'];
                    return response()->json($bookitem);
                }
                
            } catch (ModelNotFoundException $ex){
                $bookitem['bookname']=$book['name'];
                return response()->json($bookitem);

            }
           
        } catch (ModelNotFoundException $ex) {
            return response()->json(['mes'=> trans('borrow.book_not_exist')]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        
        $borrow=Borrow::create(['user_id'=>$data['listBook']['0'],
                                'admin_user_id' => Auth::guard('admin')->user()->id,
                                'quantity' => count($data['listBook'])-1
                               ]);
        
        $borrowDetail = array();
       
        for ($i=1; $i < count($data['listBook']); $i++) {
            $current = Carbon::now();
            $expireTime = $current->addDays(30);
            array_push($borrowDetail, [
                'borrow_id' => $borrow['id'],
                'book_item_id' => $data['listBook'][$i],
                'status' => '0',
                'expiretime' => $expireTime ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $list=BorrowDetail::insert($borrowDetail);
        if ($list) {
            return response()->json(['mes'=>trans('borrow.success')]);
        } else {
            return response()->json(['mes'=>trans('borrow.fail')]);
        }
    }

    /**
     * Check and show info user.
     *
     * @param int $id id_user
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user=User::findOrfail($id);
            $a=Borrow::where('user_id',$user['id'])->get();
            $total=0;
            foreach ($a as $item) {
                $total+=$item['quantity'];
            }
            if ($total< 5) {
                return response()->json(['mes' => trans('borrow.user_allow'),
                                         'allow' => trans('borrow.true'),
                                         'quantity' => (5-$total)
                                    ]);
            } else {
                return response()->json(['mes'=> trans('borrow.max_borrow'),
                                         'allow'=> trans('borrow.false')
                    ]);
            }
            
        } catch (ModelNotFoundException $ex){
            return response()->json(['mes'=> trans('borrow.no_user')]);
    
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
