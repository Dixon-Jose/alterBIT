<!DOCTYPE html>
<head>
        <title>alterBIT | The unconventional way of life</title>
        @include('partials.fonts')
        <link rel="stylesheet/less" type="text/css" href="{{ URL::to('css/main.less')}}">
        <script src="{{URL::to('js/less.js')}}" type="text/javascript"></script>
</head>
<body>
      @include("partials.navbar")
      <div class="row">
              <div class="col-2 element" style="background-color:#fff"></div>
                        <div class="col-8 element">
                              <div class="card-img">
                                    <img src="../index.jpeg">
                              </div>
                              <h2>Firefox Focus</h2>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                              </p>
                              <hr>
                        </div>
      </div>
      <div class="row">
              <div class="col-12 partition">
                    <h2>The Alternatives are</h2>
              </div>
      </div>
      <div class="row">
          <div class="col-12 alter">
                <div class="col-2"></div>
                <div class="col-2 card">
                      <h3>Alternate Name</h3>
                      <p>  Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <a href="">Check out</a>
                </div>
                <div class="col-2 card">
                      <h3>Alt Name</h3>
                      <p>  Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <a href="">Check out</a>
                </div>
                <div class="col-2 card">
                      <h3>Alt Name</h3>
                      <p>  Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      <a href="">Check out</a>
                </div>
          </div>
      </div>
      <div class="row footer">
          <div class="col-10 footer" >
              <p>Designed by: <a href="">&nbsp;Aniruddha</a>&nbsp;and<a href="">&nbsp;Dixon</a></p>
          </div>
          <div class="col-2 footer">
              <a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a>
          </div>
</body>
</html>
