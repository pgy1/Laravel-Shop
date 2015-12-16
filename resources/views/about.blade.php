@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">About</div>

				<div class="panel-body">
					If you want see something , <?php echo $name; ?> have to log in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
