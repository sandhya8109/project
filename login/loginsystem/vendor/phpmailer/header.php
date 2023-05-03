
    <nav>
        <ul class='nav-bar'>
            <li class='logo'><a href='#'><img src='./logo.png'/></a></li>
            <input type='checkbox' id='check' />
            <span class="menu">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./article.php">Article</a></li>
                <li><a href="./login/loginsystem/vendor/phpmailer/contact.php">Contact</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="/login/loginsystem/login.php">Login</a></li>
                <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
            </span>
            <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
        </ul>
    </nav>
   
</body>
<style>
    *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  body {
    font-family: "Poppins", sans-serif;
    --color1: #c33764 ;
    --color2: white ;
  }
  .nav-bar {
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    list-style: none;
    position: fixed;
    background-color: var(--color2);
    padding: 0px 20px;
    z-index: 111111;
  }
  .logo img {width: 150px;
  height: 150px;}
  .menu {display: flex;}
  .menu li {padding-left: 30px;}
  .menu li a {
    display: inline-block;
    text-decoration: none;
    color: var(--color1);
    text-align: center;
    transition: 0.15s ease-in-out;
    position: relative;
    text-transform: uppercase;
  }
  .menu li a::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 1px;
    background-color: var(--color1);
    transition: 0.15s ease-in-out;
  }
  .menu li a:hover:after {width: 100%;}
  .open-menu , .close-menu {
    position: absolute;
    color: var(--color1);
    cursor: pointer;
    font-size: 1.5rem;
    display: none;
  }
  .open-menu {
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
  }
  .close-menu {
    top: 20px;
    right: 20px;
  }
  #check {display: none;}
  @media(max-width: 610px){
    .menu {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 80%;
        height: 100vh;
        position: fixed;
        top: 0;
        right: -100%;
        z-index: 100;
        background-color: var(--color2);
        transition: all 0.2s ease-in-out;
    }
    .menu li {margin-top: 40px;}
    .menu li a {padding: 10px;}
    .open-menu , .close-menu {display: block;}
    #check:checked ~ .menu {right: 0;}
  }
  </style>