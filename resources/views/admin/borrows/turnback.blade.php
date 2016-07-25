@extends('admin.layouts.master')

@section('title', trans('book_manage_lang.title'))

@section('content')
<!-- Page Heading -->
        <button id="addRow" class="btn btn-info">Add</button>
        <button id="deleteRow" class="btn btn-danger">Delete</button>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Enter Book ID</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>     
@endsection