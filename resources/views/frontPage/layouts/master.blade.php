<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<meta name="keywords" content="Red Blog Theme, Free CSS Templates" />
<meta name="description" content="Red Blog Theme - Free CSS Templates by templatemo.com" />
<link href="{{asset('frontPage\templatemo_style.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript">
                xmlhttp=new XMLHttpRequest();
                function like_update(post_id,objID){
                    //alert(post_id);
                serverPage="{{url('/ajax_like_page')}}"+"/"+post_id;
                xmlhttp.open("GET",serverPage);
                xmlhttp.onreadystatechange=function(){
                        //alert(xmlhttp.readyState);
                       // alert(xmlhttp.status);
                                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                                        document.getElementById(objID).innerHTML=xmlhttp.responseText;
                                }
                }
                xmlhttp.send(null);
}
</script>
</head>
<body>

<div id="templatemo_top_wrapper">
	<div id="templatemo_top">
    
        <div id="templatemo_menu">
                    
            <ul>
                <li class="@yield('')"><a href="{{url('/')}}" class="current">Home</a></li>
                <li class="@yield('protfolio_active')"><a href="{{url('/protfolio/page')}}">Portfolio</a></li>
                <li><a href="{{url('/services/page')}}">Services</a></li>
                   @if (Auth::guest())
                                 <li><a href="{{url('/login')}}">
                                         Login</a></li>
                        @else
                        <li>
                            <a href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                          @endif
              
            </ul>    	
        
        </div> <!-- end of templatemo_menu -->
        
        <div id="twitter">
        	<a href="#">follow us <br />
        	on twitter</a>
        </div>
        
  </div>
</div>

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1><a href="{{url('/')}}" target="_parent"><strong>Red Blog</strong><span>@yield('page_title')</span></a></h1>
        </div>
    
    </div>
</div>

<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="templatemo_main_top">
        
        	<div id="templatemo_content">
        
@yield('content')
        
       	  </div>
            
    
          <div id="templatemo_sidebar">
               <h4>Categories</h4>
               <?php
            	$allCatagories=DB::table('catagories')
                        ->where('publication_status',1)
                        ->get();
                    ?>
                <ul class="templatemo_list">
                    <?php
                                        foreach($allCatagories as $allCatagory){
                    ?>
                    <li><a href="{{url('/catagory_view/'.$allCatagory->catagory_id)}}"><?php echo $allCatagory->catagory_name; ?></a></li>
                 
                </ul>
                                        <?php }?>
                
                <div class="cleaner_h40"></div>
                 <h4>Popular Post</h4>
               <?php
            	$popularPosts=DB::table('posts')
                        ->where('publication_statu',1)
                        ->orderBy('hit_count','desc')
                        ->limit(5)
                        ->get();
                    ?>
                <ul class="templatemo_list">
                    <?php
                                        foreach($popularPosts as $popularPost){
                    ?>
                    <li><a href="{{url('/post_details/'.$popularPost->post_id)}}"><?php echo $popularPost->post_title;?></a> (Hit Count: {{$popularPost->hit_count}})</li>
                 
                </ul>
                                        <?php }?>
                
                <div class="cleaner_h40"></div>
                <h4>Latest Post</h4>
                <ul class="templatemo_list">
                    <?php
                    $latest_post=DB::table('posts')
                             ->where('posts.publication_statu', 1)
                             ->orderBy('post_id', 'desc')
                            ->limit(5)
                            ->get();
                    foreach ($latest_post as $post){
                    ?>
                    <li><a href="{{url('/post_details/'.$post->post_id)}}" target="_parent"><?php echo $post->post_title; ?></a></li>
                  <?php } ?>
                </ul>
                
                <div id="ads">
                	<a href="#"><img src="{{asset('frontPage\images/templatemo_200x100_banner.jpg')}}" alt="banner 1" /></a>
                    
                    <a href="#"><img src="{{asset('frontPage\images/templatemo_200x100_banner.jpg')}}" alt="banner 2" /></a>
                </div>
                
            </div>
        
        	<div class="cleaner"></div>
            
        </div>
        
    </div>
    
    <div id="templatemo_main_bottom"></div>
    
</div>

<div id="templatemo_footer">

    Copyright © 2048 <a href="index.html">Your Company Name</a> | 

    
</div>
</body>
</html>


