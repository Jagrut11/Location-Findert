@extends('frontend.layouts.app')

@section('content')
    <div class="row">

       

        

        @role('Administrator')
            {{-- You can also send through the Role ID --}}

            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_blade_extensions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 1: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasRole('Administrator'))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRole(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 3: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 4: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @permission('view-backend')
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 5: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view-backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasPermission(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 6: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 7: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        <div class="col-xs-12">

            <div class="panel panel-default">   
                <div style="text-align: center;"> <h1>About Cygnet </h1></div>

                <div class="panel-body" style="text-align: center; background-color: #28b6e7; color: white;">
                    <p>Cygnet Infotech is one of the most trusted names in the IT space delivering technology innovation across 35 countries. Our digital transformation strategies, problem-solving benchmarks and agile business models, enable our clients to digitize, scale, and transform in to high performance businesses.</p><br><br>

                    <div class="col-md-3 about-count-box">
                        <div class="about-count"><span class="about-count-number"><h2>35</h2></span></div>
                        <p>countries where we have<br>happy customers</p>
                        </div>

                        <div class="col-md-3 about-count-box">
                        <div class="about-count"><span class="about-count-number"><h2>2000+</h2></span></div>
                        <p>enterprise-class solutions &amp; products<br>delivered</p>
                        </div>

                        <div class="col-md-3 about-count-box">
                        <div class="about-count"><span class="about-count-number"><h2>900+</h2></span></div>
                        <p>technology enthusiasts working<br>with global brands</p>
                        </div>

                        <div class="col-md-3 about-count-box">
                        <div class="about-count"><span class="about-count-number"><h2>10</h2></span></div>
                        <p>locations from where we engage<br>with global clients</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title border-btm light-blue text-left">
                                <h2 class="text-dark-blue text-left" style="padding-left: 50px;">Overview</h2>
                            </div>
                            <div class="overvie-content wow fadeIn" style="visibility: visible; animation-name: fadeIn; padding-left: 50px;">
                                <p>Cygnet Infotech is one of the most trusted names in the IT space delivering technology solutions across 35 countries. Born out of a vision to create a software development company where quality, innovation and personalized services trump low cost, makeshift solutions, Cygnet enables its clients to digitize, scale and transform<span>&nbsp;</span>in to<span>&nbsp;</span>high performance<span>&nbsp;</span>businesses.</p>

                                <p>Cygnet has deep industry and business process expertise, global resources, and a proven track record in developing creative technology solutions. Cygnet can mobilize the right people, skills and technologies that help to improve business performance.</p>
                            </div>
                        </div>

                    <div class="col-lg-7">
                        <div class="company-loaction wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                            <br><img src="/img/frontend/about-map.png" usemap="#image-map" alt="Cygnet offices"> <map name="image-map"> 
                            <area target="_self" alt="location1" title="location1" href="https://getbootstrap.com/docs/4.0/layout/grid/" coords="116,122,NaN" shape="circle">
                     
                            <area target="_self" alt="location2" title="location2" href="https://getbootstrap.com/docs/4.0/layout/grid/" coords="311,98,NaN" shape="circle">
                        </map>
                        </div>
                    </div>
            
        </div><br><hr>

                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->



        
        <!-- </div> --><!-- col-md-10 -->

        <!-- <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Font Awesome {{ trans('strings.frontend.test') }}</div>

                <div class="panel-body">
                    <i class="fa fa-home"></i>
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-pinterest"></i>
                </div>
            </div> --><!-- panel -->

        <!-- </div> --><!-- col-md-10 -->

    <!-- </div> --><!--row-->
@endsection