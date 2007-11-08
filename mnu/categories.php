#!/usr/bin/php5-cgi -q
<?php

header('Content-type: text/plain');

echo "/* This file was automatically generated by categories.php */\n";

echo "\n/* Main Categories */\n";
require('table-extractor.php');
$tableP = new tableExtractor();
$tableP->anchor = '<div class="informaltable">';
$tableP->source = file_get_contents('http://standards.freedesktop.org/menu-spec/latest/apa.html');
foreach($tableP->extractTable() as $row) {
	if(is_numeric(substr($row['Main Category'],0,1))) continue;
	echo 'Menu *'.$row['Main Category']." = NULL;\n";
}

echo "\n/* Additional Categories */\n";
$tableA = new tableExtractor();
$tableA->anchor = 'Additional Category';
$tableA->source = file_get_contents('http://standards.freedesktop.org/menu-spec/latest/apa.html');
foreach($tableA->extractTable() as $row) {
	if(is_numeric(substr($row['Additional Category'],0,1))) continue;
        echo 'Menu *'.$row['Additional Category'].' = NULL; /* With '.$row['Related Categories']." */\n";
}

echo "\n/* FUNCTION */\n";
echo "void add_to_cat(char *cat, MenuItem *item) {\n";
echo "\tMenu *this_node;\n";
echo "\tDYNAMIC_STRUCT(this_node);\n";
echo "\tthis_node->item = item;\n";
echo "\n\t/* Main Categories */\n";
foreach($tableP->extractTable() as $row) {
	if(is_numeric(substr($row['Main Category'],0,1))) continue;
	echo "\t".'ADD_IF_CAT_P(cat,this_node,'.$row['Main Category'].");\n";
}
echo "\n\t/* Additional Categories */\n";
foreach($tableA->extractTable() as $row) {
	if(is_numeric(substr($row['Additional Category'],0,1))) continue;
	echo "\t".'ADD_IF_CAT_A(cat,this_node,'.$row['Additional Category'].");\n";
}
echo "\n}\n";
?>