<?php
/*
Plugin Name: align
Description: It displays content horizontally
Author: Viraj
*/

function align_function(){
    return '<style> .test{display:flex;width:100%} img{width:50%}</style>
    <div class="test">
    <img src="https://asonefoundation.org/wp-content/uploads/2024/05/sponsorshipletteranddeck2-1-300x67.png">
    <img src="https://asonefoundation.org/wp-content/uploads/2024/06/registerhere-300x106.png">
    
    </div>';
}
add_shortcode('align', 'align_function'); 