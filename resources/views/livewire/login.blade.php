<div>
  <div class="login-box">
    <div class="login-logo">
      <a href="/"><b>Admin</b>Holistic Station</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan login</p>
        @if(session('error'))
        <div class="alert alert-warning" role="alert">
         {{session('error')}}
       </div>
       @endif
       <form>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" wire:model=username placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('username')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model=password placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-block" wire:click=login>
              <span>
                <span>
                  Login
                </span>
                <span wire:loading wire:target="login" class="spinner-border text-white  spinner-border-sm" role="status">
                  <span class="sr-only">Loading...</span>
                </span>
              </span>
            </button>
          </div>
        </div>

      </form>
<!-- <p class="mb-1">
    <a href="forgot-password.html">I forgot my password</a>
  </p> -->
</div>
</div>
</div>
</div>
