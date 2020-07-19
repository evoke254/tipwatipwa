@extends('layouts.app_admin')

@section('content')

<div class="content">
  <div class="container m-0 p-0" data-animation="true" data-animation-type="fadeInUp">
    <div class="row d-flex justify-content-center">

        <div class="col-md-12">
          <a href="{{$moduleName}}/create" class="btn btn-sm btn-success"><i class=" ion-ios-add-circle-outline"></i> Create a {{$moduleName}} item</a>
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
                      <th>Edit</th>
                      <th class="text-danger">Delete</th>
                  </tr>
                </thead>
                <tbody class="table-striped">
                  @foreach($contents as $content)
                    <tr>
                      <td>{{$content->page_title}}</td>
                      <td width="75%">{!! substr($content->content, 0, 150) !!}</td>
                      <td> <a href="/admin/{{$moduleName}}/{{$content->id}}/edit" class="btn btn-sm btn-warning">Edit</a></td>
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