            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> {!! trans('labels.Dashboard') !!}</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-edit"></i> {!! trans('labels.createaccount') !!}</a>
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="{!! URL('/user') !!}"><i class="fa fa-fw fa-table"></i> Manage User</a>
=======
                        <a href="#"><i class="fa fa-fw fa-table"></i> {!! trans('labels.ManageUser') !!}</a>
>>>>>>> 30ab2d291e8354fa850181609c4f8843a76a7b23
                    </li>                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#book"><i class="fa fa-fw fa-arrows-v"></i> {!! trans('labels.ManageBook') !!} <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="book" class="collapse">
                            <li>
                                <a href="#">{!! trans('labels.Category') !!}</a>
                            </li>
                            <li>
                                <a href="#">{!! trans('labels.Book') !!}</a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="#"><i class="fa fa-fw fa-wrench"></i> {!! trans('labels.HistoryBorrow') !!}</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#borrow"><i class="fa fa-fw fa-arrows-v"></i> {!! trans('labels.Borrowing') !!} <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="borrow" class="collapse">
                            <li>
                                <a href="#">{!! trans('labels.Create') !!}</a>
                            </li>
                            <li>
                                <a href="#">{!! trans('labels.Turnback') !!}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>