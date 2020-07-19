@extends('layouts.app_admin')

@section('content')

<div class="content">
  <div class="container m-0 p-0" data-animation="true" data-animation-type="fadeInUp">
    <div class="row d-flex justify-content-center">

        <div class="col-md-12">
          <a href="/admin/{{$moduleName}}/create" class="btn btn-sm btn-success"><i class=" ion-ios-add-circle-outline"></i> Add a User </a>
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
                      <th> Show|Edit </th>
                  </tr>
                </thead>
                <tbody class="table-striped">
                  @foreach($contents as $content)
                    <tr>
                      <td> <img class="img-responsive rounded" src="{{asset('storage'.$content->pic) }}" style="height: 100px" alt="Not Uploaded"> </td>
                      <td width="15%" nowrap="">{{ $content->name }}</td>
                      <td >{{ $content->email }}</td>
                      <td>{{ $content->role }}</td>
                      <td><a href="/admin/users/{{$content->id}}" class="btn btn-sm btn-info rounded-pill my-n1">More..</a></td>
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