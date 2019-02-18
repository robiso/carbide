<?php
	function newEditableArea() {
		// Check if the newEditableArea area is already exists, if not, create it
		if (empty(wCMS::get('blocks','newEditableArea'))) {
			wCMS::set('blocks','newEditableArea', 'content', 'Your content here.');
		}

		// Fetch the value of the newEditableArea from database
		$value = wCMS::get('blocks','newEditableArea','content');

		// If value is empty, let's put something in it by default
		if (empty($value)) {
			$value = 'Empty content';
		}
		if (wCMS::$loggedIn) {
			// If logged in, return block in editable mode
			return wCMS::block('newEditableArea');
		}

		// If not logged in, return block in non-editable mode
		return $value;
	}
?>