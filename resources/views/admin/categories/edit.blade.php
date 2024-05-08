@include('admin.layout.header')

@include('admin.layout.side')



<div id="content-wrapper">
    <div id="content">
        <div id="header">
            <h4>Edit Category {{$category->name}}</h4>
        </div>
        <div id="body">
            <form action="{{route('admin.categories.update' , $category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" required name="name" value="{{$category->name}}">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" name="file">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <textarea class="form-control" name="description" placeholder="Type Description ...">{{$category->description}}</textarea>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remove_photo">
                            <label class="form-check-label" for="flexCheckDefault">
                                حذف عکس دسته بندی ؟
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layout.footer')
