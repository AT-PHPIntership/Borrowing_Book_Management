@extends('frontend.layouts.master')

@section('title', trans('borrow.borrow_list'))

@section('navbar')
 <!-- Navigation -->
    @include('frontend.layouts.partials._navbar')
@endsection

@section('content')
<div class="row">
    <h1 class="text-center title">{!! trans('borrow.borrow_list') !!}</h1>
    <table class="table table-bordered text-center table-hover table-responsive">
        <thead id="headtable">
            <tr class="success">
                <th class="text-center">{!! trans('borrow.no') !!}</th>
                <th class="text-center">{!! trans('borrow.book_name') !!}</th>
                <th class="text-center">{!! trans('borrow.start_at') !!}</th>
                <th class="text-center">{!! trans('borrow.expiretime') !!}</th>
                <th class="text-center">{!! trans('borrow.status') !!}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listBorrowDetail as $index => $item)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $item->bookItem->book->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->expiretime }}</td>
                <td>
                    @if ($item->status == config('define.incomplete'))
                        {!! trans('borrow.incomplete') !!}
                    @elseif ($item->status == config('define.complete'))
                        <span class="danger">{!! trans('borrow.complete') !!}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection