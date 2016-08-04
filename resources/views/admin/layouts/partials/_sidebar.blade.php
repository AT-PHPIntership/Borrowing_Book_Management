            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="{{ Request::is('admin') ? "active" : "" }}">
                        <a href="{!! route('home.admin') !!}"><i class="fa fa-fw fa-dashboard"></i> {!! trans('labels.dashboard') !!}</a>
                    </li>
                    <li class="{{ Request::is('admin/user/create') ? "active" : "" }}">
                        <a href="{!! route('admin.user.create') !!}"><i class="fa fa-fw fa-edit"></i> {!! trans('labels.create_account') !!}</a>
                    </li>
                    <li class="{{ Request::is('admin/user') ? "active" : "" }}">
                        <a href="{!! route('admin.user.index') !!}"><i class="fa fa-fw fa-table"></i> {!! trans('labels.manage_user') !!}</a>
                    </li>                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#book"><i class="fa fa-fw fa-arrows-v"></i> {!! trans('labels.manage_book') !!} <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="book" class="collapse">
                            <li >
                                <a href="{!! route('admin.category.index') !!}">{!! trans('labels.category') !!}</a>
                            </li>
                            <li >
                                <a href="{!! route('admin.book.index') !!}">{!! trans('labels.book') !!}</a>
                            </li>
                        </ul>
                    </li> 
                    <li class="{{ Request::is('admin/borrow') ? "active" : "" }}">
                        <a href="{!! route('admin.borrow.index') !!}"><i class="fa fa-file-text-o"></i> {!! trans('labels.history_borrow') !!}</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#borrow"><i class="fa fa-fw fa-arrows-v"></i> {!! trans('labels.borrowing') !!} <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="borrow" class="collapse">
                            <li >
                                <a href="{!!route('admin.addborrow.index')!!}">{!! trans('labels.create') !!}</a>
                            </li>
                            <li >
                                <a href="{!! route('admin.borrowdetail.index') !!}">{!! trans('labels.turn_back') !!}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
