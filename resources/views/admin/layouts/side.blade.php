<div id="sidebar" class="active">
    <div class="sidebar-wrapper active border-end border-1 ">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">

                    <a href=""> <img src="{{asset('imgs/logo.svg')}}"  alt="Logo" class = "main-logo "></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">

            <ul class="menu">
                <li class="sidebar-title">{{__('forms.lists')}}</li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="{{route('categories.index')}}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i>
                        <span>{{__('forms.categories')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="{{route('projects.index')}}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i>
                        <span>{{__('forms.projects')}}</span>
                    </a>
                </li>




            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
