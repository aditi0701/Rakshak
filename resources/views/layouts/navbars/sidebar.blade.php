<div class="sidebar" data-color="orange">
  
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Rakshak') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="@if ($activePage == '/') active @endif">
        <a href="{{ route('home') }}">
          <i class="now-ui-icons design_app"></i>
          <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#laravelExamples">
            <i class="fab fa-laravel"></i>
          <p>
            {{ __("Contributor") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExamples">
          <ul class="nav">
            <!-- ///////////me/////////////////// -->
            <li class="">
              <a href="{{ route('register') }}">
                <i class="now-ui-icons gestures_tap-01"></i>
                <p> {{ __("Register") }} </p>
              </a>
            </li>
            <li class="">
              <a href="{{ route('login') }}">
                <i class="now-ui-icons business_badge"></i>
                <p> {{ __("Login") }} </p>
              </a>
            </li>
            <!-- ////////////////////////////////// -->
            @if(auth()->id() > 1)
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('profile.edit') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
           
            @endif
          </ul>

          
        </div>
      
      <li class = " @if ($activePage == 'plasmaTable') active @endif">
        <a href="{{ route('page.index','plasmaTable') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Plasma Donors') }}</p>
        </a>
      </li>
      <li class = " @if ($activePage == 'oxygenTable') active @endif">
        <a href="{{ route('page.index','oxygenTable') }}">
          <i class="now-ui-icons design_bullet-list-67"></i>
          <p>{{ __('Oxygen Donors') }}</p>
        </a>
      </li>
     
    </ul>
  </div>
</div>
