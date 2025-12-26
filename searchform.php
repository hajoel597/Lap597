<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <span class="panel-search-icon material-symbols-outlined">
        search
    </span>
    <input type="search" class="search-field" placeholder="검색어 입력" value="<?php echo get_search_query(); ?>" name="s" />

</form>