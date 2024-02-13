@php
    $mainmenu="Dashboard";
    $submenu="Dashboard";

@endphp
@extends('admin.layout')

@section('container')


      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{count(DB::table('departments')->get())}}</h3>

                  <p>Departments</p>
                </div>
                <div class="icon">
                  <i class="far fa-plus-square"></i>
                </div>
                <a href="{{route('department.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{count(DB::table('roles')->get())}}</h3></h3>

                  <p>Role</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('roles')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{count(DB::table('admins')->where('id', '!=', 1)->get())}}</h3>
                  <p>User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            {{-- <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div> --}}
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>




@endsection


@section('jquery')



@endsection
