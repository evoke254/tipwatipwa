
<div class="container my-4">
    <div class="row d-flex justify-content-center mb-n2">
      <div class="col-md-10 text-center mt-5">
        <h3 class="font-weight-bold my-4">Certified Members</h3>
      </div>
    </div>
  <div class="customer-logos slider row">
    @foreach($clients as $client)
        <div>
            <img class="white client-logo img-responsive rounded z-depth-2 mx-2 " src="{{asset('storage'.$client->image)}}">
        </div>
    @endforeach 
  </div>
</div>

