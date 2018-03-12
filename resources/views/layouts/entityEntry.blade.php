<div>

  <div class="row ">
    <div class="col-2"></div>
    <div class="col-8 user-form">
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
      <input type="button" value="Done">
      <br>
      <br>
      <br>
      <hr>
    </div>
    <div class="col-2"></div>
  </div>



  <div class="row user-form1" >
    <div class="col-2"></div>
    <div class="col-8">
      Select Image Upload Type:<br><br>
      <input type="radio" id="img-url" name="Image-select" >Link
      &nbsp;
      <input type="radio"  id="img-file" name="Image-select" >File Upload
      <br>
      <br>
      <div id="image-url" style="display:none">
          <input type="url" placeholder="Enter URL" title="Enter the Image URL">
      </div>

      <div id="image-file" style="display:none">
          <input type="file" title="Select the Image Path ">
      </div>
      <br>
      <input type="submit" id="submit" value="Submit">
      </form>
    </div>
  </div>

</div>
