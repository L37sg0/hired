<form class="me-2"
      role="search"
      action="{{request()->url()}}"
      method="post">
    @csrf
    <input name="search"
           class="form-control"
           type="search"
           placeholder="{{__('Search')}}"
           aria-label="Search">
</form>
