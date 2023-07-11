<div>
    <div class="modal fade" id="modal-edit{{$user->id}}" wire:ignore.self>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Pencari Jasa</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="edit">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" wire:model="email">
              @error('email')
              <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Depan</label>
          <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" wire:model="first_name">
          @error('first_name')
          <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Belakang</label>
      <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" wire:model="last_name">
      @error('last_name')
      <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group">
  <label for="exampleInputEmail1">No Hp</label>
  <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" wire:model="no_hp">
  @error('no_hp')
  <div class="invalid-feedback">
    {{$message}}
</div>
@enderror
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model="password" id="exampleInputPassword1">
  @error('password')
  <div class="invalid-feedback">
    {{$message}}
</div>
@enderror
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Negara</label>
  <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" wire:model="country">
  @error('country')
  <div class="invalid-feedback">
    {{$message}}
</div>
@enderror
</div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary" wire:target="edit">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>