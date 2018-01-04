<!DOCTYPE html>
<head>
  <title>alterBIT | The unconventional way of life</title>
  @extends('includes.fonts')
  @include('includes.navbar')
  <link rel="stylesheet/less" type="text/css" href="/css/main.less">
  <!-- <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css-" -->
  <script src="/js/less.js" type="text/javascript">
  </script>
  <script>
  function getfocus() {
      document.getElementById("search").value="";
      document.getElementById("search").focus();

  }
  </script>
</head>
<body>
<div class="row">
  <div class="col-2 element"></div>
    <div class="col-8 element">
            <div class="card-img">
                <img src="/images/index.jpeg">
            </div>
            @if(isset($entity))
            <h2>{{$entity->name}}
            <p title="entity">{{$entity->description}}</p>
            @else
            <h2>Firefox Focus</h2>
            <p title="fake">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            @endif
            <hr/>
    </div>
</div>

<div class="row">
    <div class="col-12 partition">
          <h2>The Alternatives are:</h2>
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
      </div>
    </div>
<div class="row">
  <div class="col-2"></div>
    <div class="col-8"><hr/></div>
</div>
<div class="row">
  <div class="col-2"></div>
  <div class="col-8 comment" name="entity-page">
          <h4>Responses</h4>
          <form>
                <!-- <input type="email" placeholder="Enter email address" name="email" required> -->
                <textarea placeholder="Enter response" ></textarea>
                <!-- <input type="submit" value="Submit"> -->
          </form>
  </div>
</div>


      <div class="row footer">
          <div class="col-10 footer" >
              <p>Designed by: <a href="">&nbsp;Aniruddha</a>&nbsp;and<a href="">&nbsp;Dixon</a></p>
          </div>
          <div class="col-2 footer">
              <a href="https://github.com/Dixon-Jose/alterBIT" title="github"></a>
          </div>
      </div>
</body>
</html>
