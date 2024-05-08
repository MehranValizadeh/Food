@include('admin.layout.header')

@include('admin.layout.side')


<div id="content-wrapper">
    <div id="content">
        <div id="header">
            <h4>Edit Food {{$food->name}}</h4>
        </div>
        <div id="body">
            <form action="{{route('admin.foods.update' , $food->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" required name="name"
                               value="{{$food->name}}">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" required name="file">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <select name="category_id" id="" class="form-control" required>
                            <option value="">Select Category ...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $food->category_id ? 'selected' : '' }} >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="price" placeholder="Price" required
                               value="{{$food->price}}">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <textarea class="form-control" name="description"
                                  placeholder="Type Description ...">{{$food->description}}</textarea>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remove_photo">
                            <label class="form-check-label" for="flexCheckDefault">
                                حذف عکس غذا ؟
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layout.footer')
