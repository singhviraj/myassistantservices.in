
<style>

    body{
        overflow:hidden;
        margin:0!important;
    }

.container{
    
height:100%;
width:300%;

position:relative;
}

.wrapperone{
    position:relative;
    width:100%;
    height:100%;
    display: flex ;
    animation: slide 30s infinite;
    background-color: #92a8d1;

    
}
.wrappertwo{
    
    width:200%;
    height:100%;
    display: flex ;
    position:absolute;
    top:0px;
    animation: slide-up 30s infinite;
}

.wrappertwotwo{
    
   animation: slide-down1 10s infinite;

}



h1{
    width:200%;
    height:100%;
    
}
img{
   
    width:100%;
    height:100%;
   
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



@keyframes slide-up{
    0%{
        transform: translateX(0);
    }
    33%{
        transform: translateX(0);
    }
    34%{
        transform: translateX(-33%);
    }
    67%{
        transform: translateX(-33%);
    }
    68%{
        transform: translateX(-66%);
    }
    98%{
        transform: translateX(-66%);
    }
    99%{
        transform: translateX(0);
    }
   
}

@keyframes slide-down1{
    0%{
        transform: translateX(-50%);
    }
    
    30%{
        transform: translateX(0);
    }

   100%{
    transform: translateX(0);
   }
}

    </style>


<div class="container">
    
    <div class="wrapperone">
        <img src="rev/assets/1.1.jpg" >
        <img src="rev/assets/2.jpg" >
        <img src="rev/assets/3.3.jpg" >
    </div>
    <div class="wrappertwo">
       <h1 class="wrappertwotwo">you</h1>
       <h1 class="wrappertwotwo">and you</h1>
        <h1 class="wrappertwotwo">and you uuuu</h1>
    </div>
 </div>


