@extends('layouts.admin_master')
@section('content')
<style>
  #mydatatable{
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  #mydatatable thead tr {
    background-color: #FFC316;
    color: black;
    text-align: left;
 
  }
  #mydatatable tbody tr {
    border-bottom: 1px solid #dddddd;
  }

  #mydatatable tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }

  #mydatatable tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }
  .page-item.active .page-link {
    z-index: 3;
    color: black;
    background-color: #FFC316;
    border-color: #FFC316;
  }
</style>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Menu</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Menu</li>
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
          <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="quickForm" action="{{route('menu.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Menu Name</label>
                    <input id="input" type="text" name="name" class="form-control" placeholder="Name" required>
                    <font id="error">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Price" required>
                    <font id="error">{{($errors->has('price'))?($errors->first('price')):''}}</font>
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
                     <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" ></i> Add Menu</a>
                  </div>
              </div>
              <div class="card-body">
                <table id="mydatatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Menu Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{$menu->name}} </td>
                                <td>{{$menu->price}} TK </td>
                                <td width="15%" >
                                    <a class="btn btn-warning btn-sm" href=" {{route('menu.edit',$menu->id)}} "> <i class="fa fa-edit" ></i> </a>
                                    <a id="delete" class="btn btn-danger btn-sm" href="{{route('menu.delete',$menu->id)}}"> <i class="fa fa-trash" ></i> </a>
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
