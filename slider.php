
<style>

    

.container{
    width: 100%;
    height:auto;
    margin-left: 50%;
    margin-top: 35%;
   overflow: hidden;
   transform: translate(-50%,-50%);
   box-shadow: 10px 25px 30px rgba(30,30,200,0.3);
   
}
.wrapperone{
   
    display: flex ;
    animation: slide 10s infinite;
    
}


@keyframes slide-up{
    0%{
        transform: translateX(0);
    }
    16%{
        transform: translateX(-100%);
    }
    32%{
        transform: translateX(-200%);
    }
    48%{
        transform: translateX(-300%);
    }
    
    64%{
        transform: translateX(-400%);
    }
     
    80%{
        transform: translateX(-500%);
    }
    100%{
        transform: translateX(-500%);
    }
}



@keyframes slide{
    0%{
        transform: translateX(0);
    }
    30%{
        transform: translateX(0);
    }
    
    58%{
        transform: translateX(-100%);
    }
    
    74%{
        transform: translateX(-200%);
    }
     
   
}

  


    </style>








<div class="container">
    <div class="wrapperone">
        <img src="rev/assets/1.1.jpg" >
        <img src="rev/assets/2.jpg" style="height:1500px;width:1350px;margin-top:500px">
        <img src="rev/assets/3.3.jpg" >
    </div>
 </div>

