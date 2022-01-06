@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">User Management</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <button type="button" class="btn btn-primary btn-md mr-5" data-toggle="modal"
                                data-target=".bd-example-modal-lg">
                                Add User
                            </button>
                            <span class="pr-5"></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Username</th>
                                            <th class="text-primary">Full Name</th>
                                            <th class="text-primary">Company</th>
                                            <th class="text-primary">Role</th>
                                            <th class="text-primary">Email</th>
                                            <th class="text-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)

                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                                                <td>{{ $user->company }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-md mr-5 user-update"
                                                                data-toggle="modal" data-target=".bd-update-modal-lg" 
                                                                data-uid="{{$user->id}}"
                                                                data-fn="{{$user->firstName}}"
                                                                data-ln="{{$user->lastName}}"
                                                                data-com="{{$user->company}}"
                                                                data-role="{{$user->role}}"
                                                                data-ea="{{$user->email}}"
                                                                data-un="{{$user->name}}">
                                                               
                                                                edit 
                                                            </button>
                                                        </div>

                                                        <div>

                                                            <form action="{{ route('user.delete', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn btn-icon icon-left btn-danger mr-3"><i
                                                                        class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
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
            </div>
        </div>
    </section>

    <!-- Large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="firstName" class="form-control phone-number" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="lastName" class="form-control phone-number" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="company" class="form-control phone-number" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-address-card"></i>
                                            </div>
                                            <select class="form-control" name="role">
                                                <option value="No Role"></option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="email" class="form-control phone-number" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="name" class="form-control phone-number" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="password" name="password" class="form-control phone-number"
                                                required>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer text-right">
                                <div class="container d-flex justify-content-center">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                            class="far fa-save"></i> Save</button>
                                    <button type="button" class="btn btn-icon icon-left btn-danger mr-3"
                                        data-dismiss="modal"><i class="fas fa-ban"></i>Close</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Large modal -->
    <div class="modal fade bd-update-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" id="update" >
         
                        @csrf
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="firstName" class="form-control phone-number">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="lastName" class="form-control phone-number">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="company" class="form-control phone-number">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-address-card"></i>
                                            </div>
                                            <select class="form-control" name="role">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="email" class="form-control phone-number">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="name" class="form-control phone-number">

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer text-right">
                                    <div class="container d-flex justify-content-center">
                                        <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                                class="far fa-save"></i> Save</button>
                                        <button type="button" class="btn btn-icon icon-left btn-danger mr-3"
                                            data-dismiss="modal"><i class="fas fa-ban"></i>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $( document ).ready(function() {
            $('.user-update').each(function() {
                $(this).click(function(event) {
                    $('#update').attr("action", "/user/update/" + $(this).data('uid')+"");
                    $('input[name="firstName"]').val($(this).data('fn'));
                    $('input[name="lastName"]').val($(this).data('ln'));
                    $('input[name="company"]').val($(this).data('com'));
                    $('input[name="role"]').val($(this).data('role'));
                    $('input[name="email"]').val($(this).data('ea'));
                    $('input[name="name"]').val($(this).data('un'));
                   
                });
            });
        });
    </script>



    

    





@endsection
