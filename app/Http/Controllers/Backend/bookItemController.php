<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BooItem;
class bookItemController extends Controller
{
	/**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function detroy($id){
    	$book=BooItem::findO($id);
		$book->delete($id);
		return redirect()->route('admin.book.show');
    }
}
