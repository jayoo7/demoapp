@if (session('status'))
	<div class="alert {{ (session('status_type') === 0) ? 'alert-danger' : 'alert-success' }} alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><span aria-hidden="true">×</span></button>
		<h4><i class="icon fa {{ (session('status_type') === 0) ? 'fa-ban' : 'fa-check' }}"></i>Alert</h4>
		{{ session('status') }}
	</div>
@endif