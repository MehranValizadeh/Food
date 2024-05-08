@include('admin.layout.header')

@include('admin.layout.side')



<div id="content-wrapper">
    <div id="content">
        <div id="header">
            <h4>Store Foods</h4>
        </div>
        <div id="body">
            <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" required name="name">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" required name="file">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <select name="category_id" id="" class="form-control" required>
                            <option value="">Select Category ... </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="price" placeholder="Price" required>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <textarea class="form-control" name="description" placeholder="Type Description ..."></textarea>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layout.footer')
