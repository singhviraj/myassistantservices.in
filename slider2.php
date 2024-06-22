
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>   

  <style>
   body{
    overflow-x:hidden;
    margin:0!important;
   }

   .zoom {
    transition: width 2s;
}

.zoom:hover {
  width: 300px;
}

    .container{
        width:300%;
        height:100%;
        object-fit:contain;
       /* border:1px solid black;*/
       z-index:-1;
    }
    .wrapper{
        width:100%;
        height:100%;
        /*border:5px solid blue;*/
        display:flex;
        background-color: #92a8d1;
        animation: slide 30s infinite;
    }
    
.wrapperone{
    position:relative;
    top:80px;
    animation: slide-one 30s infinite;
}
.wrappertwo{
    
    position:relative;
    top:80px;
    animation: slide-two 30s infinite;
}
.wrapperthree{
    
    position:relative;
    top:80px;
    animation: slide-three 30s infinite;
}
    .div1{
        width:33%;
        height:100%;
       /* border:5px solid yellow;*/
        display:flex;
        position:relative;
    }
    .div2{
        width:33%;
        height:100%;
        /*border:5px solid green;*/
        display:flex;
        position:relative;
    }
    .div3{
        width:33%;
        height:100%;
       /* border:5px solid red;*/
        display:flex;
        position:relative;
    }
    
    img{
        width:45%;
        height:55%;
        position:relative;
        right:-30%;
        top:30%;
        
    }

    @keyframes slide{
    0%{
        transform: translateX(0);
    }
    33%{
        transform: translateX(0);
    }
    34%{
        transform: translateX(-33%);
    }
    64%{
        transform: translateX(-33%);
    }
    66%{
        transform: translateX(-66%);
    }
    98%{
        transform: translateX(-66%);
    }
    99%{
        transform: translateX(0);
    }
   
}


@keyframes slide-one{
    0%{
        transform: translateX(-50%);
    }
    
    10%{
        transform: translateX(0);
    }

   100%{
    transform: translateX(0);
   }
   
}


@keyframes slide-two{
    
    
    0%{
        transform: translateX(-1500%);
    }
    33.33%{
        transform: translateX(-1500%);
    }
    50%{
        transform: translateX(0);
    }
   
   
}


@keyframes slide-three{
    0%{
        transform: translateX(-3500%);
    }
    
    66.33%{
        transform: translateX(-3500%);
    }

   78%{
    transform: translateX(0);
   }
   
}

 .grid-container {
  margin-top:10%;  
  display: grid;
  grid-template-columns: 30% 30% 30%;
  grid-template-rows: 160px;
  /*border:1px solid black;*/
  justify-content: space-evenly;
}

.grid-container > div {
  
  /* border:1px solid red;*/
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
   background-image: url("rev/assets/3.3.jpg");
}

.contain{
    display: grid;
    align-content: space-evenly;
    width:100%;
    height:100%;
    background-color: #92a8d1;
     margin-top:10%;
}

.center{
    /*border:1px solid black;*/
    width:50%;
    margin:auto;
        
}

.grid-container2 {
 
  display: grid;
  
  align-content: space-evenly;
  grid-template-columns: 33.33% 33.33% 33.33%;
  grid-template-rows: auto auto auto;
  
 /* border:1px solid black;*/
  justify-content: space-evenly;
}

   .grid-container2 > div {
  
   /*border:1px solid red;*/
  text-align: center;
    font-size: 25px;
  margin:auto;
  
  }






.navbar {
display:flex;
background-color: #92a8d1;


}

.navbar a {
 
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  color: black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}


.topnavigation{
  display:grid;
  width:100%;
  gap: 10px;
  grid-template-columns: 15% 40% 15% 15% 15%;
  margin-left:-5%;
  margin-bottom:30px;

}
.topnavigation > img{
  width:100%;
  
 height:60px;
}

.footer-container{
  width:100%;
  height:70%;
  position:relative;
}
.footer{
  width:100%;
  height:100%;
  background-color:black;
  display:flex;
  

}

.flex-container{
  display: flex;
  flex-direction: column;
  color:white;
  padding-top:5%;
  padding-left:15%;

  }

  

.flex-container > p{
  font-size:10px;
  
  }



  .products-grid{
display:flex;
gap:4%;
padding:4%;

  
  }

  .products-flex{
    display:flex;
    flex-direction: column;
    width:30%;
    position:relative;
    
  }
  .products-flex:hover {
    transform: scale(1.1); 

}

  .products-flex > img{
    width:100%;
    position:relative;
    left:5px;
    
  }

  .products-position{
    position:relative;
    top:25%;
    margin:auto;
  }

.content{
display:flex;
width:100%;
height:100%;
/*border:1px solid black;*/
  }
  .content-image{
  /*  border:1px solid red;*/
    width:100%;
  }
  .content-image >img {
    object-fit:fill;
    
  }
  .content-paragraph{
    width:100%;
    margin:auto;
  }
</style>


