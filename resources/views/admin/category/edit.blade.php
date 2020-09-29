@extends('admin.admin_master')

@section('admin_content')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Starlight</a>
     <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
          <div class="col-md-2"></div>
           <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Category

                </div>

                <div class="card-body">
                    <!---@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif----->
                <form action="{{ route('update.category') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$category->id}}">
                  <div class="form-group">
                    <label for="category">Update Category</label>
                    <input type="text" name="category_name" class="form-control" id="category" value="{{$category->category_name}}">
                  </div>
                  @error('category_name')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>                                    
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
