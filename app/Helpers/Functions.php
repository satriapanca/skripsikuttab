<?php

function get_menu()
{
	$menu = \App\Mainmenu::where('parent_id', 0)->get();
	foreach ($menu as $key) {
		get_menu_child($key->id);
	}
}

function get_menu_child($parent = 0)
{
	$menu = \App\Mainmenu::where('parent_id', $parent)->get();
	$parent = \App\Mainmenu::where('id', $parent)->first();
	echo '<li class="' .(sizeof($menu) > 0 ? 'treeview' : ''). ' ' .(request()->is($parent->url.'*') ? 'active' : ''). '">';
		echo '<a href="' .url($parent->url). '">';
			echo '<i class="' .$parent->icon. '"></i>';
			echo '<span>' .$parent->nama. '</span>';
			if (sizeof($menu) > 0) {
				echo '<i class="fa fa-angle-left pull-right"></i>';
			}
		echo '</a>';
		if (sizeof($menu) > 0) {
			echo '<ul class="treeview-menu">';
			foreach ($menu as $key) {
				get_menu_child($key->id);
			}
			echo '</ul>';
		}
	echo '</li>';
}