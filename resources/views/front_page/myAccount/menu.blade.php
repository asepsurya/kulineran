<div class="col-md-4 mb-3">
    <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
        <a data-bs-toggle="modal" data-bs-target="#ubahPhoto" class="">
            <div class="d-flex align-items-center p-3">
                <div class="left mr-3">
                    @if (auth()->user()->gambar)
                    <img alt="#" src="/storage/{{ auth()->user()->gambar }}" class="rounded-circle " width="50">
                    @else
                    <img alt="#"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAMFBMVEXFxcX////CwsLGxsb7+/vT09PJycn19fXq6urb29ve3t7w8PDOzs7n5+f5+fnt7e30nlkBAAAFHUlEQVR4nO2dC5qqMAyFMTwUBdz/bq+VYYrKKJCkOfXmXwHna5uTpA+KwnEcx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3Ecx3EcA2iO9cdIc5PUdO257y+BU39u66b4HplE3fk6VIcnqmNfl1+gksr6+iIucjl3WYukor7+re6Hoe1y1UhNO3zUd+fUFRmKpOa0Tt6dY5ubRCrOG/QFLk1WGmnt/JxzykcjdZ/jyxJDLlOV2l36AtcsJJb9boG3YcR3DuqODIE3ztYKPkDdmwRmpUToUaSaq++AvRgZMWbOpbQW8hdCAm8ZDugoikzREdCJ2okJPBx6azFLNOwoOgcxojJ98JkaTSJxMpklKrCAKhZGI0drTY/wU5lXoJYibannV9NYy4oozNEAkPHTjop+DTDxVGkIgYJNoyQQJtiIW+EMjGAjm649AjGIaqswcEFQKJ2QPlJbqytki6ZXAAZRJ52J2McaUowzAfs+uFzrYhnzaapphiPWdaJWShqxjqa6kTTQ205TVbsfMa6htL0iYOsXpJrQjHSmCkv1QGPtiHqlYcQ21Gj7fcDU8xOEUuNgSltPzexh+HqFlanCBHZ4OLhCV+gK/3OF6vWvucLv98MUOY2pwu/PS/+D2qJU7pYGbOvDFDW+bbON9p3o3oRxn0bfLgZTgSn6pSfrtr56qLHemtHPTK2319SzGvtjQ9qeb39WgS66Cm073nd0U1PzDdJCO3Gzn6TKpl9Zq7ujGWsQhlA3NwWIMwG9zM08Y/tBrR9VWeczv5CSQuuUNKIUTk23ZJ5RKfVhjnkXotfWIlgX2BSCDYbZR+QTcLhb3dKZDUY2M0d4KWItwhHRah/zsrOgKw4wycwjcgEVcgQDQo23CqSiWEJkFAfod2oE1uIFdA1OsCPqFXYNTjCfb8Ez+iX2x5sKLlVbhtqdDcar9ZevhnbZxoBUD35k23t0d304LYs1ELVbnfFaZ/REJJX9niP8Q19moZGo3m8XR/yBvOnjFfsXcI2c8ZuNo7WMP5HQh6yRGrlmFOJTnyTcT+zRlqPUBI2gTVWNUzUna1ERgecgF4GpNBQ38jGqxVLzQA1A31Rrhk6Yz9QEh/WND0GnuG9huhiTXJkxfAizTHLr6cbJKN6UCU6x/2DTRE1xEeEXi3O0ZUqBN4nJRzHhFB1JPlFTBZlI2kQ8zc3KJ1Le8DIRmFJiknuVS6RK4Ej/JtBfJErDSzOBiY4wJHX6Z1I4v1GUmdCPNirnLLeg3oJLcbX5PcpHNbRvOa1A956QmRPOUXVF+zkaUJynpkYR0bOMJH2nNej1pqyV/aKkz9jr5yj5vrXXz1F5SQLACiMapmierj2ikLyleKdlA/I/2oFxiglxx9B+mHwz0lf34IZQfhDRhlD6bhvgEAoPYooHkTczSIZTLC+cEExsoNKZiGBiY9cCfo/Y/SjIOBMQizWWTe73CMUasJx7jlD+DdKdWUKoY4PRYFtGpO0G1Lx4RaadgTtJhf4fiGqGIwKWCGuGIwKWqP+7IxYCzygjR9IAO5pC7Da9g70TBVpWRNgFBlgT8RV2WxHbKwJMv4BOaEaYaU2K16yZMN/qgV+G7IWIvwyZCxHeDQMsR8wg0DBDDXB5H2EV+hkEGmaoySHQsEJNFoGGFWrAq98JRhUMX1iMMMqLLEIpK5jCbd4vw9nSt/72lewXiN6jmdjfq8Hdknlk92ZwJnbIMMRM7JBhiFlUFoHd1UWaP1QKsPsHA5mkNB+Smn9JqV3wskatnQAAAABJRU5ErkJggg=="
                        class="rounded-circle" width="50">
                    @endif
                </div>
                <div class="right">
                    <h6 class="mb-1 font-weight-bold text-primary">{{ auth()->user()->nama_lengkap }} <i
                            class="feather-check-circle text-success"></i></h6>
                    <p class="text-muted m-0 small">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </a>
        <div class="osahan-credits d-flex align-items-center p-3 bg-light">
            <p class="m-0">Detail Akun</p>

        </div>
        <!-- profile-details -->
        <div class="bg-white profile-details">
            <a href="/profile" class="d-flex w-100 align-items-center border-bottom p-3">
                <div class="left mr-3">
                    <h6 class="font-weight-bold mb-1 text-dark">Profile</h6>
                    <p class="small text-muted m-0">Detile Identitas kamu</p>
                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>
            <a href="/address" class="d-flex w-100 align-items-center border-bottom p-3">
                <div class="left mr-3">
                    <h6 class="font-weight-bold mb-1 text-dark">Address</h6>
                    <p class="small text-muted m-0">Alamat tempat tinggalmu</p>
                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>

            <a href="/orderstatus" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                <div class="left mr-3">
                    <h6 class="font-weight-bold m-0 text-dark"><i
                            class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i> Pesananmu
                    </h6>
                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>
            <a href="contact-us.html" class="d-flex w-100 align-items-center border-bottom px-3 py-3">
                <div class="left mr-3">
                    <h6 class="font-weight-bold m-0 text-dark pt-2"><i
                            class="feather-phone bg-primary text-white p-2 rounded-circle mr-2"></i> Hubungi Kami</h6>

                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>
            <a href="/coupons" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                <div class="left mr-3">
                    <h6 class="font-weight-bold m-0 text-dark"><i
                            class="feather-info bg-success text-white p-2 rounded-circle mr-2"></i> Kupon Saya</h6>
                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>
            <a href="privacy.html" class="d-flex w-100 align-items-center px-3 py-4">
                <div class="left mr-3">
                    <h6 class="font-weight-bold m-0 text-dark"><i
                            class="feather-lock bg-warning text-white p-2 rounded-circle mr-2"></i> Privacy policy</h6>
                </div>
                <div class="right ml-auto">
                    <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                </div>
            </a>
        </div>
    </div>
</div>