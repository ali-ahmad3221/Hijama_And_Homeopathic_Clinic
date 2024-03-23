@section('title', 'Dashboard')
@extends('admin.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<style>
    @media screen and (min-width: 2560px) {
        .card {
            height: 600px;
            margin-top: 50px;
        }

        .card-body {
            margin-top: 70px;
        }
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div>
        <!-- Small boxes (Stat box) -->
        <div class="row ml-2 mr-2">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$patients}}</h3>
                        <p>All Patients</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('patient.list')}}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $medicines }}<sup style="font-size: 20px"></sup></h3>
                        <p>All Madicines</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('medicine.list')}}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner text-white">
                        <h3>{{$equipments}}</h3>
                        <p>Hijama Equipments</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('equipments.list')}}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>3</h3>
                        <p>Income</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('patients.income')}}" class="small-box-footer">More Details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
