<x-header />
<div class="container mt-5 p-4 border col-md-6">
    <h2 class="text-center">Login</h2>
    <form action="{{route('login')}}" method="POST">
      @csrf

      @if(Session::has('error'))
      <div class="alert alert-danger" role="alert">
       {{Session::get('error')}}
      </div>
      @endif

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-outline-primary btn-lg">Login</button>
</div>
</form>
</div>
<x-footer />