@extends('Layouts.MasterLayout')
@section('page_title','Registration')
@section('page_contents')

<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		
		<div class="col-md-12 col-lg-6">
		
			<div class="border p-5 bg-lightblue">
				<div class="row justify-content-between">
					<!-- <div class="col-md-5 mb-2 mb-md-0">
						<h5 class="font-weight-bold secondfont">Welcome!</h5>
						 Login to manage post
					</div> -->
					<div class="col-md-12">
                    <form method="post" action="{{URL::to('user_registration')}}"> 
						<div class="row">
                            <div class="col-md-12 mt-2">
                                 <h3 style="text-align:center;"><i class="fa fa-user"></i> User Registration</h3>
							</div>
							@if ($errors->any())
								
									<ul>
										@foreach ($errors->all() as $error)
											<li style="color:#DC1650">{{ $error }}</li>
										@endforeach
									</ul>
								
							@endif

                            @include('Layouts.notify')
                            @csrf  
							<div class="col-md-12 mt-2">
								<input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required>
							</div>
                            <div class="col-md-12 mt-2">
								<input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required>
							</div>
                            <div class="col-md-12 mt-2">
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="col-md-12 mt-2">
								<button type="submit" class="btn btn-success btn-block">Register</button>

							</div>
                            <div class="col-md-12 mt-2">
								Already have an account? <a href="{{URL::to('login')}}">login here</a>
							</div>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection