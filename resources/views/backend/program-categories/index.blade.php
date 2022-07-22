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
                            <li class="breadcrumb-item active" aria-current="page">Program Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
			<div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Program Category</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                    <div class="mb-10">
                        <a href="{{ route('program-category.create') }}" class="btn btn-rounded btn-primary">
                            + Create Program Category
                        </a>
                    </div>
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Name</th>
                                   <th>Description</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>

                            @php
                                ($i = 1)
                            @endphp
                            @forelse($program_categories as $item)
                            <tr>
                                <th scope="row">{{$program_categories->firstItem()+$loop->index}}</th>
                                <td class="border px-6 py-4 ">{{ $item->name }}</td>
                                <td class="border px-6 py-4">{{ $item->description }}</td>
                                <td class="border px-6 py- text-center">

                                    <a href="{{ route('program-category.edit', $item->id) }}" style="width: 100px" class="btn btn-rounded btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('program-category.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <br>

                                        <button type="submit" style="width: 100px" class="btn btn-rounded btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="4" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                           </tbody>

                         </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->
               </div>
        </div>
    </section>
</div>


@endsection
