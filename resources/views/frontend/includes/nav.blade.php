<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-btn {margin-bottom:10px;}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

           {{--   @if(settings()->logo)
            <a href="{{ route('frontend.index') }}" class="logo"><img height="48" width="226" class="navbar-brand" src="{{route('frontend.index')}}/img/site_logo/{{settings()->logo}}"></a>
            @else --}}
             
             <button class="w3-btn w3-white w3-border w3-border-blue w3-round-large">{{ link_to_route('frontend.index',"Location Finder", [], ['class' => 'navbar-brand']) }}<img src="img/frontend/Animated-icon-for-affiliations.gif" style="height: 45px; width: 45px; margin-top: 5px;"></button>
           {{--  @endif --}}
           

        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
            {{-- <ul class="nav navbar-nav">
                <li></li>
            </ul> --}}

            <ul class="nav navbar-nav navbar-right">
         <!-- <li>
                    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
                </li> -->

             <li> <a href="{{ trans('contactus') }}" role="button"> Contact Us <i class="fas fa-address-book"></i></a></li>
            <li><a href="{{ trans('AboutUs') }}" role="button"> About Us<i style="margin-left: 4px;" class="fab fa-artstation"></i></a></li>
            <li><a href="{{ trans('howitworks') }}" role="button">How It Works<i style="margin-left: 4px;" class="fas fa-lightbulb"></i></a></li>

                @if (config('locale.status') && count(config('locale.languages')) > 1)

                    <li class="dropdown">
            
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ trans('menus.language-picker.language') }}<i class="fas fa-language" style="margin-left: 4px;"></i>
                            <span class="caret"></span>
                        </a>

                                
                        @include('includes.partials.lang')
                    </li>

                @endif

                @if ($logged_in_user)
                    <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}
                         <li ><i class="fas fa-h-square" style="margin-top: 18px; margin-left: -10px;"></i></li>
                    </li>

                @endif

                @if (! $logged_in_user)
                    <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                    @if (config('access.users.registration'))
                        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ $logged_in_user->name }} <i class="fas fa-id-badge"></i><span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @permission('view-backend')
                                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                            @endauth

                            <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                            <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}

                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>