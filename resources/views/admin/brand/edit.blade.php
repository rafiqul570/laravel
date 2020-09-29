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
                <div class="card-header">Edit Brand

                </div>

                <div class="card-body">
                    <!---@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif----->
                <form action="{{ route('update.brand') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{$brand->id}}">
                  <div class="form-group">
                    <label for="brand">Update Brand</label>
                    <input type="text" name="brand_name" class="form-control" id="brand" value="{{$brand->brand_name}}">
                  </div>
                  @error('brand_name')
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
