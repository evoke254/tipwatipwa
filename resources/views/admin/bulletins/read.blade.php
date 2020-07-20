@extends('layouts.app_admin')

@section('content')

<div class="content">
  <div class="container m-0 p-0" data-animation="true" data-animation-type="fadeInUp">
    <div class="row d-flex justify-content-center">

        <div class="col-md-12">
          <a href="{{$moduleName}}/create" class="btn btn-sm btn-success"><i class=" ion-ios-add-circle-outline"></i> Add a {{$moduleName}} </a>
        </div>

    </div>
      <div class="row w-100">
          <div class="col-sm-6 col-md-12 col-lg-12">
            <div class="table-responsive">
              <table id="kahakidt" class="table table-striped table-hover">
                <thead>
                  <tr> 
                      @foreach($fields as $field)
                        <th class="text-nowrap" scope="col">{{$field}}</th>
                      @endforeach
                      <th class="text-danger">Delete</th>
                  </tr>
                </thead>
                <tbody class="table-striped">
                  @foreach($contents as $content)
                    <tr>
                      <td width="85%">{{ $content->title }}</td>
                      <td>
                        <form action="/admin/{{$moduleName}}/{{$content->id}}" method="post" >
                          @csrf @method('delete')
                          <button type="submit" class="btn btn-danger px-2 btn-sm"><i class="fas fa-trash" aria-hidden="true"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
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