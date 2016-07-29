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
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=$request->all();
        try {
            $bookitem=BookItem::findOrfail($data['bookID']);
            // dd($bookitem['book_id']);
            $book=Book::findOrfail($bookitem['book_id']);
            // dd($book);
            // dd($bookitem['id']);
            try{
                $borrowDetailItem=BorrowDetail::where('book_item_id',$bookitem['id'])->first();
                // dd($borrowDetailItem);
                // dd($borrowDetailItem['status']=='0');
                if($borrowDetailItem['status']=='0'){
                    return response()->json(['mes'=>'This book has been borrowed by another user !']);
                } else {
                    $bookitem['bookname']=$book['name'];
                    return response()->json($bookitem);
                }
                
            } catch (ModelNotFoundException $ex){
                $bookitem['bookname']=$book['name'];
                return response()->json($bookitem);

            }
            
            // return response()->json($bookitem);
           
        } catch (ModelNotFoundException $ex) {
            return response()->json(['mes'=>'book not exist .please check again!']);
            // return redirect()->route('admin.book.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\BookRequest $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        // dd($data);
        for($i=1; $i<count($data['listBook']); $i++){
            try {
            $bookitem=BookItem::findOrfail($data['listBook'][$i]);
            // dd($bookitem['book_id']);
            $book=Book::findOrfail($bookitem['book_id']);
            // dd($book);
            // dd($bookitem['id']);
                try{
                    $borrowDetailItem=BorrowDetail::where('book_item_id',$bookitem['id'])->first();
                    // dd($borrowDetailItem);
                    // dd($borrowDetailItem['status']=='0');
                    if($borrowDetailItem['status']=='0'){
                        $allow="false"; //if statous is borrowing
                        break; 
                    } else {
                        $allow="true"; // if status is given back
                    }
                    
                } catch (ModelNotFoundException $ex){
                    $allow="true";

                }
                
                // return response()->json($bookitem);
               
            } catch (ModelNotFoundException $ex) {
                $allow="false";
                // return response()->json(['mes'=>'book not exist .please check again!']);
                // return redirect()->route('admin.book.index');
            }
        }
        if($allow!="false"){
            $borrow=Borrow::create(['user_id'=>$data['listBook']['0'],
                                    'admin_user_id' => Auth::guard('admin')->user()->id,
                                    'quantity' => count($data['listBook'])-1
                                   ]);
            // dd($borrow);
            // return response()->json($data);
            // return response()->json($borrow);
            for($i=1; $i<count($data['listBook']); $i++){
                //get the current time
                $current = Carbon::now();
                // dd($i);
                //add 30 days to the current time
                $expireTime = $current->addDays(30);
                $borowItem=BorrowDetail::create(['borrow_id'=> $borrow['id'],
                                                 'book_item_id'=> $data['listBook'][$i],//hereeeeeee
                                                 'status' => '0',
                                                 'expiretime' => $expireTime 
                                                ]);
                if (!empty($borrowItem)){
                    $mes="fail";
                }
                $mes="Succesful";
                // dd($borowItem);
                // return response()->json($borowItem);
            }
            return response()->json(['mes'=>$mes]);
        }
        return response()->json(['mes'=>$allow]);
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
        try{
            $user=User::findOrfail($id);
            $a=Borrow::where('user_id',$user['id'])->get();
            $total=0;
            foreach ($a as $item) {
                $total+=$item['quantity'];
            }
            if($total< 5){
                return response()->json(['mes'=>'User allow to borrow book',
                                         'allow'=>'true','quantity'=>(5-$total)
                                    ]);
            }else{
                return response()->json(['mes'=> 'User has max borrow',
                                         'allow'=> 'false'
                    ]);
            }
            
        }catch(ModelNotFoundException $ex){
            return response()->json(['mes'=>'no found user']);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $book = Book::findorFail($id);
            return view('admin.book.addbook', compact('book'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddBookRequest $request, $id)
    {
        try {
            $book = Book::findorFail($id);
            $number = $request->input('quantity_additional');
            $book->quantity = $book['quantity'] + $number;
            $result = $book->save();
            if ($result) {
                Session::flash('success', trans('book_manage_lang.success_add_book'));
                for ($i=0; $i < $number; $i++) {
                    BookItem::create(['book_id' => $book['id']]);
                }
            } else {
                Session::flash('danger', trans('book_manage_lang.unsuccess_add_book'));
            }
            return redirect()->route('admin.book.index');
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
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
