

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    
       
  
    
    <title>Product</title>

</head>
<body>
    <div>
       
        <h1><?php echo $product->title ?> </h1>
        <img src="<?php echo $product->image ?>" alt="">
        <button class="btn btn-primary"  id="checkout-button">Buy Now</button>
      
    </div>


    <script> 
        const stripe = Stripe('pk_test_51IWQUwH8oljXErmdg6L4MhsuB6tDdmumlHFfyNaopty2U27pmRcqMX1c868zn838lGQtU1eYV6bKRSQtMFWf36VT00aNsvnTOE')
        let btn = document.querySelector('#checkout-button');
        btn.addEventListener('click', ()=>{
            fetch('<?php echo BASEURL.'product/'.$product->id.'/checkout' ?>',{
                'method': 'POST',
                'headers': {
                    'Content-Type' : 'application/json'
                },
                body: JSON.stringify({})

            }).then(res => res.json())
            .then(payload => {
                console.log(payload)
                stripe.redirectToCheckout({'sessionId': payload.id})
            })

        });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>