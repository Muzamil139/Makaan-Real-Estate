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
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Add Property</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                     <div class="modal-body">

                     <form action="{{route('addProperty')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                      <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Title</label>
                        <input type="text" name="name" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Property Title" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Picture
                        </label>
                        <input type="file" name="file" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Property description" required>
                      </div>
                      <div class="mb-3">
                      <label for="exampleInputText1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Property address" required>
                      </div>
                      <div class="mb-3">
                      <label for="exampleInputText1" class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Houses or Shops" required>
                      </div>
                      <div class="mb-3">
                      <label for="exampleInputText1" class="form-label">Rent</label>
                        <input type="number" name="rent" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Property Rent" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Add New</button>
                    </form>

                      </div>
                    </div>
                  </div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Picture</th>
                          <th>Address</th>
                          <th>Category</th>
                          <th>Rent</th>
                          <th>Actions</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @php 
                          $i = 0;
                        @endphp

                        @foreach($property as $item)
                        @php 
                          $i++;
                        @endphp

                        <tr>
                          <td>{{$item->name}}</td>
                          <td><img src="{{URL::asset('uploads/property/'. $item->property_picture)}}" alt=""></td>
                          <td>{{$item->address}}</td>
                          <td class="font-weight-bold">{{$item->category}}</td>
                          <td class="font-weight-medium"><div class="badge badge-success">{{$item->rent}}</div></td>
                          <td>
                            <button class="btn btn-warning btn-small"><a href={{"delete_property/" . $item->id}} style="color:black">delete</a></button>
                            <button class="btn btn-info btn-small" data-toggle="modal" data-target="#updateModal{{$i}}">update</button>
                            <!-- The Modal -->
                            <div class="modal" id="updateModal{{$i}}">
                            <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Update Property</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                           <!-- Modal body -->
                           <div class="modal-body">
                           <form action="{{route('UpdateProperty')}}" method="POST" enctype="multipart/form-data" >
                           @csrf

      <input type="hidden" name="id" value="{{$item->id}}">
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Name</label>
    <input type="text" name="name" value="{{$item->name}}" class="form-control" id="exampleInputText1">
  </div>
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Picture</label>
    <input type="file" name="file"  class="form-control" id="exampleInputText1">
  </div>
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Description</label>
    <input type="text" name="description" value="{{$item->description}}" class="form-control" id="exampleInputText1">
  </div>
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Address</label>
    <input type="text" name="address" value="{{$item->address}}" class="form-control" id="exampleInputText1">
  </div>
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Rent</label>
    <input type="text" name="rent" value="{{$item->rent}}" class="form-control" id="exampleInputText1">
  </div>
  <div class="mb-3">
    <label for="exampleInputText1" class="form-label">Category</label>
    <input type="text" name="category" value="{{$item->category}}" class="form-control" id="exampleInputText1">
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
    </div>
  </div>
</div>
                          </td>
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