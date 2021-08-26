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
            <h1>Purchase</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Purchase</li>
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
                     <a href="{{route('purchase.add')}}" class="btn btn-warning btn-sm" > <i class="fa fa-plus" ></i> Add Purchase</a>
                  </div>
              </div>
              <div class="card-body">
                <table id="mydatatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Date</th>
                            <th>Menu Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Buying Price</th>
                            <th width="12%" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $key => $purchase)
                            <tr>
                                <td> {{$key+1}} </td>
                                <td> {{date("d-m-Y", strtotime("$purchase->date"))}} </td>
                                <td> {{$purchase->menu_name}} </td>
                                <td>
                                  {{$purchase->buying_qty}} PCs
                                </td>
                                <td>{{$purchase->unit_price}} Tk </td>
                                <td>{{$purchase->buying_price}} Tk </td>
                                <td width="15%" >
                                    <a id="edit" class="btn btn-warning btn-sm" href="{{route('purchase.edit',$purchase->id)}}"> <i class="fa fa-edit" ></i> </a>
                                    <a id="delete" class="btn btn-outline-danger btn-sm" href="{{route('purchase.delete',$purchase->id)}}"> <i class="fa fa-trash" ></i> </a>
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
@section('script')
    

@endsection