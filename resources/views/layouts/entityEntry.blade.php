<div>

  <div class="row ">
    <div class="col-2"></div>
    <div class="col-8 user-form" style="display:none">
      <h3>Enter new alternative: </h3>
        <hr>
        <form method="post" action="{{ route('suggestionsInput') }}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="text" class="name" placeholder="Name (of the alternative/entity)" name="name" title="Enter the name of the product" required>
          <br>
          <textarea id="description"  placeholder="Description" name="description" title="Enter the description of the product" required></textarea>
          <br>
          <br>
          <label id="cat-label">Select category:</label><br><br>
          <select id="category-select" name="category" title="Select the category it belongs to" required>
          <option value=" " disabled selected style=""></option>
          </select>
          <div class="final-alt"></div>
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
      <br>
      <br>
      <br>
      <hr>
    </div>
    <div class="col-2"></div>
  </div>

  <div class="row user-form1" style="display:none">
    <div class="col-2"></div>
    <div class="col-8">
      Select Image Upload Type:<br><br>
      <input type="radio" id="img-url" name="Image-select" value="ImageURL" >Link
      &nbsp;
      <input type="radio"  id="img-file" name="Image-select" value="File Upload" >File Upload
      <br>
      <br>
      <div id="image-url" style="display:none">
          <input type="url" placeholder="Enter URL" title="Enter the Image URL">
      </div>

      <div id="image-file" style="display:none">
          <input type="file" title="Select the Image Path ">
      </div>
      <br>
      <input type="button" class="done" value="Done">
      </form>
    </div>
  </div>


  <div class="finalize-alt">

    <div class="row">
        <div class="col-2 element"></div>
        <div class="col-8 element">

                <div class="card-img">
                    <img src="https://d1qb2nb5cznatu.cloudfront.net/users/2009877-large?1456814117">
                </div>
                <h2>Entity Name</h2>
                <p title="entity">Hello hello hello, is there anybody in there?</p>
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
                    <h3>Name</h3>
                    <p> lolololol </p>
                    <a href="">Check out</a>
                </div>
           </div>
        </div>
        <input type="button" class="edit" value="Edit">
        <input type="submit" class="submit" value="Submit">

  </div>


</div>
