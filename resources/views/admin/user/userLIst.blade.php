@extends('layouts.admin_master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!--------Modal--------->
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="quickForm" action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group ">
                    <label for="">User Role</label>
                    <select class="form-control" name="role_type" id="">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input id="input" type="text" name="name" class="form-control" placeholder="Name">
                    <font id="error">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <font id="error">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                </div>
                <div class="form-group ">
                    <label for="">Pasword</label>
                    <input type="text" name="password" id="password" class="form-control" placeholder="Pasword">
                    <font id="error">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                </div>
                <div class="form-group ">
                    <label for="">Confirm Password</label>
                    <input type="text" name="password2" class="form-control" placeholder="Confirm Pasword">
                    <font id="error">{{($errors->has('password2'))?($errors->first('password2')):''}}</font>
                </div>
                <div class="form-group col-md-12 pull-left mt-2">
                    <input type="submit" value="submit" class="btn btn-success" >
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!--------Modal--------->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <div style="float: right" class="pull-right">
                     <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" >Add User</a>
                  </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$user->name}} </td>
                                <td>{{$user->email}} </td>
                                <td>{{$user->user_type}} </td>
                                <td width="15%" >
                                    <a class="btn btn-info btn-sm" href=" {{route('user.edit',$user->id)}} "> <i class="fa fa-edit" ></i> </a>

                                    <a class="btn btn-danger btn-sm" href="{{route('user.delete',$user->id)}}"> <i class="fa fa-trash" ></i> </a>
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



@endsection
