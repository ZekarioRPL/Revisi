<style>
  .sgnt:hover {
    cursor: pointer;
  }
</style>


<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a class="navbar-col-md-3 col-lg-2 me-0" href="/"><img src="{{ asset('storage/' . $data->image) }}" width="70" class="ms-5" style="margin-top: -10px ; margin-bottom : -10px"></a>
  </button>
  <div class="navbar-nav">
    <div class="nav-item md text-nowrap pe-3 ps-3 pt-1 bg-dark">
      @auth
      <form action="/logout" method="post">
        @csrf
        <label for="signout"class="mt-3 fs-6 sgnt text-light" onclick="return confirm(' Are Yout Sure want to Log Out? ')">Sign Out</label>
        <button type="submit" class="d-none" style="border : 0px;" id="signout">Sign Out</button>
      </form>
      @else
      <a class="nav-link px-3" href="/login">Sign in</a>
      @endauth
    </div>
  </div>
</header>

<script>
</script>