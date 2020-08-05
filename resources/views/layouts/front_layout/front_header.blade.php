<div id="header">
   <div class="container">
      <div id="welcomeLine" class="row">
         <div class="span6">Welcome ! <span><img src="{{ asset('images/front_images/user_images/user1.png')}}" style="height:30px;border-radius:25px;"></span><strong> Saurabh Shukla</strong></div>
         <div class="span6">
            <div class="pull-right">
               <a href="#"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i><span id="getaddcart"> [ 3 ] Items in your cart </span></span> </a>
            </div>
         </div>
      </div>
      <!-- Navbar ================================================== -->
      <section id="navbar">
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <a class="brand text-white" href="{{ url('/') }}">E-Shop-Adv.</a>
              <div class="nav-collapse">
                <ul class="nav">
                  <li class="active"><a href="{{ url('/') }}">Home</a></li>
                  @foreach($categories as $section)
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $section['name'] }} <b class="caret"></b></a>        
                        @foreach($section['categories'] as $category)
                          <ul class="dropdown-menu">
                            @foreach($section['categories'] as $category)
                              <li class="divider"></li>
                              <li><a href="#"><strong>{{ $category['category_name'] }}</strong></a></li>
                              @foreach($category['subcategories'] as $subcategory)
                                <li class="divider"></li>
                                <li><a href="#">&nbsp;&nbsp;{{ $subcategory['category_name'] }}</a></li> 
                              @endforeach
                            @endforeach                              
                          </ul>
                      @endforeach    
                    </li>
                  @endforeach
                  <li><a href="{{ url('about') }}">About</a></li>
                </ul>
                <form class="navbar-search pull-left" action="#">
                  <input type="text" class="search-query span2" placeholder="Search">
                </form>
                <ul class="nav pull-right">
                  <li><a href="{{ url('contact') }}">Contact</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="{{ url('user-register') }}">Register</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="{{ url('user-login') }}">Login</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="{{ url('user-profile') }}">MyAccount</a></li>
                  <li class="divider-vertical"></li>
                  <li><a href="{{ url('user-logout') }}">Logout</a></li>
                </ul>
              </div><!-- /.nav-collapse -->
            </div>
          </div><!-- /navbar-inner -->
        </div><!-- /navbar -->
      </section>
   </div>
</div>
<!-- Header End====================================================================== -->
