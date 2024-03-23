@extends('admin.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
        <div class="col-sm-12" style="margin-left:20%; padding-top:5%">
            <div class="col-sm-6">
                    <!-- Profile Image -->
                    <div class="card card-gray card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center mb-5">
                        <img src="{{asset('/assets/images/smc_logo.png')}}" class="profile-user-img img-fluid img-circle" alt="Girl in a jacket" width="150">
                        <!-- <img class="profile-user-img img-fluid img-circle mb-5"
                            alt="User profile picture" height="100px"> -->
                    </div>

                    <!-- <p class="text-muted text-center">Software Engineer</p> -->

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Name</b> <p class="float-right">Naina</p>
                        </li>
                        <li class="list-group-item">
                        <b>Email</b> <p class="float-right">Admin@smc.com</p>
                        </li>
                        <!-- <li class="list-group-item">
                        <b>Friends</b> <p class="float-right">13,287</p>
                        </li> -->
                    </ul>

                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 @endsection 