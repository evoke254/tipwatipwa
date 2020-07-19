@extends('layouts.app_admin')

@section('content')

<div class="container-fluid">
    <div class="row d-flex">
    	<div class="col">
    		<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
			      aria-selected="true">WYSIWYG Editor</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="upload-tab" data-toggle="tab" href="#upload" role="tab" aria-controls="upload"
			      aria-selected="false">Photo Upload</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo"
			      aria-selected="false">SEO</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social"
			      aria-selected="false">Facebook & Google Pixels</a>
			  </li>
			</ul>
				<form method="post" action="/admin/{{$page}}/{{$content->id}} " enctype="multipart/form-data">
	   				@method('PATCH') @csrf	
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active mt-3 pt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<textarea class="form-control" id="content" name="content" rows="50" cols="50">
					  		{!!$content->content!!}
					  	</textarea>		

						<button type="submit" class="btn btn-success btn-md text-center">Update</button>
					   </div>
					  <div class="tab-pane fade mt-3 pt-3" id="upload" role="tabpanel" aria-labelledby="upload-tab">
					   	<div class="row d-flex justify-content-center">
					   		<div class="col-md-7">
					   			<img style="max-height: 350px" class="img-responsive img-fluid rounded" src="{{ asset('storage/'.$content->image) }}">
					   		</div>
					   		<div class="col-md">
	                          <div class="custom-file">
	                            <input type="file" class="custom-file-input" id="image"
	                              aria-describedby="inputGroupFileAddon01" name="image">
	                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
	                          </div>
								<button type="submit" class="btn btn-success btn-md text-center">Update</button>
					   		</div>
					   	</div>
					   </div>
					  <div class="tab-pane fade mt-3 pt-3" id="seo" role="tabpanel" aria-labelledby="seo-tab">
						<div class="custom-control custom-checkbox mb-6 pb-6">
						  <input type="checkbox" class="custom-control-input" id="index" name="index" @if($content->index === 1) {{'checked'}} @else {{'unchecked'}} @endif>
						  <label class="custom-control-label" for="index">Index page (Default - No indexing)</label>
						</div>
					  	  <div class="form-group">
						    <label for="title">Page Title</label>
						    <input type="text" class="form-control" id="title" name="title" aria-describedby="Page titke" placeholder="What describes your page best" value="{{$content->page_title}}">
						  </div>
						  <div class="form-group">
						    <label for="description">Description</label>
						    <textarea class="form-control" id="description" name="description" rows="7" cols="7">
						    	{{$content->page_description}}
						    </textarea>
						  </div>
						<button type="submit" class="btn btn-success btn-md text-center">Submit</button>
					  </div>
					  <div class="tab-pane fade mt-3 pt-3" id="social" role="tabpanel" aria-labelledby="social-tab">
						  <div class="row d-flex justify-content-center">
							  <div class="col form-group">
							    <label for="description">Facebook Advertising Pixel</label>
							    <textarea class="form-control" id="description" name="description" rows="7" cols="7">
							    	{{$content->facebook}}
							    </textarea>
							  </div>
							  <div class="col form-group">
							    <label for="description">Google Analytics</label>
							    <textarea class="form-control" id="description" name="description" rows="7" cols="7">
							    	{{$content->google}}
							    </textarea>
							  </div>
							  <div class="col-md-12">				  	
									<button type="submit" class="btn btn-success btn-md text-center">Submit</button>
							  </div>
						  </div>
					  </div>


					  <div class="tab-pane fade mt-3 pt-3" id="social" role="tabpanel" aria-labelledby="social-tab">
						  <div class="row d-flex justify-content-center">
							  <div class="col form-group">
							    <label for="email">Email</label>
							    <imput type="Email" class="form-control" id="email" name="email">
							  </div>
							  <div class="col form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control" id="password" name="password">
							  </div>
							  <div class="col form-group">
							    <label for="host">Server | Host</label>
							    <input type="text" class="form-control" id="host" name="host">
							  </div>
							  <div class="col form-group">
							    <label for="host">Mail Port</label>
							    <input type="number" class="form-control" id="host" name="host" value="465">
							  </div>
							  <div class="col form-group">
							    <label for="host">Encryption</label>
							    <input type="text" class="form-control" id="host" name="host">
							  </div>


							  <div class="col form-group">
							    <label for="description">Google Analytics</label>
							    <textarea class="form-control" id="description" name="description" rows="7" cols="7">
							    	{{$content->google}}
							    </textarea>
							  </div>
							  <div class="col-md-12">				  	
									<button type="submit" class="btn btn-success btn-md text-center">Submit</button>
							  </div>
						  </div>
					  </div>
					</div>
				</form>	
				<!--     CKEDITOR.insertHtml('<p>This is a new paragraph.</p>'); -->
	    	</div>
    </div>
</div>

@endsection

@section('scripts')

    CKEDITOR.replace('content');
@endsection