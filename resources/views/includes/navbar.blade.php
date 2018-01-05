<div class="row">
    <div class="col-12 menu-bar">
          <a href="{{URL::to('/')}}">alterBiT<span> | The Unconventional Way of Life</span></a>
    </div>
    <div class="col-12 menu">
        <form method="get" action="{{ route('search') }}">
        <input type="search" placeholder="Search" id="search" name="q">
        </form>
    </div>
</div>
