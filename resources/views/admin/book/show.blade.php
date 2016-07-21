@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title'))

@section('content')
	<div class="col-lg-12 " id="styleshowbook">
		<div class="col-lg-6">
			<div class="col-lg-4">
				<div class="col-lg-12">
					{!! Form::image(config('path.upload_book').$list->image,null,['class' => ' img-thumbnail ','id' => 'image_no'])!!}
				</div>
			</div>
			<div class="col-lg-8 styletext">
				<div class="col-lg-12 ">
					{!! Form::label(null,$list->name,['class' =>'control-label test']) !!}
				</div>
				
				<div class="col-lg-12">
					{{trans('book_manage_lang.author')}}  {!! Form::label(null,$list->author,['class' =>'control-label']) !!}
				</div>

				<div class="col-lg-12">
					{{trans('book_manage_lang.publish_year')}}  {!! Form::label(null,date(config('path.formatdate'), strtotime($list->publish_year)),['class' =>'control-label']) !!}
				</div>

				<div class="col-lg-12">
					{{trans('book_manage_lang.number_of_page')}}  {!! Form::label(null,$list->number_of_page,['class' =>'control-label']) !!}
				</div>

				<div class="col-lg-12">
					{{trans('book_manage_lang.category')}}  {!! Form::label(null,$list->category_id,['class' =>'control-label']) !!}
				</div>

				<div class="col-lg-12">
					{{trans('book_manage_lang.quantity')}}  {!! Form::label(null,$list->quantity,['class' =>'control-label']) !!}
				</div>
			</div>
		</div>
		<div class="col-lg-6 ">
			<div class="table-responsive">
	            <table id="list_bookitems" class="display text-center">
	                <thead>
	                    <tr>
	                        <th class="text-center">{!!trans('book_manage_lang.no' )!!}</th>
	                        <th class="text-center">{!!trans('book_manage_lang.book_item_id' )!!}</th>
	                        <th class="text-center">{!!trans('book_manage_lang.more' )!!}</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <?php $index=1;?>
                        @foreach($bookitem as $itembook)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $itembook->id .($list->name) }}</td>
                            <td>
                                <a href="#"><button class="btn btn-danger">{!!trans('book_manage_lang.btndelete' )!!}</button></a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>
    </div>
@endsection