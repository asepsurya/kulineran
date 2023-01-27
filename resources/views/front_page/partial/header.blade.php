<header class="section-header ">
    <section class="header-main shadow-sm bg-primary ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-5">
                    <a href="/" class="brand-wrap mb-0">
                        <img alt="#" class="img-fluid" src="img/logo2-white.png">
                    </a>
                    <!-- brand-wrap.// -->
                </div>
                
                <!-- col.// -->
                <div class="col-7">
                    <div class="d-flex align-items-center justify-content-end pr-5">
                        <!-- search -->
                        <div class="px-2 col-12 ">
                            <form action="/search" method="get">
                                <div class="autocomplete" style="width:100%;">
                                    <div class="input-group rounded shadow-sm ">
                                        <div class="input-group-prepend">
                                            <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                                        </div>
                                        <input type="text" class="shadow-none border-0 form-control typeahead" placeholder="Mau Cari Apa Bro..." id="search"  name="search" value="{{ old('search') }}">
                                        <button type="submit" hidden></button>
                                    </div>                          
                                </div>
                              </form>
                        </div>
                        <!-- offers -->
                       
                        @if (auth()->user())
                       
                        <a href="/cart" class="widget-header text-light m-2">
                            <div class="icon d-flex align-items-center">
                                <i class="feather-shopping-cart h6 mr-2 mb-0"></i> <span class="badge badge-primary">5</span>
                            </div>
                        </a>
                        <!-- my account -->
                        <div class="dropdown mr-4 m-none btn ">

                           
                            <a href="#" class="dropdown-toggle text-white py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (auth()->user()->gambar)
                                    <img alt="#" src="/storage/{{ auth()->user()->gambar }}" class="img-fluid rounded-circle header-user mr-2 header-user">
                                @else
                                    <img alt="#" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29ve3t7w8PDOzs7n5+f5+fnt7e30nlkBAAAFHUlEQVR4nO2dC5qqMAyFMTwUBdz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO257y+BU39u66b4HplE3fk6VIcnqmNfl1+gksr6+iIucjl3WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCrOG/QFLk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3ztYKPkDdmwRmpUToUaSaq++AvRgZMWbOpbQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEFQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39WgS66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIFdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFfsXcI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9JqV3wskatnQAAAABJRU5ErkJggg==" class="img-fluid rounded-circle header-user mr-2 header-user">
                                @endif
                                Hi {{ auth()->user()->nama_lengkap }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @if (auth()->user()->role == '1')
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                @endif
                                <a class="dropdown-item" href="/profile">My account</a>
                                <a class="dropdown-item" href="terms.html">Term of use</a>
                                <a class="dropdown-item" href="privacy.html">Privacy policy</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                  </form>
                                
                            </div>
                        </div>
                        
                        @else
                       
                        <div class="py-2">
                            <a class="widget-header text-white btn  m-none" href="/login">
                                <button type="button" class="btn btn-outline-light">
                                        Masuk
                                </button>
                                
                            </a>  
                        </div>
                        <div class="py-2">
                            <a class="widget-header text-white" href="/register">
                                <button type="button" class="btn btn-success">
                                    Daftar
                            </button>
                            </a>  
                        </div>
                       
                        @endif
                        
                        
                        <a class="toggle" href="#">
                            <span></span>
                        </a>
                    </div>
                    <!-- widgets-wrap.// -->
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>
 
    <!-- header-main .// -->
</header>
  
