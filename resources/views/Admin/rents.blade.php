<x-adminheader />


      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Our Property</p>
                  @if(Session::has('success'))
                 <div class="alert alert-success">
                   {{ Session::get('success') }}
                    </div>
                  @endif
                  @if(Session::has('error'))
                  <div class="alert alert-danger">
                  {{ Session::get('error') }}
                  </div>
                    @endif

                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>User ID</th>
                          <th>Property ID</th>
                          <th>Picture</th>
                          <th>Phone</th>
                          <th>Lease-Term</th>
                          <th>Requirements</th>
                          <th>Actions</th>
                        </tr>  
                      </thead>
                      <tbody>

                        @foreach($rent as $item)
                        <tr>
                          <td>{{$item->id}}</td>
                          <td><div class="badge text-bg-warning">{{$item->user_id}}</div></td>
                          <td><div class="badge text-bg-info">{{$item->property_id}}</div></td>
                          <td><img src="{{URL::asset('uploads/customers/' . $item->picture)}}" width="100px" alt=""></td>
                          <td>{{$item->phone}}</td>
                          <td>{{$item->lease_term}}</td>
                          <td>{{$item->requirements}}</td>
                          <td><button class="btn btn-warning btn-small"><a href={{"delete_rents/" . $item->id}} style="color:black">delete</a></button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          

        <!-- content-wrapper ends -->
        
        <x-adminfooter />