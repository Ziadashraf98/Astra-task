<!DOCTYPE html>
<html lang="en">
  <head>
    @section('title')
    Add Product
    @endsection
    @include('includes.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('includes.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('includes.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session()->has('success'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">x</button>

          {{session()->get('success')}}

          </div>
          @endif
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 style="color: red" class="card-title">Add Product</h4>
              {{-- <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="name">
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">Categories</label>
                  <select name="category_id" class="form-control" id="exampleSelectGender">
                    <option value="{{null}}">select Category</option>
                    @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectGender">SubCategories</label>
                  <select name="subcategory_id" class="form-control" id="exampleSelectGender">
                    <option value="{{null}}">select SubCategory</option>
                    @foreach($subcategories as $subcategory)
                    <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
       </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('includes.scripts')
  </body>
</html>