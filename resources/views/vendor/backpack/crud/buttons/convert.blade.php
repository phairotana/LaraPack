@if ($crud->hasAccess('convert'))
	<a href="{{ url($crud->route.'/convert') }}" class="btn btn-sm btn-primary" target="_blank" title="Convert to Listing">
		<i class="la la-retweet"></i>
	</a>
@endif