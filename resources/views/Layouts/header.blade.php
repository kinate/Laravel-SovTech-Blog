<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
<div class="container">
	<a class="navbar-brand" href="{{URL::to('index')}}"><strong>Laravel Blog</strong></a>
	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse" id="navbarColor02" style="">
		<ul class="navbar-nav mr-auto d-flex align-items-center">
			<li class="nav-item">
			<a class="nav-link" href="{{URL::to('index')}}" style="color:#000; !important">Home <span class="sr-only">(current)</span></a>
			</li>
			
			<li class="nav-item">
			<a class="nav-link" href="{{URL::to('post_by_category',['category'=>'Technology'])}}" style="color:#000; !important">Technology</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="{{URL::to('post_by_category',['category'=>'Politics'])}}" style="color:#000; !important">Politics</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="{{URL::to('post_by_category',['category'=>'Health'])}}" style="color:#000; !important">Health</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="{{url('post_list')}}" style="color:#000; !important">All Post</a>
			</li>
			@if(Auth::check())
			<li class="nav-item"></li>
			<li class="nav-item highlight">
			<a class="nav-link" href="{{url('create_post')}}">New Post</a>
			</li>
			@endif
		         	
		</ul>
        <ul class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item">
			@if(Auth::guest())
			<a href="{{URL::to('login')}}">Login</a> | <a href="{{URL::to('registration')}}">Register</a>
			@else
			<b>Welcome</b> {{Auth::user()->name}} | <a href="{{URL::to('logout')}}">Logout</a>
			@endif
			</li>
		</ul>
	</div>
</div>
</nav>