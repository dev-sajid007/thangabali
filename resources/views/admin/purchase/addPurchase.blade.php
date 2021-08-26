@extends('layouts.admin_master')
@section('content')
<style>
  #item_list thead tr{
    background-color: #FFC316;
  }
</style>
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
                     <a href=" {{route('purchase.list')}} " class="btn btn-block btn-warning btn-flat btn-sm"> <i class="fa fa-list" ></i> Purchase List</a>
                  </div>
              </div>
              <div class="card-body">
                    @php
                            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                            $getdate = $dt->format('Y-m-d');
                    @endphp
                    <div class="form-group col-md-4 float-left">
                        <label>Date</label>
                        <input style="cursor: pointer" type="date" value="{{$getdate}}" name="date" id="date" class="form-control" placeholder="YYYY-MM-DD">
                    </div>
                    
                    <div class="form-group col-md-4 float-left">
                        <label for="">Select Item</label>
                        <select class="form-control select2" name="menu_id" id="menu_id">
                            <option value="">Select Menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                   

                    <div class="form-group col-md-4 float-left" style="padding-top:35px">
                    
                    <button type="button" id="addbtn" class="btn btn-warning btn-flat btn-sm" aria-label=""><i class="fa fa-plus-circle"></i> Add Item</button>
                    </div>
              </div>

              <div class="card-body">
                <form action="{{route('purchase.store')}}" method="POST">
                  @csrf
                  <table class="table table-bordered" id="item_list">
                    <thead>
                      <tr>
                        <th>Menu Name</th>
                        <th width="7%">Pcs/KG</th>
                        <th width="10%">Unit Price</th>
                        <th width="10%">Total Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">
                       
                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="3"></td>
                        <td>
                          <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount"  style="background:#D8FDBA" readonly>
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  {{-- table --}}
                  <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-plus-circle"></i> Add Purchase</a>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>


@endsection



@section('script')
    <script>
       $('#menu_id').on('change',function (){
            var menu_id = $(this).val();
          
             $("#addbtn").val(menu_id);
 
        });


      $(document).ready(function(){
          var max=10;  
          var x=1;
          $('#addbtn').keydown(function(){
            //add row
            if(x <= max){
            var date         = $('#date').val();
            var menu_id = $(this).val();
            var menu_name    = $('#menu_id').find('option:selected').text();
            var price;
            //ajax
            $.ajax({
                  
                  type:"GET",
                  url: '/purchase/get_price/'+menu_id,

                  success:function(data){
                      //console.log(data);
                      price = data;
                      addToCart(price,menu_name,menu_id,date);

                      
                      
                      }
              });
              x++;
              console.log("x value"+x);
            }
            //add row end
          });

          function addToCart(price,menu_name,menu_id,date){
            console.log(menu_name);
            //append row
            $('#addRow').append('<tr>\n' +
    '<td>\n'+
        '<input class="form-control" type="text" name="menu_name[]" value="'+menu_name+'" readonly>\n'+
        '<input class="form-control" type="hidden" name="date[]" value="'+date+'" readonly>\n'+
    '</td>\n'+
    '<td>\n'+
    '<input class="form-control form-control-sm text-right buying_qty" value="1" min="1" type="number" name="buying_qty[]" id="buyingqty" required>\n' +
    '</td>\n' +
    '\n' +
    '<td>\n' +
    '<input class="form-control form-control-sm text-right unit_price" type="number" name="unit_price[]" id="unit_price" value="'+price+'" readonly required>\n' +
    '</td>\n' +
    '\n' +
    '<td>\n' +
    '<input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly required>\n' +
    '</td>\n' +
    '<td>\n' +
    '<a href="#" class="btn btn-danger btn-sm btn-flat" name="remove" id="remove"><i class="fa fa-trash"></i></a>\n' +
    '</td>\n' +
'</tr>');
          }

          // //key up event
          $(document).on('mouseover click','.buying_qty,.buying_qty',function(){
                  var unit_price = $(this).closest("tr").find("input.unit_price").val();
                  var qty        = $(this).closest("tr").find("input.buying_qty").val();
                  var total      = unit_price * qty ;
                  console.log(total);
                  $(this).closest("tr").find("input.buying_price").val(total);
                  totalAmountPrice();
              });
          // //calculate sum of amount in invoice 
          function totalAmountPrice(){
            var sum = 0;
            $(".buying_price").each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length != 0){
                sum += parseFloat(value);
            }
            });
            //console.log(sum);
            $("#estimated_amount").val(sum);

            }

            //remove row
            $('#addRow').on('click','#remove',function(){
              $(this).closest("tr").remove();
              totalAmountPrice();
              x--;
            });

      });
    </script>


    <!---datepicker---->
    <script>
        $('.datepicker').datepicker({
            uiLibrary:'bootstrap4',
            format:'dd-mm-yyyy'
        });
    </script>
    {{-- script for  Product Price --}}
@endsection