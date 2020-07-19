
@foreach($content as $page_content)
	@if($page_content->options == 'General')
	<section class="animation wow fadeIn my-5">		
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 mb-5">
			</div>
		</div>
		<div class="row d-flex justify-content-center rounded mb-5" style=" height: 35vh; background-image: url({{ asset('storage'.$page_content->image) }}); background-repeat: repeat-x; background-size: contain; background-position: top;">			
		</div>	
	</section>
	@endif	
@endforeach


	<section class="animation wow fadeIn my-5">		
		<div class="row d-flex justify-content-center">
			@foreach($content as $page_content)
				@if($page_content->options == 'History')
					<div class="col-md-8">
					{!!$page_content->content!!}
					</div>
				@elseif ($page_content->options != 'General' && $page_content->options != 'History')
					<div class="col-md-3 mb-5">
						<div class="card">
		                  <div class="card-header">
		                    <h5 class="font-weight-bold text-center"> {{$page_content->options}} </h5>
		                    <!-- Remember me -->
		                  </div>
		                  <div class="card-body">
		                  		{!!$page_content->content!!}
		                  </div>
		                </div>
							
					</div>pfr
				@endif	
			@endforeach
		</div>
	</section>