<h3>{{ $subject }}</h3>

<div>
<p>{{trans('front_end.content')}}</p>
<p>{{ $bodyMessage }}</p>
</div>
<hr>
<p><i>{{trans('front_end.sent_by')}}</i> {{ $email }}</p>
<p><i>{{trans('front_end.sender')}}</i> {{ $yourname }}</p>
<p><i>{{trans('front_end.company_send')}}</i> {{ $company }}</p>