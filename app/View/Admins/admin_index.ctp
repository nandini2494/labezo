<html>
    <head>
        <title>Labezo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Moleskine Notebook with jQuery Booklet" />
        <meta name="keywords" content="jquery, book, flip, pages, moleskine, booklet, plugin, css3 "/>

        <!--my css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>   
            body {
                background: #091d29;
            }
            .form-control{
                border-radius: 0px;
                margin: 12px 3px;
                height: 40px;
            }
            .logo{
                margin: auto;
                text-align: center;
                padding-top: 20%;
            }
            .logo img{
                height: 70px;
            }
            /*footer*/ 
            .footer a{
                color: #000;
                text-decoration: none;
            }
            .footer{
                color: #000;
                text-align: center;
            }
            /*footer end*/ 


            /*for logintemplate blue*/
            .grayBody{
                background-color: #E9E9E9;
            }
            .loginbox{
                margin-top: 5%;
                border-top: 6px solid #0088D8;
                background-color:#fff;
                padding: 20px;
                box-shadow: 0 10px 10px -2px rgba(0,0,0,0.12),0 -2px 10px -2px rgba(0,0,0,0.12);    
            }
            .singtext{    
                font-size: 28px;  
                color: #0088D8;
                font-weight: 500;
                letter-spacing: 1px;
            }
            .submitButton{
                background-color: #0088D8;
                color: #fff;
                margin-top: 12px;
                margin-bottom: 10px;
                padding: 10px 0px;
                width: 100%;
                margin-left: 2px;
                font-size: 16px;
                border-radius: 0px;
                outline: none;
            }
            .submitButton:hover,.submitButton:focus{
                color: #fff;  
                outline: none;
            }
            .forGotPassword{
                background-color: #F2F2F2; 
                padding: 15px 0px;
                text-align: center;

            }
            .forGotPassword:hover{
                box-shadow: 0 10px 10px -2px rgba(0,0,0,0.12);    
            }
            .forGotPassword a{
                color: #000;
                outline: none;
            }
            .forGotPassword a:hover, .forGotPassword a:active,.forGotPassword a:focus{  
                text-decoration: none; 
                outline: none;
            }
        </style> 

    </head>
    <body>
        <div class="container" >
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="logo">
                    <img src="<?php echo DOMAIN_NAME ?>img/small-logo.png"  alt="Logo"  >
                </div>
                <div class="row loginbox">    
                    <form method="post">
                        <div class="col-lg-12">
                            <span class="singtext" >Sign in </span>   
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <input class="form-control" type="text" name="username" placeholder="Username" > 
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" >
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12">
                            <button type="submit" class="btn submitButton">Login </button> 
                        </div>  
                    </form>    

                </div>

                <br>                
                <br>


            </div>
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
        </div>
    </body>
</html>