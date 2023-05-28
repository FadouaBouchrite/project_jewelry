 
 <header class="header_section" style="text-align: center; padding-left:30%;">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
      
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_categorie')}}">Categories</a>
                        </li>
                        <li class="nav-item">
                           
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                        




                        
                        @if (Route::has('login'))
                        @auth 
                        <x-app-layout>
                            
                        </x-app-layout>
                       @else
                        <li class="nav-item">
                           <a class="btn nav-link " href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn nav-link " href="{{ route('register') }}">Registre</a>
                        </li>
                      @endauth
                       @endif
                       <li class="nav-item">
   <a class="nav-link"   href="{{url('show_cart')}}">
   <img width="30px" height="30px" style="padding-top: 0%;" src="home/images/panier.png" alt="">




   </a>
</li>

                     </ul>
                  </div>
               </nav>
            </div>
         </header>