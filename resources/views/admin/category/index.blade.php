@extends('admin.admin_master')
@section('category') active @endsection
@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
      <div class="sl-pagebody">
        <div class="row row-sm">
         <div class="col-md-8">
          <div class="card pd-20 pd-sm-20">
           <h5>All Category</h5>
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
                  <th class="wd-15p">Sl NO</th>
                  <th class="wd-15p">Category name</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Created-at</th>
                  <th class="wd-15p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $row)
                <tr>
                  <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                  <td>{{$row->category_name}}</td>
                  <td>
                    @if ($row->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inctive</span>
                    @endif
                  </td>
                  <td>{{$row->created_at->diffForHumans()}}</td>
                  <td>
                    <a href="{{url('admin/categories/edit/'.$row->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{url('admin/categories/delete/'.$row->id) }}" onclick="return confirm('Are You Shure to Delete ?')"  class="btn btn-danger btn-sm">Delete</a>

                    @if ($row->status == 1)
                    <a href="{{url('admin/categories/inactive/'.$row->id) }}"  class="btn btn-danger btn-sm">Inactive</a>
                    @else
                    <a href="{{url('admin/categories/active/'.$row->id) }}"  class="btn btn-success btn-sm">Active</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{$categories->links()}} 
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div>
         <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Category

                </div>

                <div class="card-body">
                    <!---@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif----->
                <form action="{{route('store.category')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="addCategory">Add Category</label>
                    <input type="text" name="category_name" class="form-control" id="addCategory" placeholder="Enter Category">
                  </div>
                  @error('category_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <button type="submit" class="btn btn-primary">Add</button>
                </form>
                                                        
                </div>
            </div>
        </div>
      <div class="col-md-4"></div>
    </div>
</div>

@endsection



