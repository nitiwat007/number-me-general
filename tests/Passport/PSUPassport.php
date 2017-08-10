 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>PSU Passport Test Function</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <!-- bootstrap4 -->
     <link rel="stylesheet" href="../../bootstrap/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
     <script src="../../js/jquery-3.2.1.min.js"></script>
     <script src="../../bootstrap/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
     <script src="../../js/ie10-viewport-bug-workaround.js"></script>
     <!-- bootstrap4 -->
     <link rel="stylesheet" href="/../../css/signin.css">
   </head>
   <body>
     <div class="container">
       <div class="row">
           <div class="col-1 col-1">
               <img src="../../images/logo4.gif" class="rounded" alt="...">
           </div>
           <div class="col col-6 my-auto">

               <h1>PSU Passport</h1>
               <h6>มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต</h6>
           </div>
       </div>
       <hr>
       <!-- </div> -->
       <div class="row">
           <div style="word-wrap: break-word;" class="col-8">


           </div>
           <div  class="col-4">
               <form class="form-signin" action="PSUPassportEngine.php" method="post">
                   <h5 class="form-signin-heading">PSU Passport Login</h5>
                   <label for="username" class="sr-only">PSU Passport</label>
                   <input type="text" name="username" id="username" class="form-control" placeholder="PSU Passport" required autofocus>
                   <label for="password" class="sr-only">Password</label>
                   <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                   <button class="btn btn-lg btn-primary btn-block" name="Submit" type="submit">Sign in</button>
               </form>
           </div>
         </div>
     </div>
   </body>
 </html>
