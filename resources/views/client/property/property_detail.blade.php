<x-header />
<!-- Customized Bootstrap Stylesheet -->
<link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('css/owl.carousel.min.css')}}" rel="stylesheet">


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="{{URL::asset('uploads/property/' . $details->picture)}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">{{$details->name}}</h1>
        <p class="lead">{{$details->description}}</p>
        <p class="lead" style="font-weight: bold">Address: {{$details->address}}</p>
        <p class="lead" style="color: red">Rs.{{$details->rent}}</p>

        @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
          {{Session::get('success')}}
          </div>
        @endif 
        @if(Session::has('error'))
          <div class="alert alert-danger" role="alert">
          {{Session::get('error')}}
          </div>
        @endif
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2" data-bs-toggle="modal" data-bs-target="#rentModal">Rent Now</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Rent Modal -->
<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rent Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="{{route('rents')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <input type="hidden" name="property_id" value="{{$details->id}}">
            <label for="exampleInputNumber1" class="form-label">Phone:</label>
            <input type="number" name="phone" class="form-control" id="exampleInputText1" aria-describedby="textHelp" placeholder="Phone Number" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Current Address</label>
            <input type="text" name="current_address" class="form-control" id="exampleInputText1" placeholder="Current Address" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputfile1" class="form-label">ID-Card Picture</label>
            <input type="file" name="file" class="form-control" id="exampleInputfile1">
          </div>
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Desired Lease Term</label>
            <input type="text" name="lease_term" class="form-control" id="exampleInputText1" placeholder="e.g., 6 months, 1 year" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Any Requirements</label>
            <input type="text" name="requirements" class="form-control" id="exampleInputText1" placeholder="Any requirements" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Google Maps Section -->
<div id="map" style="height: 400px; width: 100%;"></div>

<script>
  function initMap() {
    const propertyLocation = { lat: {{$details->latitude}}, lng: {{$details->longitude}} };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: propertyLocation,
    });
    const marker = new google.maps.marker.AdvanceMarkerElement({
      position: propertyLocation,
      map: map,
      title: "Property Location",
    });
  }
</script>

<!-- Load Google Maps API -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuIlk5Y--Ve2WpMReqw2H1c37MrMXbF2U&callback=initMap"
  async
  defer
></script>


<x-footer />

