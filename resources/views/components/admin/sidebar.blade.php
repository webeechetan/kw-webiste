<!--
It is just to check the uri segment value so that we can activate the currenct selected menu in sidebar  
{{Request::segment(2)}} -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="" class="app-brand-link">
       
        <img src="{{asset('frontend')}}/images/logo.png" alt="kakewalk">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{Request::segment(2)== 'dashboard' ? 'menu-item active' : ''}}">
        <a href="{{ route('dashboard')}}" class="menu-link">
          <i class=' menu-icon bx bxs-dashboard'></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- File Manager -->
      <li class="menu-item {{Request::segment(2)== 'filemanager' ? 'menu-item active' : ''}}">
        <a href="{{ env('APP_URL') }}/admin/filemanager" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-folder-plus"></i>
          <div data-i18n="Layouts">File Manager</div>
        </a>
      </li>

     
      <!-- Category --> 

      <li class="menu-item {{Request::segment(2)=='category' ? 'menu-item active' : ''}}">
        <a href="{{route('category.index')}}" class="menu-link ">
          <i class=' menu-icon bx bx-category'></i>
          <div data-i18n="Layouts">Category</div>
        </a>
      </li>

      <!-- Tags --> 

      <li class="menu-item {{Request::segment(2)=='tags' ? 'menu-item active' : ''}}">
        <a href="{{route('tags')}}" class="menu-link ">
          <i class=' menu-icon bx bx-tag-alt'></i>
          <div data-i18n="Layouts">Tags</div>
        </a>
      </li>



       <!-- Blogs  -->
       <li class="menu-item {{Request::segment(2)== 'blog' ? 'menu-item active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Layouts">Blogs</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('blog.index')}}" class="menu-link">
              <div data-i18n="Without menu">Blog List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('blog.create')}}" class="menu-link">
              <div data-i18n="Without menu">Add Blog</div>
            </a>
          </li>
        </ul>
      </li>

      <!--Contact us -->
      <li class="menu-item {{Request::segment(2)=='subscribe' ? 'menu-item active' : ''}}">
        <a href="{{route('subscribe')}}" class="menu-link ">
           <i class=' menu-icon bx bx-book-content' ></i>
          <div data-i18n="Layouts">Contact</div>
        </a>
      </li>

      <!-- News Letter subscription -->

       <!--Contact us -->
       <li class="menu-item {{Request::segment(2)=='news-letter' ? 'menu-item active' : ''}}">
        <a href="{{route('news')}}" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Layouts">NewsLetter</div>
        </a>
      </li>

      <!-- Metas -->
      {{-- <li class="menu-item {{Request::segment(2)== 'meta' ? 'menu-item active' : ''}}">
        <a href="{{route('meta.index')}}" class="menu-link ">
          <i class="menu-icon tf-icons bx bx-trending-up"></i>
          <div data-i18n="Layouts">Meta</div>
        </a>
      </li> --}}
    </ul>
  </aside>