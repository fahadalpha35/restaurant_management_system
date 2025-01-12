<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbarhead">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #fff;"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      <!-- &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}"><font color="#10673b" size="5"><b>O<font color="#e9212b">R</font>MS</b></font></a> -->
      &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('/')}}"><font color="#fff" size="5"><b>O<font color="#e9212b">R</font>MS</b></font></a>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search" style="color: #fff;"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> -->




<!-- Calculator -->
      <style>
[popover] {
  opacity: 0;
  transform: translateY(-20px);
  transition: all 0.25s allow-discrete;
}
[popover]::backdrop {
  background: rgba(0, 0, 0, 0);
  backdrop-filter: blur(0);
}
[popover]::backdrop {
  transition: all 0.25s allow-discrete;
}
[popover]:popover-open {
  opacity: 1;
  transform: translateY(0);
}
[popover]:popover-open::backdrop {
  background: rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(10px);
}
@starting-style {
  [popover]:popover-open {
    opacity: 0;
    transform: translateY(-20px);
  }
  [popover]:popover-open::backdrop {
    background: rgba(0, 0, 0, 0);
    backdrop-filter: blur(0);
  }
}
</style>  

  <div class="calpopupbutton">
    <div class="flex justify-center my-20">
      <div
        style="font-family: 'Noto Serif TC', serif; font-optical-sizing: auto;padding:0px;"
      ><a href="{{route('orders.create')}}" class="btn btn-secondary" style="background-color:#FFC300;border-radius: 6px;padding:2px;margin-top:4px;">
        <img src="{{ asset('dist/img/order.png') }}" width="23" alt="logo">
      </a>
      </div>
    </div>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


  <div class="calpopupbutton">
  <div class="flex justify-center my-20">
    <button
      type="button"
      popovertarget="my-popover"
      popovertargetaction="show"
      class="text-gray-900 focus:outline-none hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
      style="font-family: 'Noto Serif TC', serif; font-optical-sizing: auto; padding: 0px; border-radius: 6px; height: 25px; margin-top: 7px; background-color: #ffffff; border: 1px solid #28a745;"
    >
      <img src="{{ asset('dist/img/cal3.png') }}" width="20" alt="logo" style="margin-top:-3px;">
    </button>
  </div>
</div>&nbsp;&nbsp;
<div id="my-popover" class="rounded-md sm:-top-1/4" popover="manual" style="opacity: 0; transform: translateY(-20px); transition: all 0.25s;">
  <div class="relative w-dvw h-dvh sm:h-auto sm:max-w-[50vw] sm:w-[500px]" style="background: rgba(0, 0, 0, 0); backdrop-filter: blur(0); transition: all 0.25s;">
    <div class="p-4 sm:px-6 space-y-3">
      <div class="cal" style="float: right;">
        <button
          type="button"
          popovertarget="my-popover"
          popovertargetaction="hide"
          class="text-lg absolute top-2 right-4 text-gray-700 border border-gray-700 hover:bg-gray-700 hover:text-white focus:outline-none font-medium rounded-full p-1 text-center inline-flex items-center dark:border-gray-500 dark:text-gray-500 dark:hover:text-white dark:focus:ring-gray-800 dark:hover:bg-gray-500"
        >
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <path fill="currentColor" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12L5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4" />
          </svg>
        </button>
      </div>
      <form name="calc">
        <table style="margin: auto; background-color: #9dd2ea; width: 295px; height: 325px; text-align: center; border-radius: 4px;">
          <tr>
            <td>
              <input type="text" name="input" size="16" id="answer" style="left: 5px; top: 5px; margin: 5px; width: 270px; font-size: 26px; text-align: center; background-color: #F1FAEB; float: left;">
              <br>
            </td>
          </tr>
          <tr>
            <td>
              <input type="button" name="one" value="  1  " onclick="calc.input.value += '1'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="two" value="  2  " onclick="calc.input.value += '2'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="three" value="  3  " onclick="calc.input.value += '3'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" class="operator" name="plus" value="  +  " onclick="calc.input.value += ' + '" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #f1ff92; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <br>
              <input type="button" name="four" value="  4  " onclick="calc.input.value += '4'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="five" value="  5  " onclick="calc.input.value += '5'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="six" value="  6  " onclick="calc.input.value += '6'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" class="operator" name="minus" value="  -  " onclick="calc.input.value += ' - '" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #f1ff92; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <br>
              <input type="button" name="seven" value="  7  " onclick="calc.input.value += '7'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="eight" value="  8  " onclick="calc.input.value += '8'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="nine" value="  9  " onclick="calc.input.value += '9'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" class="operator" name="times" value="  x  " onclick="calc.input.value += ' * '" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #f1ff92; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <br>
              <input type="button" id="clear" name="clear" value="  c  " onclick="calc.input.value = ''" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #ff9fa8; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; margin-bottom: 15px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="zero" value="  0  " onclick="calc.input.value += '0'" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" name="doit" value="  =  " onclick="calc.input.value = eval(calc.input.value)" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #fff; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <input type="button" class="operator" name="div" value="  /  " onclick="calc.input.value += ' / '" style="left: 5px; top: 5px; margin: 5px; outline: 0; position: relative; border: 0; color: #495069; background-color: #f1ff92; border-radius: 4px; width: 60px; height: 50px; float: left; font-size: 20px; box-shadow: 0 4px rgba(0,0,0,0.2);">
              <br>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var popover = document.getElementById("my-popover");
    var buttons = document.querySelectorAll("[popovertarget]");

    buttons.forEach(function(button) {
      button.addEventListener("click", function() {
        var action = button.getAttribute("popovertargetaction");
        if (action === "show") {
          popover.style.opacity = "1";
          popover.style.transform = "translateY(0)";
          popover.style.background = "rgba(0, 0, 0, 0.2)";
          popover.style.backdropFilter = "blur(10px)";
        } else if (action === "hide") {
          popover.style.opacity = "0";
          popover.style.transform = "translateY(-20px)";
          popover.style.background = "rgba(0, 0, 0, 0)";
          popover.style.backdropFilter = "blur(0)";
        }
      });
    });
  });
</script>


<!-- Calculator End -->

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="color: #fff;"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt" style="color: #fff;"></i>
        </a>
      </li>
      <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" style="color: #fff;">
                <img src="{{ asset('dist/img/fahad.jpg') }}" alt="Avatar" class="resprofile"/>

                </a>
                
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a href="{{route('profile.index')}}" class="dropdown-item">
                                    {{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}
                    </a>
                    <a href="{{ route('edit_profile', ['id' =>  Auth::user()->id ]) }}" class="dropdown-item">
                    <i class="ti-settings text-primary" ></i>
                    Settings
                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
            </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <style>
    .resprofile{
        border-radius: 50%;
        width: 30px;
    }
    .navbarhead {
      background: linear-gradient(90deg, rgba(5,22,115,1) 0%, rgba(0,123,255,1) 50%, rgba(5,22,115,1) 100%);
    }
  </style>