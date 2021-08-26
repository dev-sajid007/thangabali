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
    background-color: #009879;
    color: #ffffff;
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
</style>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Purchase Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Purchase Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!--------Modal--------->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <div class="float-left">
                    @if (count($errors) > 0)
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  </div>
                  <div style="float: right" class="pull-right">
                     <a href="{{route('purchase.add')}}" class="btn btn-primary btn-sm" > <i class="fa fa-plus" ></i> Add Purchase</a>
                  </div>
              </div>
              <div class="card-body col-md-6">
                <form action=" {{route('purchase.update',$purchase->id)}}" method="POST">
                  @csrf
                    <div class="form-group">
                        <label for="">Date</label>
                        <input class="form-control" type="date" name="date" value="{{$purchase->date}}">
                    </div>
                    <div class="form-group">
                        <label for="">Menu Name</label>
                        <input class="form-control" type="text" name="menu_name" value=" {{$purchase->menu_name}} ">
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input class="form-control" type="text" name="buying_qty" value=" {{$purchase->buying_qty}} ">
                    </div>
                    <div class="form-group">
                        <label for="">Unit Price</label>
                        <input class="form-control" type="text" name="unit_price" value=" {{$purchase->unit_price}} ">
                    </div>
                    <div class="form-group">
                        <label for="">Buying Price</label>
                        <input class="form-control" type="text" name="buying_price" value=" {{$purchase->buying_price}} ">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>


@endsection
@section('script')
    

@endsection