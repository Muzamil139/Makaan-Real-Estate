<x-header />
<div class="container my-5">
  <div class="p-5 text-center bg-body-tertiary rounded-3">
    <h1 class="text-body-emphasis">My Property</h1>
    <p class="lead">
      This is a simple Bootstrap jumbotron that sits within a <code>.container</code>, recreated with built-in utility classes.
    </p>
  </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Property</th>
      <th scope="col">Picture</th>
      <th scope="col">Rent</th>
      <th scope="col">Lease</th>
    </tr>
  </thead>
  <tbody>
    @foreach($myproperty as $item)
    <tr>
      <th scope="row">{{$item->name}}</th>
      <td><img src="{{URL::asset('uploads/property/'. $item->property_picture)}}" width="100px" alt=""></td>
      <td>{{$item->rent}}</td>
      <td>{{$item->lease_term}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<x-footer />