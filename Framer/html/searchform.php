<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 ?>




<form role="search" method="get" class="selectable-form" id="searchform" action="<?php echo home_url( '/' ); ?>">
<input type="text" name="s" id="s" placeholder="Enter Keyword.."/>
<select name="post_type" id="search-select">
	<option value="default">Choose Category:</option>
	<option value="post">Post </option>
	<option value="page">Pages</option>
	<option value="product">Products</option>
</select>
<button class="btn btn-secondary" disabled="disabled" type="submit" id="searchsubmit"  />Search<button>
</form>
