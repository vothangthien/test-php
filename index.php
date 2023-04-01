<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style/include.css"/>

   </head>
<body>

<div class="">
   <header>
       <div>
            <?php
               include 'layouts/header.php'
            ?>
       </div>
   </header>


   <main>

     <div class="content">
           <?php
              $page=isset($_GET['page']) ? $_GET['page'] :'Home';
              switch($page){
               case'profile':
                  include './page/profile.php';
                  break;

               case 'signin':
                    include 'Router/signin.php';
                    break;

              case 'register':
                         include 'Router/register.php';
                         break;
               

                         
                
               case 'Home':
                    include 'page/Home.php';
                    break;


               case 'Cart':
                 include 'page/Cart.php';
                 break;

                 case 'Product':
                  include 'page/Product.php';
                  break;
                     
                     
                 default:
                 include 'layouts/content.php';
                 break;

               }
          
          
          ?>
     </div>
   </main>
  
   <footer>
       <div>
             <?php 
                include 'layouts/footer.php';
             ?>
       </div>
   </footer>
</div>
 
     
</body>
</html>