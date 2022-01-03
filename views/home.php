<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <title>Products</title>
</head>
<body>
    <div class="container my-2">
        <div class="row">
        <?php foreach($products as $product) :?>
            <div class="col-md-4">
                <h3><a href="<?php echo BASEURL.'product/'.$product->id ?>"><?php echo $product->title ?></a></h3>
                <p><?php echo $product->description ?></p>
            
                <a href="<?php echo BASEURL.'product/'.$product->id ?>">
                    <img src="<?php echo $product->image ?>" alt="">
                </a>
                <p>$<?php echo $product->price ?></p>
                <p></p>
            </div>
        <?php endforeach ;?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>