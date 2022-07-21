@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Admin</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Village Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Create Village Profile</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                   <form action="{{route('profiles.store')}}" method="POST">
                    @csrf
                     <div class="row">
                       <div class="col-6">
                        <div class="col md-6">
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="name" type="text" name="name" class="form-control" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea id="description" type="text" name="description" class="form-control" required ></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="email" type="email" name="email" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Phone Number <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="phone_number" type="text" name="phone_number" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Adddress <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input id="address" type="text" name="address" class="form-control" required >
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">Create</button>
                            </div>
                        </div>
                        </div>
                        </div>
                   </form>
               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </section>

</div>
@endsection
