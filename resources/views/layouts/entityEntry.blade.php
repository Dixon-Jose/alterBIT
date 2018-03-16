  <div class="row ">
    <div class="col-2"></div>
    <div class="col-8 user-form" >
      <h3>Enter new alternative: </h3>
        <hr>
        <form method="post" id="inputForm" action="{{ route('suggestionsInput') }}">
          {{csrf_field()}}
          <input type="text" class="name" placeholder="Name (of the alternative/entity)" name="name" title="Enter the name of the product" minlength=2 required>
          <br>
          <textarea id="description"  placeholder="Description" name="description" title="Enter the description of the product" minlength=20 required></textarea>
          <br>
          <br>
          <label id="cat-label">Select category:</label><br><br>
          <select id="category-select" name="category" title="Select the category it belongs to" class="required" >
          <option value="default" disabled selected></option>
          </select>
          </form>
    </div>
    <div class="col-2"></div>
  </div>


  <div class="row sugg-page-form"  id="alternatives" style="display:none">
    <div class="col-2 "></div>
    <div class="col-8">
      <hr>
      <div>
        <br>
        <h3 id="mainh3">Select alternatives: </h3>
        <div class="controlgroup">
          <input type="search" id="search" placeholder="Search">
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <br>
        <div class="col-10 sugg-tags">
        </div>
      </div>
      <div class=" alter"></div>
      <!-- <br>
      <br>
      <br> -->
       <div id="loader"></div>
      <hr>
    </div>
    <div class="col-2"></div>
  </div>

  <div class="row user-form1">
    <div class="col-2"></div>
    <div class="col-8">
    <form id="optionalForm">
      Select Image Upload Type:<br><br>
      <input type="radio" id="img-url" name="Image-select" value="ImageURL" >Link
      &nbsp;
      <input type="radio"  id="img-file" name="Image-select" value="File Upload" >File Upload
      <br>
      <br> 
      <div id="image-url" style="display:none">
          <input id="url" type="url" placeholder="Enter URL" name="url" title="Enter the Image URL">
      </div>

      <div id="image-file" style="display:none">
          <input id="file" type="file" title="Select the Image Path " accept="image/*" data-max-size="10240">
      </div>
      <br>
      <input type="button" class="done" value="Done">
      </form>
    </div>
  </div>


  <div class="finalize-alt" style="display:none">

    <div class="row">
        <div class="col-2 element"></div>
        <div class="col-8 element">
          <h3>Element Details:</h3>
          <hr>
          <br>

                <div class="card-img">
                    <!-- <img src="https://d1qb2nb5cznatu.cloudfront.net/users/2009877-large?1456814117"> -->
                    <img id="imgurl" src="/images/placeholder.jpg">
                </div>
                <h2 id="EntityName">Entity Name</h2>
                <p id="category">|category</p>
                <p title="entity" id="EntityDescription">Hello hello hello, is there anybody in there?</p>
                <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-12 partition">
              <h2 id="alt-title">The Alternatives are:</h2>
        </div>
    </div>
    <div class="row">
    <div class="col-12 alter" id="EntityAlternatives"><div class="col-2"></div>
    </div>  
        <div class="col-2"></div>

        <input type="button" class="edit" value="Edit">
        <br>
        <br>
        <input type="submit" class="submit" value="Submit">

  </div>
