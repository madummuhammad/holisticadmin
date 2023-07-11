  <div>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>User</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Daftar pencari jasa</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 col-12">
                      <a data-target="#modal-add" data-toggle="modal" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-sm-6 col-12">
                      <input type="text" name="keyword"  wire:model.debounce.500ms="keyword" placeholder="Cara Nama / Id User" class="form-control">
                    </div>
                  </div>
                  @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Negara</th>
                        <th>No Hp</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                        <td>{{$user->email}}
                        </td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->no_hp}}</td>
                        <td>{{$user->password_text}}</td>
                        <td>
                          <div class="btn-group btn-group-sm">
                            <a href="#modal-edit{{$user->id}}" class="btn btn-info" data-toggle="modal"><i class="far fa-edit"></i></a>
                            <a  class="btn btn-danger"  data-toggle="modal" data-target="#modal-sm{{$user->id}}"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>

                      
                        <!-- <livewire:user.edit-user :user="$user" :key="$user->id"> -->
                      <!-- </div> -->

                      <!-- Delete -->
                      <div class="modal fade" id="modal-sm{{$user->id}}" wire:ignore.self>
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Konfirmasi hapus</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Anda akan menghapus {{$user->first_name}} {{$user->last_name}}?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="button" class="btn btn-danger" wire:click="delete('{{$user->id}}')">Hapus</button>

                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Negara</th>
                        <th>No Hp</th>
                        <th>Password</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="d-flex justify-content-end">
                    <div class="pagination mt-2">
                      {{ $users->links('livewire.pagination-links') }}
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <div class="modal fade" id="modal-add"  wire:ignore.self>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Pencari Jasa</h3>
            </div>
            <form wire:submit.prevent="add">
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
                <button type="submit" class="btn btn-primary" wire:target="add">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    document.addEventListener('livewire:load', function () {
      Livewire.on('closeModal', function () {
        $('.modal').modal('hide');
        $(".modal-backdrop").remove();
        // $('#modal-add').modal('hide');
      });
    });
  </script>
</div>