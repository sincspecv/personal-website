@while(have_rows('page_modules')) @php(the_row())
  @includeIf('modules.' . get_row_layout(), array('fields' => $page_modules[get_row_index()]))
@endwhile
