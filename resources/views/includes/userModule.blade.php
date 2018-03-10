<div class="row">
    <div class="col-10"></div>
    <div class="col-1">
        <div class="link">
          <li class="dropdown">
              <a title="link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                  <li >
                      <a  href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                  <li><a href="{{ route('register') }}">Register a new admin</a></li>
              </ul>
          </li>
        </div>
    </div>
</div>