<div class="topnavigation">
  <img src="rev/assets/1.1.jpg">
  <p></p>
  <img src="rev/assets/1.1.jpg">
  <img src="rev/assets/1.1.jpg">
  <img src="rev/assets/1.1.jpg">
</div>


<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">Page</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
</div>

<div class="container">

<div class="wrapper">

<div class="div1">

    <div class="wrapperone">
        <h1>hey you </h1>
         
</div>
<img src="rev/assets/1.1.jpg"  >
</div>

<div class="div2">
<div class="wrappertwo">
    <h1>and  you</h1> 
</div>
<img src="rev/assets/2.jpg" >
</div>

<div class="div3">
<div class="wrapperthree">
    <h1>and you too</h1> 
</div>
<img src="rev/assets/3.3.jpg" >
</div>

</div>
</div>



<div class="grid-container">
  <div>This is 1st product</div>
  <div>2</div>
  <div>3</div>  
  </div>

  <div class="content"  >
<div class="content-image" ><img src="rev/assets/2.jpg"></div>
<div class="content-paragraph"><h3>Find rich, high-quality printable, projectable, and electronic books that help students improve their comprehension and fluency. Filter the resources to find engaging texts that students can access at any time to get the practice they need to become better, more confident readers.</h3>
</div>
</div>

<div class="content" >
<div class="content-paragraph" ><h3>Find rich, high-quality printable, projectable, and electronic books that help students improve their comprehension and fluency. Filter the resources to find engaging texts that students can access at any time to get the practice they need to become better, more confident readers.</h3></div>
<div class="content-image"><img src="rev/assets/2.jpg"> </div>

</div>
<!---->
  
<div class="products-grid" >
  <div class="products-flex" >
     <img src="rev/assets/2.jpg" > 
   <div class="products-position">
     <p>Template Name</p>
    <p>Price</p>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
     <p>Template Name</p>
    <p>Price</p>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
      <p>Template Name </p>
    <p>Price</p>
  </div>
</div>


</div>


<div class="products-grid">
  <div class="products-flex">
     <img src="rev/assets/2.jpg"> 
   <div class="products-position">
     <p>Template Name <br> Template Name </p>
    <p>Price</p>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
     <p>Template Name <br> Template Name </p>
    <p>Price</p>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
      <p>Template Name <br>Template Name </p> 
    <p>Price</p>
  </div>
</div>


</div>


<!--
<div Class="contain">
<div class="center">
   <h2 class="center"> Why Adnia Solutions?</h2>
    <h2>
Save time, improve your business processes, and impress your audience using our premium Excel templates</h2>
</div>
<div class="grid-container2">
  
  <img src="rev/assets/2.jpg" >
  <img src="rev/assets/2.jpg" >
  <img src="rev/assets/2.jpg" > 
  <div>Easy-to-use</div>
  <div>Easy-to-use</div>
  <div>Easy-to-use</div> 
  <div>Just enter your data & the template takes care of the detail</div>
  <div>Just enter your data & the template takes care of the detail</div>
  <div>Just enter your data & the template takes care of the details</div> 
  </div>
  
</div> -->
<div class="contain">
  <div style="margin:auto"><h2>Why Adnia Solutions?</h2></div>
  <div style="margin:auto"><h2>Save time, improve your business processes, and impress your audience using our premium Excel templates</h2>
  </h2></div>
<div class="products-grid" style="margin-top:-100px">
  <div class="products-flex" >
     <img src="rev/assets/2.jpg" > 
   <div class="products-position">
     <h2>Just enter your data & the template takes care of the detail</h2>
    <h2>Easy-to-use</h2>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
     <h2>Just enter your data & the template takes care of the detail</h2>
    <h2>Easy-to-use</h2>
  </div>
</div>

 <div class="products-flex">
    <img src="rev/assets/2.jpg">
   <div class="products-position">
      <h2>Just enter your data & the template takes care of the detail </h2>
    <h2>Easy-to-use</h2>
  </div>
</div>


</div>
</div>
</div>







<div class="footer-container"> 
<div class="footer">
<div class="flex-container">
  <h6>Company</h6>
  <p>About</p>
  <p>Services</p>
  <p>Design</p>
  <p>Principles</p>
</div>

<div class="flex-container">
  <h6>Company</h6>
  <p>About</p>
  <p>Services</p>
  <p>Design</p>
  <p>Principles</p>
</div>

<div class="flex-container">
  <h6>Company</h6>
  <p>About</p>
  <p>Services</p>
  <p>Design</p>
  <p>Principles</p>
</div>

<div class="flex-container">
  <h6>Signup</h6>
  <p>To get daily notification register your email here</p>
  <form>
  <input type="email" placeholder="enter your email here" size="40">
  <input type="button" value="Signup" size="50">
  </form>
</div>


</div>


<div style="width:100%;height:10%;background-color:black;position:relative;top:-25%;padding-left:15px">
<h5 style="color:white">Adnia Solutions</h5>
</div>
</div>

