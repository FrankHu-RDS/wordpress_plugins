<?php

function lmp_type_filter_view( $avaliable_filters = false, $total = false ) {

	$avaliable_filters	= ( is_array( $avaliable_filters ) ) ? $avaliable_filters : lmp_api_filters();
	$type_filters		= $avaliable_filters['type'];
	$type_parameter		= $type_filters['parameter'];
	$type_old_value		= lmp_old_value($type_parameter, $type_filters['default']);

	ob_start();

		echo '<div class="filters__section type">';
			foreach( $type_filters['options'] as $option ) {

				$type_selected		= '';
				$option_label		= $option['label'];
				$option_value		= $option['value'];
				$type_input_id		= $type_parameter . '_' . $option_value;
				$item_style_classes	= array(
					'filters__item',
					'filters__item--type',
					'type__item',
					'type__item--' . $option_value
				);


				if ( $type_old_value == $option_value || is_array( $type_old_value ) && in_array($option_value, $type_old_value) ) {
					array_push($item_style_classes, 'type__item--selected');
					$type_selected	= 'checked="checked"';
				}

// @DEV ??? total is array instead of string/int.
$bug_total	= ( $total && property_exists($total, $option_value) ) ? $total->$option_value : 0;
$type_total	= ( is_array($bug_total) ) ? $bug_total[0] : $bug_total;



				echo '<div class="' . implode(' ', $item_style_classes) . '" data-value="' . $option_value . '" data-parameter="' . $type_parameter . '" data-radio-id="' . $type_input_id . '" >';
					echo '<img src="' . JIS_DIR_URI . '/assets/images/icon_' . $option_value . '.svg" alt="' . $option_label . '" class="type__image type__image--' . $option_value . '">';
					echo '<p class="filters__title type__paragraph type__title type__title--' . $option_value . '">' . $option_label . '</p>';
					echo '<p class="filters__paragraph type__paragraph type__count type__count--' . $option_value . '">';
						echo number_format_i18n($type_total);
					echo '</p>';
					echo '<input type="radio" id="' . $type_input_id . '" class="filters__radio_input" name="' . $type_parameter . '" value="' . $option_value . '" ' . $type_selected . '>';
				echo '</div>';
			}
		echo '</div>';

		$type_filter_view = ob_get_contents();

	ob_end_clean();

	return $type_filter_view;

}



function lmp_filters_view( $avaliable_filters = false, $total = false ) {

	$avaliable_filters	= ( is_array( $avaliable_filters ) ) ? $avaliable_filters : lmp_api_filters();


	ob_start();

		foreach( $avaliable_filters as $filter ) {

			if( $filter['parameter'] == 'type' )
				continue;


			$parameter		= $filter['parameter'];
			$default		= $filter['default'];
			$old_value		= lmp_old_value($parameter, $default);
			$filter_title	= $filter['title'];


			if( !empty($old_value) && $old_value !== 'all' ) {
				$current_style_class	= 'filters__current_option--active';
				$current_option_name	= $filter['options'][$old_value]['label'];
			}
			else{
				$current_style_class	= '';
				$current_option_name	= '';
			}



			echo '<div id="filter-' . $parameter . '" class="filters__section filters__section--dropdown">';

				echo '<div class="filters__header">';
					echo '<h3 class="filters__title">';
							echo '<span class="filters__parameter_name">' . $filter_title . '</span>';
							echo '<span class="filters__current_option ' . $current_style_class . '" >' . $current_option_name . '</span>';
						echo '</h3>';
					echo '<div class="filters__dropdown_btn"></div>';
				echo '</div>';

				echo '<ul class="filters__list">';
					foreach( $filter['options'] as $option ) {

						$input_selected	= '';
						$style_selected	= '';
						$option_label	= $option['label'];
						$option_value	= $option['value'];
						$input_id		= $parameter . '_' . $option_value;

						if( $old_value == $option_value || is_array( $old_value ) && in_array($option_value, $old_value) ) {
							$input_selected	= 'checked="checked"';
							$style_selected	= 'filters__item--selected';
						}


						echo '<li class="filters__item filters__item--dropdown ' . $style_selected . '" data-label="' . $option_label . '" data-value="' . $option_value . '" data-parameter="' . $parameter . '" data-radio-id="' . $input_id . '" >';
							echo '<p class="filters__paragraph filters__paragraph--' . $option_value . '">' . $option_label . '</p>';
							echo '<input type="radio" id="' . $input_id . '" class="filters__radio_input" name="' . $parameter . '" value="' . $option_value . '" ' . $input_selected . '>';
						echo '</li>';
					}
				echo '</ul>';

			echo '</div>';
		} // END foreach

		$filter_view = ob_get_contents();

	ob_end_clean();

	return $filter_view;

}

?>