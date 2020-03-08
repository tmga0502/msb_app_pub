<div class="row">
  <div class="col-lg-12">
    <nav role="navigation" class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">検索</a>
        </div>
        <div id="bs-example-navbar-collapse-2" class="collapse navbar-collapse">
            <form action="{{ route('c_data.prospect_search') }}" method="POST" role="search" class="navbar-form navbar-left">
              @csrf
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-group">
                <!-- form.apply_year --><!-- form.apply_month -->
                <input type="month" class="form-control" name="search">

              </div>
              &nbsp;
              <button type="submit" name="serch" class="btn btn-blue">表示</button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" name="clear" class="btn btn-blue">クリア</button>
            </form>
        </div>
      </div>
    </nav>
  </div>
</div>
