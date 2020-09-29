@extends('admin.admin_master')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Manage Product</span>
      </nav>
      <div class="sl-pagebody">
        <div class="row row-sm">
         <div class="col-md-12">
          <div class="card pd-20 pd-sm-20">
           <h5>Product List</h5>
           <!---Massege---->    
           @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('update')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif


          @if(session('delete'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('delete')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(session('inactive'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('inactive')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          @if(session('active'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('active')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

            <div class="table-wrapper">
             <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Product name</th>
                  <th class="wd-15p">Product Quantity</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">created_at</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $row)
                <tr>
                  <td>
                    <img src="{{asset($row->image_one)}}" width="50px" alt="">
                  </td>
                  <td>{{$row->product_name}}</td>
                  <td>{{$row->product_quantity}}</td>
                  <td>{{$row->category->category_name}}</td>
                  <td>
                    @if ($row->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inctive</span>
                    @endif
                  </td>
                  <td>{{$row->created_at->diffForHumans()}}</td>
                  <td>
                    <a href="{{url('admin/products/edit/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="{{url('admin/products/delete/'.$row->id) }}" onclick="return confirm('Are You Shure to Delete ?')"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                    @if ($row->status == 1)
                    <a href="{{url('admin/products/inactive/'.$row->id) }}"  class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                    @else
                    <a href="{{url('admin/products/active/'.$row->id) }}"  class="btn btn-success btn-sm"><i class="fa fa-arrow-up"></i></a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div>
        
      <div class="col-md-4"></div>
    </div>
</div>

@endsection



