<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jearrr | Gravel & Sand</title>
  <!--favicon-->
 <link rel="icon" href="images/logo.png" type="image/x-icon">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
 <style>
  *{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
  }
  .container{
    width: 100%;
    height: 100vh;
    background-image: url(images/gapo.jpg);
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
    background-attachment: fixed;
  }
  .navbar{
    height: 12%;
    display: flex;
    align-items: center;
  }
  .logo{
    cursor: pointer;
  }
  .menu-icon{
    cursor: pointer;
    margin-left: 40px;
  }
  nav{
    flex: 1;
    text-align: right;
  }
  nav ul li{
    list-style: none;
    display: inline-block;
    margin-left: 60px;
  }
  nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 13px;
  }
  .row{
    display: flex;
    height: 88%;
    align-items: center;
  }
  .col{
    flex-basis: 50%;
  }
  h1{
    color: #fff;
    font-size: 70px;
  }
  p{
    color: #fff;
    font-size: 15px;
    line-height: 15px;

  }
  button{
    width: 180px;
    
    
    padding: 10px 0;
    background: green;
    border: 0;
    border-radius: 50px;
    outline: none;
    margin-top: 30px;
    text-decoration: none;
  }
  .card{
    width: 230px;
    height: 230px;
    display: inline-block;
    border-radius: 10px;
    cursor: pointer;
    margin: 10px 15px;
    background-position: center;
    background-size: cover;
    transition: transform 0.5s;
  }
  .card1{
    background-image: url(images/bg.jpg);
  }
  .card2{
    background-image: url(images/gravel_and_sand.jpg);
  }
  .card:hover{
    transform: translateY(-10px);
  }
  h5{
    font-size:20px;
    color: #fff;
    text-shadow: 0 0 5px #999;
  }
  .card p{
    text-shadow: 0 0 15px #000;
    font-size:14px;
  }
  .order{
    text-decoration: none;
    color: white;
    font-size: 14px;
  }
 </style>
</head>
<body>
  <div class="container">
    <div class="navbar">
      <img src="images/logo.png" width="100px" class="logo" alt="">
      <nav>
        <ul>
          <li><a href="">HOME</a></li>
          <li><a href="">CONTACT</a></li>
          <li><a href="">ABOUT</a></li>
        </ul>
      </nav>
      <img src="images/menu.png" width="16px" class="menu-icon" alt="">
    </div>
    <div class="row">
      <div class="col">
      <h1>Gravel & Sand</h1>
      <p>"Providing the foundation for your projects with quality gravel and sand."</p>
      <button type="button"><a href="product.php" class="order">Order</a></button>
      </div>
      <div class="col">
      <div class="card card1">
      <h5>Gravel</h5>
      <p>Building a solid future with our reliable gravel supply.</p>
      </div>
      <div class="card card2">
      <h5>Sand</h5>
      <p>Transforming your landscape with our premium sand products.</p>
      </div>
      </div>
    </div>
  </div>
</body>
</html>