<!-- Footer -->
<footer>
    <div class="bar">
        <div class="bar-wrap">
            <ul class="links"> <!-- footer menu -->
                <li>
                    <a href="{!! route('/') !!}" title="{!! trans('labels.title_home') !!}">{!! trans('labels.title_home') !!}</a>
                </li>
                @if(Auth::check())
                <li>
                    <a href="{!! route('borrow.index') !!}" title="{!! trans('user.borrow_list') !!}" >{!! trans('user.borrow_list') !!}</a>
                </li>
                <li>
                    <a href="#" title="{!! trans('user.profile') !!}">{!! trans('user.profile') !!}</a>
                </li>
                @endif
                <li>
                    <a href="#" title="{!! trans('labels.contact') !!}">{!! trans('labels.contact') !!}</a>
                </li>
            </ul>

            <div class="social">
                <a href=""><img src="{{ url('frontend/images/face.jpg') }}" width="20px" height="20px"></a>
                <a href=""><img src="{{ url('frontend/images/gg.jpg') }}" width="20px" height="20px"></a>
            </div>
            <div class="copyright" align="right">{!! trans('labels.footer') !!}</div>
        </div>
    </div>
</footer>