
<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp

    <div id="header">
        <a  id="nav1">
            <img src="/image/logoD.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> E L Y
        </a>
        <span class="menuheader" onclick="toggleMenu()">☰</span>
        <ul id="nav">
            <li><a href="/" class="active-menu">Trang chủ</a></li>
            <li><a href="/blog">Blog </a></li>

            {!! $menusHtml !!}
        </ul>


       {{-- icon header --}}
        <div class="search-bt">
            <ul id="nav">
                {!! \App\Helpers\Helper::renderNav() !!}
                <li> <a> <i class="ti-search js-show-modal-search"></i> </a> </li>
                <li> <a  href="{{ route('carts.list') }}"> <i class="ti-shopping-cart"></i> </a> </li>
            </ul>
        </div>
    </div>


    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
                </button>
                <form action="{{ route('products.search') }}" method="GET" class="wrap-search-header flex-w p-l-15" >
                    <button class="flex-c-m trans-04" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Tìm kiếm...">
                </form>
        </div>
    </div>

</header>


<script>
    function toggleMenu() {
        var nav = document.getElementById('nav');
        if (nav.classList.contains('show')) {
            nav.classList.remove('show');
        } else {
            nav.classList.add('show');
        }
    }
</script>

