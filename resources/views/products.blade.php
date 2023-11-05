<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
            function hint(){
                const ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        // Typical action to be performed when the document is ready:
                        console.log(this.status);
                        // console.log(JSON.parse(this.response));
                    }
                };

                ajax.open("GET", "/api/products", true);
                ajax.setRequestHeader("Accept", 'application/json');
                ajax.send();
            }
    </script>
    <title>product list</title>
</head>
<body>

<form action=""{{route('products.store')}} >
    <label for="name">name :</label> <input type="text" name="name" id="name">
    <label for="description">description :</label> <input type="text" name="description" id="description">
    <label for="price">price :</label> <input type="text" name="price" id="price">
    <label for="status">status :</label> <input type="text" name="status" id="status">
    <label for="score">score :</label> <input type="text" name="score" id="score">

    <input type="submit" value="send">

</form>

<hr>

@foreach($products as $product)
    <p> name : {{$product->name }} </p>
    <p> description : {{$product->description }}</p>
    <p> price :  {{$product->price }}</p>
    <p> status :  {{$product->status }}</p>
    <p> score : {{$product->score }}</p>

    <button id="edit"> edit </button>
  <button id="delete">delete</button>

    <hr>
@endforeach

<script>
    document.querySelector('.nb').onclick =  () => {
        hint(document.getElementById('title').value );
    }
</script>
</body>
</html>
