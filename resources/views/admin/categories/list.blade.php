
@include('admin.layout.header')

@include('admin.layout.side')


<div id="content-wrapper">
    <div id="content">
                 <div class="container">
                     <div id="header">
                         <h4>List Of Categories</h4>
                     </div>
                     <div id="body">
                         <table class="table" id="table_categories">
                             <thead>
                             <tr>
                                 <th scope="col">Row</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Image</th>
                                 <th scope="col">Actions</th>
                             </tr>
                             </thead>
                             <tbody>

                             @php $i = 1 @endphp
                             @foreach($categories as $category)
                                 <tr>
                                     <th scope="row">{{$i++}}</th>
                                     <td>{{$category->name}}</td>
                                     <td><img src="{{asset('storage/'.$category->image)}}"></td>
                                     <td>
                                         <div class="d-flex justify-content-center">
                                             <a href="{{route('admin.categories.edit' , $category->id)}}" class="btn btn-primary mx-2">Edit</a>
                                             <form action="{{route('admin.categories.destroy' , $category->id)}}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach

                             </tbody>
                         </table>
                     </div>
                 </div>


             </div>
         </div>

    <!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->

@include('admin.layout.footer')
