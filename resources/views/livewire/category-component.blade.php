
    <div class="main-categori-wrap d-none d-lg-block">
        <style>
            .dropdown-menu{
                border: 0;
            }
        </style>
        <a class="categori-button-active" href="#">
            <span class="fi-rs-apps"></span> Browse Categories
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-large" style="z-index: 999">
            <ul>
                @foreach($categories as $category)
                <li class="{{count($category->subcategory) > 0 ? 'has-children':''}}">
                    <a href="{{route('category.product',['slug'=>$category->slug])}}"><i class="surfsidemedia-font-tshirt"></i>{{ucwords($category->name)}}</a>
                    <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">
                            <li class="mega-menu-col col-lg-3">
                                <ul class="d-lg-flex">
                                    <li class="mega-menu-col col-lg-9">
                                        <ul>
                                            @foreach($category->subcategory as $scategory)
                                            <li><a class="dropdown-item nav-link nav_item" href="{{route('category.product',['slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}">{{ucwords($scategory->name)}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-menu-col col-lg-9">
                                <div class="row" >
                                    @foreach($category->subcategory as $scategory)
                                    <div class="col-sm-3 col-md-3">
                                        <a href="{{route('category.product',['slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}">
                                        <div class="header-banner2">
                                            <img src="{{asset('frontend/assets/images/category')}}/{{$scategory->image}}" alt="menu_banner1" class="rounded" >
                                                    <span>{{ucwords($scategory->name)}}</span>
                                        </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

