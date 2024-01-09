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
          <input type="text" wire:keydown.enter="login" class="form-control @error('username') is-invalid @enderror" wire:model=username placeholder="Username" name="username">
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
          <input type="password" id="password-input" class="form-control @error('password') is-invalid @enderror" wire:model="password" wire:keydown.enter="login" placeholder="Password" name="password">
          <div class="input-group-append" style="cursor:pointer">
            <div class="input-group-text">
              <span id="password-toggle" class="fas fa-eye"></span>
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
    </div>
  </div>
</div>
@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
    document.getElementById('password-input').addEventListener('keydown', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault();
        Livewire.emit('login');
      }
    });
  });

</script>
@endpush
<script>

  document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password-input');
    const passwordToggle = document.getElementById('password-toggle');
    
    passwordToggle.addEventListener('click', function () {
      console.log(passwordInput.type)
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
      }
    });
  });
</script>
</div>