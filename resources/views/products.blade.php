<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script type="text/javascript" src="js/ajax.js"></script>

    <title>product list</title>
</head>
<body style="background-color: #f0faf9">
<div class="container">
    <div class="row p-3 mt-3">
    <form action="{{route('products.store')}}" >

        <div class="form-group">
                <label  for="name">Name :</label> <input class="form-control" type="text" name="name" id="name">
        </div>

        <div class="form-group">
                <label for="description">Description :</label> <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="form-group">
                <label for="price">Price :</label> <input type="text" name="price" id="price" class="form-control">
        </div>

        <div class="form-group">
                <label for="status">Status :</label> <input type="text" name="status" id="status" class="form-control">
        </div>

        <div class="form-group">
                <label for="category">Category :</label> <input type="text" name="category" id="category" class="form-control">
        </div>

        <div class="form-group">
            <label for="file">Image </label><input type="file" multiple id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">image title :</label> <input type="text" name="tile" id="title" class="form-control">
        </div>

            <br>
        <a class="fa fa-user btn btn-primary" id="send">Send</a>
    </form>
    </div>
</div>

<script>
    document.querySelector('#send').onclick =  () => {
        console.log(5)
            let url = 'localhost:8000/api/products'
            let data = {
                'name' : document.getElementById('name').value ,
                'description' : document.getElementById('description').value ,
                'price' : document.getElementById('price').value ,
                'status' : document.getElementById('status').value ,
                'category' : document.getElementById('category').value ,
            }

            Store(url, 'POST', data );
    }
</script>

<hr>
<div class="p-5">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Category_id</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name }}</td>
                <td>{{$product->description }}</td>
                <td>{{$product->price }}</td>
                <td><input type="checkbox" class="checkbox p-3" id="S{{$product->id}}" {{$product->status == 1 ? 'checked' : ' ' }} ></td>
                <td>{{$product->category_id }}</td>
                <td>
                    <a class="edit fa fa-user btn btn-primary" id="edit{{$product->id}}">Edit</a>
                    <a class="delete fa fa-close btn btn-danger" id="{{$product->id}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{--update method--}}



{{--    delete method --}}

    <script>
        document.querySelectorAll('.edit').forEach((e) => {
            e.onclick = () => {
                console.log('clocked');
            }
        })
    </script>


</div>

</body>
</html>
