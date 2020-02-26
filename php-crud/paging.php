<?php 
echo "<ul class='pagination pull-left margin-zero mt0'>"
// First page button will be hear
if( $page>1 ) {
	$prev_page = $page-1;
	echo "<li>";
		echo "<a href='{$page_url}page={$prev_page}'>";
			echo "<span style='margin:0.5em;'>&laquo;</span>";
		echo "</a>";
	echo "</li>";
}

// Clickable page numbers will be here
// Find out total pages
$total_pages = ceil($total_rows/$records_per_page);
// Range of num links to show
$range = 1;
//Display links to 'rang of pages' around 'current page'
$initital_num = $page-$range;

// Last page button will be here
echo "</ul>"
 ?>