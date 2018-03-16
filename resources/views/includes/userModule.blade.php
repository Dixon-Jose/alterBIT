<div class="row">
    <div class="col-9"></div>
    <div class="col-3">
        <div>
          <ul id='menu'>
          <li>
            <div>
              <a class="link" href="#">
                  {{ Auth::user()->name }}:
              </a>
            </div>
          </li>
        </ul>
              <div class="sub-menu" >
                <table>
                  <tr>
                    <th>
                            <a  href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                  </th>
                    <th>
                      <a href="{{ route('register') }}">Register a new admin</a>
                    </th>
                  </tr>
                </table>

        </div>
    </div>
</div>
