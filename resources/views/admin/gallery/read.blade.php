@extends('layouts.app_admin')

@section('content')

<div class="content">
  <div class="container m-0 p-0" data-animation="true" data-animation-type="fadeInUp">
    <div class="row d-flex justify-content-center">

        <div class="col-md-12">
          <a href="{{$moduleName}}/create" class="btn btn-sm btn-success"><i class=" ion-ios-add-circle-outline"></i> Add a {{$moduleName}} </a>
        </div>

    </div>
      <div class="row w-100 d-flex justify-content-center">
          @foreach($contents as $content)
            <div class="col-md-4 text-center">
                <img src="{{asset('storage'.$content->image)}}" class="z-depth-1 rounded img-responsive img-fluid" style="height: 6rem"> <br>
                <form action="/admin/{{$moduleName}}/{{$content->id}}" method="post" >
                  @csrf @method('delete')
                  <button type="submit" class="w-50 text-center btn btn-danger px-2 btn-sm"> Delete <i class=" ml-2 fas fa-trash" aria-hidden="true"></i></button>
                </form>
              
            </div>
          @endforeach

      </div>
  </div>
</div>

      

@endsection
@section('scripts')
  
  $(document).ready(function () {
    $('#kahakidt').DataTable({
        responsive: true,
        "ordering": false
    });
  });

@endsection