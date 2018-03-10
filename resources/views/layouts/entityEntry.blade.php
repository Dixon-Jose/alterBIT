<div>
  
  <div class="row ">
    <div class="col-2"></div>
    <div class="col-8 user-form">
        <hr>
        <form method="post" action="{{ route('suggestionsInput') }}" enctype="multipart/form-data">

            {{csrf_field()}}
          <br>
          <input type="text" class="name" placeholder="Name (of the alternative/entity)" name="name" title="Enter the name of the product" required>
          <br><h3>Enter new alternative: </h3>
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
        
      <div >
        <h3>Select alternatives: </h3>
        <div class="controlgroup">
          <input type="search" id="search" placeholder="Search">
          <select id="alternative-select" name="alt-select" required>
            <option>Select one</option>
            <option>Select with all the alternatives</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-1"></div>
        <div class="col-10 src-tags">
        </div>
      </div>

      <div class=" alter"></div>
      <input type="button" value="Done">
    </div>
    <div class="col-2"></div>
  </div>
  
  
  
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <input type="file" id="img" name="image">
      <input type="submit" id="submit" value="submit">
      </form>
    </div>
  </div>

</div>
