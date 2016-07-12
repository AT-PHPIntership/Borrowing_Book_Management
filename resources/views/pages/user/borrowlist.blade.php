@extends('mainuser')

@section('title', 'Borrow List')

@section('navbar')
  @include('partials.user._navuser')
@endsection

@section('content')
<div class="row">
            <h1 class="text-center">BORROW LIST</h1>
            <table class="table table-bordered text-center table-hover table-responsive">
                <thead id="headtable">
                    <tr class="success">
                        <th class="text-center">STT</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Start at</th>
                        <th class="text-center">Expire at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ly</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>3</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>4</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>5</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>6</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>7</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr>         
                    <tr>
                        <td>8</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>9</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr> 
                    <tr>
                        <td>10</td>
                        <td>Toan</td>
                        <td>28/1/2016</td>
                        <td>3/2/2016</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <nav>
  					<ul class="pager">
    					<li><a href="#">Previous</a></li>
    					<li><a href="#">Next</a></li>
  					</ul>
					</nav>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
@endsection