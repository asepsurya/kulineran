 <!-- Sidebar -->
 
 <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        @if (auth()->user()->gambar)
          <img alt="#" src="/storage/{{ auth()->user()->gambar }}" class="rounded-circle " width="50">
          @else
          <img alt="#"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29ve3t7w8PDOzs7n5+f5+fnt7e30nlkBAAAFHUlEQVR4nO2dC5qqMAyFMTwUBdz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO257y+BU39u66b4HplE3fk6VIcnqmNfl1+gksr6+iIucjl3WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCrOG/QFLk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3ztYKPkDdmwRmpUToUaSaq++AvRgZMWbOpbQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEFQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39WgS66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIFdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFfsXcI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9JqV3wskatnQAAAABJRU5ErkJggg=="
            class="rounded-circle" width="50">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama_lengkap }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div id="topheader">
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">Kunjungi Halaman Depan</li>
               <li class="nav-item">
            <a href="/" class="nav-link" target="_blank" >
              <i class="nav-icon fab fa-staylinked"></i>
              <p>
                Websiteku
              </p>
            </a>
          </li>
          <li class="nav-header">Main Menu</li>
               <li class="nav-item">
            <a href="/dashboard" class="nav-link  {{ Request::is('dashboard') ? 'active' : ''}}">
           
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item {{ Request::is('produk*','category','setelanproduk') ? 'menu-open' : 'menu-close'}} ">
            <a href="#" class="nav-link {{ Request::is('produk*','category','setelanproduk') ? 'active' : ''}}">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Data Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/produk" class="nav-link  {{ Request::is('produk*') ? 'active' : ''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Data Produk</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="/category" class="nav-link  {{ Request::is('category') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/setelanproduk" class="nav-link  {{ Request::is('setelanproduk') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setelan Produk</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="../pages/supplier/index" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Outlet
              </p>
            </a>
          </li>
           
          <li class="nav-item {{ Request::is('order*') ? 'menu-open' : 'menu-close'}} ">
            <a href="#" class="nav-link {{ Request::is('order*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-hand-holding-usd fa-boxes"></i>
              <p>
                Transaksi 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/order" class="nav-link {{ Request::is('order*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="../pages/kategori/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Order</p>
                </a>
              </li>
            </ul>
          </li>

         
          <li class="nav-item">
            <a href="../pages/pelanggan/index" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Database Pelanggan
              </p>
            </a>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan Toko
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../pages/data_produk/index" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alamat Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/iframe/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Database</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Main Menu</li>
          <li class="nav-item">
                <a href="../pages/kategori/index" class="nav-link">
                  <i class="far fa fa-book nav-icon"></i>
                  <p>Laporan Transaksi</p>
                </a>
              </li>
              
              
              
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
</div>
  