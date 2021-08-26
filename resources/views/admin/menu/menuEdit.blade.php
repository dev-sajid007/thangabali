@extends('layouts.admin_master')
@section('content')
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

  <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  
              </div>
              <div class="card-body col-ms-6">
                <form id="quickForm" action="{{route('menu.update',$menu->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Menu Name</label>
                        <input id="input" type="text" name="name" class="form-control" value=" {{$menu->name}} ">
                        <font id="error">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" value="{{$menu->price}}">
                        <font id="error">{{($errors->has('price'))?($errors->first('price')):''}}</font>
                    </div>
                    
                    <div class="form-group col-md-12 pull-left mt-2">
                        <input type="submit" value="Update" class="btn btn-success" >
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>
@endsection
