<!DOCTYPE html>
<html lang="en">
  <head>
    @section('title')
    All Categories
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
          @if(session()->has('success'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">x</button>

          {{session()->get('success')}}

          </div>
          @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="color: red">All Categories</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr align="center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>SubCategories</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 0; ?>
                          @foreach($categories as $category)
                          <?php $i++; ?>
                          <tr align="center">
                            <td>{{$i}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                              <img style="width: 82px; height:82px" src="{{asset('storage/'.$category->image)}}">
                            </td>
                            <td style="color: red">
                              @foreach($category->subcategories as $subcategory)
                          
                              <h5>{{$subcategory->name}}<br><br></h5>
                            
                              @endforeach
                            </td>
                            <td style="padding: 20px;">
                              <a class="btn btn-success" href="{{route('categories.edit' , $category->id)}}">Edit</a>
                            </td>
                            <td style="padding: 20px;">
                              <form action="{{route('categories.destroy' , $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are You Sure To Delete This')" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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