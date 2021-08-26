@extends('layouts.admin_master')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!--Chart-->
         <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div id="chart" class="card-body">
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!--Chart-->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                @php
                    $menu = App\Models\Menu::all();
                    $count_menu=count($menu);

                @endphp
                <h3>{{$count_menu}}</h3>
                <p>Total Menu</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner" >
                @php
                    use Carbon\Carbon;
                    $from = Carbon::now()->startOfMonth();
                    $to   = Carbon::now()->endOfMonth();
                    $monthlySell = App\Models\Purchase::whereBetween('date', [$from, $to])->sum('buying_price');
                 
                @endphp
                <h3 id="monthlysale" style="opacity:0">{{number_format($monthlySell)}}Tk</h3>
                <p>Monthly Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                @php
                    $price = App\Models\Purchase::sum('buying_price');
                @endphp
                <h3 id="totalsell" style="opacity:0">{{number_format($price)}}Tk</h3>

                <p>Total Sell Price</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                @php
                  $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                  $getdate = $dt->format('Y-m-d');
                  $today_price = App\Models\Purchase::where('date',$getdate)->sum('buying_price');
                @endphp
                <h3 id="todaysell" style="opacity:0">{{number_format($today_price)}}Tk</h3>
                <p>Today Sell</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
        </div>

        @php
 
  
            $saturday = date("Y-m-d", strtotime('saturday last week'));
            $sunday = date("Y-m-d", strtotime('sunday last week'));
            $monday = date("Y-m-d", strtotime('monday this week'));
            $tuesday = date("Y-m-d", strtotime('tuesday this week'));
            $wednesday = date("Y-m-d", strtotime('wednesday this week'));
            $thursday = date("Y-m-d", strtotime('thursday this week'));
            $friday = date("Y-m-d", strtotime('friday this week'));
    
            
    
            $applicantSat = App\Models\Purchase::where('date',$saturday)->sum('buying_price');
            $applicantSun = App\Models\Purchase::where('date',$sunday)->sum('buying_price');
            $applicantMun = App\Models\Purchase::where('date',$monday)->sum('buying_price');
            $applicantTue = App\Models\Purchase::where('date',$tuesday)->sum('buying_price');
            $applicantWed = App\Models\Purchase::where('date',$wednesday)->sum('buying_price');
            $applicantThu = App\Models\Purchase::where('date',$thursday)->sum('buying_price');
            $applicantFri = App\Models\Purchase::where('date',$friday)->sum('buying_price');

          
            
       @endphp
    </section>
    <!-- /.content -->

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  $(document).ready(function(){
   
   $('#monthlysale').mouseover(function(){
     
        $(this).css("opacity", "1");

   });
   $('#monthlysale').mouseout(function(){
     
        $(this).css("opacity", "0");

   });

   $('#todaysell').mouseover(function(){
     
     $(this).css("opacity", "1");

    });
   $('#todaysell').mouseout(function(){
     
     $(this).css("opacity", "0");

    });


   $('#totalsell').mouseover(function(){
     
     $(this).css("opacity", "1");

    });
   $('#totalsell').mouseout(function(){
     
     $(this).css("opacity", "0");

    });
      
     
  });
</script>
<script>



  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thusday','Friday'],

          datasets: [{
              label: 'Weekly Sales',
              data: [{{$applicantSat}}, {{$applicantSun}},{{$applicantMun}},{{$applicantTue}},{{$applicantWed}},{{$applicantThu}},{{$applicantFri}}],
              
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(75, 192, 192, 0.2)',

              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 206, 86, 1)',

              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
</script>
@endsection
