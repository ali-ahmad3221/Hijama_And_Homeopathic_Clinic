 <!-- Main Sidebar Container -->
 {{-- @php
     $routing_array = ['product.index', 'admin.product.draft', 'admin.product.new', 'admin.product.published', 'admin.product.inactive'];
 @endphp --}}

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{route('admin.dashboard')}}" class="brand-link">
         <img src="{{asset('/images/hijama.JPG')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8; width:35px; height:80px;">
         <span class="brand-text font-weight-light pl-2"><strong>Hijama Center</strong></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
      </div> -->

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <!-- <a href="{{ route('dashboard.view') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{route('admin.dashboard')}}"
                                 class="nav-link {{ Route::current()->getName() === 'admin.dashboard' ? 'active' : '' }}">
                                 <i class="nav-icon fas fa-tachometer-alt"></i>
                                 <p><strong>&nbspDashboard</strong></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('patient.list')}}"
                                 class="nav-link {{ Route::current()->getName() === 'patient.list' ? 'active' : '' }}">
                                 <i class="nav-icon fas fa-user-nurse" aria-hidden="true"></i>
                                 <p><strong>&nbspPatients</strong></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('medicine.list')}}"
                                 class="nav-link {{ Route::current()->getName() === 'medicine.list' ? 'active' : '' }}">
                                 <i class="fas fa-heartbeat"></i>
                                 <p><strong>&nbsp Madicines</strong></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('equipments.list')}}"
                                 class="nav-link {{ Route::current()->getName() === 'equipments.list' ? 'active' : '' }}">
                                 <i class="fas fa-medkit"></i>
                                 <p><strong>&nbsp Hijama Equipments</strong></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('pharmacy.home')}}"
                                 class="nav-link {{ Route::current()->getName() === 'pharmacy.home' ? 'active' : '' }}">
                                 <i class="fas fa-clinic-medical"></i>
                                 <p><strong>&nbsp Pharmacy</strong></p>
                             </a>
                         </li>

                         <li class="nav-item">
                                <a href="{{route('patients.income')}}"
                                    class="nav-link {{ Route::current()->getName() === 'patients.income' ? 'active' : '' }}">
                                    <i class="fas fa-address-book"></i>
                                    <p><strong>&nbsp Income</strong></p>
                                </a>
                         </li>

                         <li class="nav-item">
                                <a href="{{route('transactions.index')}}"
                                    class="nav-link {{ Route::current()->getName() === 'transactions.index' ? 'active' : '' }}">
                                    <i class="fas fa-address-book"></i>
                                    <p><strong>&nbsp Sold Products</strong></p>
                                </a>
                         </li>

                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
