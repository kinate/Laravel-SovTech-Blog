@extends('Layouts.MasterLayout')
@section('page_title','Home')
@section('page_contents')

<!-------Page HEADER------------>
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pt-0 pb-0 bg-lightblue position-relative">
		<div class="pl-4 pr-0 h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pb-6 align-self-center">
					<h1 class="secondfont mb-3 font-weight-bold">Welcome to our blog, The home of all latest news</h1>
					<p class="mb-3">
						Say one step ahead, Stay up-to-date. All news at your finger tips.
					</p>
					<a href="{{url('post_list')}}" class="btn btn-dark">Read More</a>
				</div>
				<div class="col-md-6 d-none d-md-block pr-0" style="background-size:cover;background-image:url(./assets/img/home_slide.jpg);">	</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Header -->
    
    
<!----------MAIN---------->
<div class="container">
	<div class="row justify-content-between">
		<div class="col-md-8">
			<h5 class="font-weight-bold spanborder"><span>Top Stories</span></h5>
            @foreach($posts as $post)
			<div class="mb-3 d-flex justify-content-between">
				<div class="pr-3">
					<h2 class="mb-1 h4 font-weight-bold">
					<a class="text-dark" href="{{URL::to('post_details',['encrypted_id'=>\base64_encode($post->id)])}}">{{$post->title}}</a>
					</h2>
					<div class="card-text text-muted small">
                    {{$post->category}} | Posted by {{$post->user->name}}
					</div>
					<small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
				</div>
				<img height="120" src="{{asset('storage/img/posts/'.$post->image)}}">
			</div>
            @endforeach

		</div>

		<div class="col-md-4 pl-4">
            <h5 class="font-weight-bold spanborder"><span>Popular Authors</span></h5>
			<ol class="list-featured">
				@foreach($authors as $author)
				<li>
					<span>
						<h6 class="font-weight-bold">
						Posts and articles by <a href="{{URL::to('post_by_author',['id'=>\base64_encode($author->id),'author'=>\base64_encode($author->name)])}}">{{$author->name}}</a>
						</h6>
						<p class="text-muted">
							Post and articles count: <b>{{$author->posts->count()}}</b>
						</p>
					</span>
				</li>
				@endforeach

			</ol>
		</div>
	</div>
</div>

@endsection

