<?php

	$css_columns_mobile = dtb_get_option('css_columns_mobile');
	$css_columns_mobile_width = dtb_get_option('css_columns_mobile_width');
	$dtb_tablet_breakpoint = dtb_get_option('dtb_tablet_breakpoint', 980) ?: '980';
	$dtb_phone_breakpoint = dtb_get_option('dtb_phone_breakpoint', 479) ?: '980';

?>

<?php if ($css_columns_mobile =='1') { ?>

@media (min-width:<?php echo esc_html($dtb_phone_breakpoint+1 . 'px');?>) and (max-width:<?php echo esc_html($dtb_tablet_breakpoint . 'px');?>) {
	.tablet-two-cols>.et_pb_column {width:47.25%!important; margin-right:5.5%!important;}
	.tablet-two-cols.et_pb_gutters4>.et_pb_column {width:45%!important; margin-right:10%!important;}
	.tablet-two-cols.et_pb_gutters2>.et_pb_column {width:49%!important; margin-right:2%!important;}
	.tablet-two-cols.et_pb_gutters1>.et_pb_column {width:50%!important; margin-right:0!important;}
	.tablet-two-cols>.et_pb_column:nth-child(2n+2) {margin-right:0!important}
	
	.tablet-three-cols>.et_pb_column {width:30%!important; margin-right:5%!important;}
	.tablet-three-cols.et_pb_gutters4>.et_pb_column {width:27.25%!important; margin-right:9.125%!important;}
	.tablet-three-cols.et_pb_gutters2>.et_pb_column {width:31.25%!important; margin-right:3.125%!important;}
	.tablet-three-cols.et_pb_gutters1>.et_pb_column {width:33.33%!important; margin-right:0!important;}
	.tablet-three-cols>.et_pb_column:nth-child(3n+3) {margin-right:0!important}
	
	.tablet-four-cols>.et_pb_column {width:22.75%!important; margin-right:3%!important;}
	.tablet-four-cols.et_pb_gutters4>.et_pb_column {width:21.25%!important; margin-right:5%!important;}
	.tablet-four-cols.et_pb_gutters2>.et_pb_column {width:23.5%!important; margin-right:2%!important;}
	.tablet-four-cols.et_pb_gutters1>.et_pb_column {width:25%!important; margin-right:0!important;}
	.tablet-four-cols>.et_pb_column:nth-child(4n+4) {margin-right:0!important}
	
	.tablet-five-cols>.et_pb_column {width:18.5%!important; margin-right:1.875%!important;}
	.tablet-five-cols.et_pb_gutters4>.et_pb_column {width:18%!important; margin-right:2.5%!important;}
	.tablet-five-cols.et_pb_gutters2>.et_pb_column {width:19%!important; margin-right:1.25%!important;}
	.tablet-five-cols.et_pb_gutters1>.et_pb_column {width:20%!important; margin-right:0!important;}
	.tablet-five-cols>.et_pb_column:nth-child(5n+5) {margin-right:0!important}
	
	.tablet-six-cols>.et_pb_column {width:15.5%!important; margin-right:1.4%!important;}
	.tablet-six-cols.et_pb_gutters4>.et_pb_column {width:15%!important; margin-right:2%!important;}
	.tablet-six-cols.et_pb_gutters2>.et_pb_column {width:16%!important; margin-right:0.8%!important;}
	.tablet-six-cols.et_pb_gutters1>.et_pb_column {width:16.66%!important; margin-right:0!important;}
	.tablet-six-cols>.et_pb_column:nth-child(6n+6) {margin-right:0!important}
	
	<?php if ($css_columns_mobile_width =='1') { ?>
	
		.tablet-2cols-1-2>.et_pb_column:nth-child(odd) {width:30%!important; margin-right:5%!important;}
		.tablet-2cols-1-2>.et_pb_column:nth-child(even) {width:65%!important; margin-right:0!important;}
		.tablet-2cols-1-2.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:27.25%!important; margin-right:9.125%!important;}
		.tablet-2cols-1-2.et_pb_gutters4>.et_pb_column:nth-child(even) {width:63.625%!important; margin-right:0!important;}
		.tablet-2cols-1-2.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:31.25%!important; margin-right:3.125%!important;}
		.tablet-2cols-1-2.et_pb_gutters2>.et_pb_column:nth-child(even) {width:65.625%!important; margin-right:0!important;}
		.tablet-2cols-1-2.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:33.333%!important; margin-right:0!important;}
		.tablet-2cols-1-2.et_pb_gutters1>.et_pb_column:nth-child(even) {width:66.666%!important; margin-right:0!important;}
		.tablet-2cols-1-2>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		
		.tablet-2cols-2-1>.et_pb_column:nth-child(odd) {width:65%!important; margin-right:5%!important;}
		.tablet-2cols-2-1>.et_pb_column:nth-child(even) {width:30%!important; margin-right:0!important;}
		.tablet-2cols-2-1.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:63.625%!important; margin-right:9.125%!important;}
		.tablet-2cols-2-1.et_pb_gutters4>.et_pb_column:nth-child(even) {width:27.25%!important; margin-right:0!important;}
		.tablet-2cols-2-1.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:65.625%!important; margin-right:3.125%!important;}
		.tablet-2cols-2-1.et_pb_gutters2>.et_pb_column:nth-child(even) {width:31.25%!important; margin-right:0!important;}
		.tablet-2cols-2-1.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:66.666%!important; margin-right:0!important;}
		.tablet-2cols-2-1.et_pb_gutters1>.et_pb_column:nth-child(even) {width:33.333%!important; margin-right:0!important;}
		.tablet-2cols-2-1>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		.tablet-2cols-1-3>.et_pb_column:nth-child(odd) {width:22.75%!important; margin-right:3%!important;}
		.tablet-2cols-1-3>.et_pb_column:nth-child(even) {width:74.25%!important; margin-right:0!important;}
		.tablet-2cols-1-3.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:21.25%!important; margin-right:5%!important;}
		.tablet-2cols-1-3.et_pb_gutters4>.et_pb_column:nth-child(even) {width:73.75%!important; margin-right:0!important;}
		.tablet-2cols-1-3.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:23.5%!important; margin-right:2%!important;}
		.tablet-2cols-1-3.et_pb_gutters2>.et_pb_column:nth-child(even) {width:74.5%!important; margin-right:0!important;}
		.tablet-2cols-1-3.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:25%!important; margin-right:0!important;}
		.tablet-2cols-1-3.et_pb_gutters1>.et_pb_column:nth-child(even) {width:75%!important; margin-right:0!important;}
		.tablet-2cols-1-3>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		.tablet-2cols-3-1>.et_pb_column:nth-child(odd) {width:74.25%!important; margin-right:3%!important;}
		.tablet-2cols-3-1>.et_pb_column:nth-child(even) {width:22.75%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:73.75%!important; margin-right:5%!important;}
		.tablet-2cols-3-1.et_pb_gutters4>.et_pb_column:nth-child(even) {width:21.25%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:74.5%!important; margin-right:2%!important;}
		.tablet-2cols-3-1.et_pb_gutters2>.et_pb_column:nth-child(even) {width:23.5%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:75%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters1>.et_pb_column:nth-child(even) {width:25%!important; margin-right:0!important;}
		.tablet-2cols-3-1>.et_pb_column:nth-child(2n+3) {clear:both;}
	
	<?php } ?>
}
@media (max-width:<?php echo esc_html($dtb_phone_breakpoint . 'px');?>) {
	.phone-two-cols>.et_pb_column,
	.et-db #et-boc .et-l .phone-two-cols.et_pb_row>.et_pb_column {width:47.25%!important; margin-right:5.5%!important;}
	.phone-two-cols.et_pb_gutters4>.et_pb_column,
	.et-db #et-boc .et-l .phone-two-cols.et_pb_row.et_pb_gutters4>.et_pb_column {width:45%!important; margin-right:10%!important;}
	.phone-two-cols.et_pb_gutters2>.et_pb_column,
	.et-db #et-boc .et-l .phone-two-cols.et_pb_row.et_pb_gutters2>.et_pb_column  {width:49%!important; margin-right:2%!important;}
	.phone-two-cols.et_pb_gutters1>.et_pb_column,
	.et-db #et-boc .et-l .phone-two-cols.et_pb_row.et_pb_gutters1>.et_pb_column  {width:50%!important; margin-right:0!important;}
	.phone-two-cols>.et_pb_column:nth-child(2n+2),
	.et-db #et-boc .et-l .phone-two-cols.et_pb_row>.et_pb_column:nth-child(2n+2)  {margin-right:0!important}
	
	.phone-three-cols>.et_pb_column,
	.et-db #et-boc .et-l .phone-three-cols.et_pb_row>.et_pb_column {width:30%!important; margin-right:5%!important;}
	.phone-three-cols.et_pb_gutters4>.et_pb_column,
	.et-db #et-boc .et-l .phone-three-cols.et_pb_row.et_pb_gutters4>.et_pb_column {width:27.25%!important; margin-right:9.125%!important;}
	.phone-three-cols.et_pb_gutters2>.et_pb_column,
	.et-db #et-boc .et-l .phone-three-cols.et_pb_row.et_pb_gutters2>.et_pb_column {width:31.25%!important; margin-right:3.125%!important;}
	.phone-three-cols.et_pb_gutters1>.et_pb_column,
	.et-db #et-boc .et-l .phone-three-cols.et_pb_row.et_pb_gutters1>.et_pb_column {width:33.33%!important; margin-right:0!important;}
	.phone-three-cols>.et_pb_column:nth-child(3n+3),
	.et-db #et-boc .et-l .phone-three-cols.et_pb_row>.et_pb_column:nth-child(3n+3) {margin-right:0!important}
	
	.phone-four-cols>.et_pb_column,
	.et-db #et-boc .et-l .phone-four-cols.et_pb_row>.et_pb_column {width:22.75%!important; margin-right:3%!important;}
	.phone-four-cols.et_pb_gutters4>.et_pb_column,
	.et-db #et-boc .et-l .phone-four-cols.et_pb_row.et_pb_gutters4>.et_pb_column {width:21.25%!important; margin-right:5%!important;}
	.phone-four-cols.et_pb_gutters2>.et_pb_column,
	.et-db #et-boc .et-l .phone-four-cols.et_pb_row.et_pb_gutters2>.et_pb_column {width:23.5%!important; margin-right:2%!important;}
	.phone-four-cols.et_pb_gutters1>.et_pb_column,
	.et-db #et-boc .et-l .phone-four-cols.et_pb_row.et_pb_gutters1>.et_pb_column {width:25%!important; margin-right:0!important;}
	.phone-four-cols>.et_pb_column:nth-child(4n+4),
	.et-db #et-boc .et-l .phone-four-cols.et_pb_row>.et_pb_column:nth-child(4n+4) {margin-right:0!important}
	
	<?php if ($css_columns_mobile_width =='1') { ?>
	
		.phone-2cols-1-2>.et_pb_column:nth-child(odd) {width:30%!important; margin-right:5%!important;}
		.phone-2cols-1-2>.et_pb_column:nth-child(even) {width:65%!important; margin-right:0!important;}
		.phone-2cols-1-2.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:27.25%!important; margin-right:9.125%!important;}
		.phone-2cols-1-2.et_pb_gutters4>.et_pb_column:nth-child(even) {width:63.625%!important; margin-right:0!important;}
		.phone-2cols-1-2.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:31.25%!important; margin-right:3.125%!important;}
		.phone-2cols-1-2.et_pb_gutters2>.et_pb_column:nth-child(even) {width:65.625%!important; margin-right:0!important;}
		.phone-2cols-1-2.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:33.333%!important; margin-right:0!important;}
		.phone-2cols-1-2.et_pb_gutters1>.et_pb_column:nth-child(even) {width:66.666%!important; margin-right:0!important;}
		.phone-2cols-1-2>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		.phone-2cols-2-1>.et_pb_column:nth-child(odd) {width:65%!important; margin-right:5%!important;}
		.phone-2cols-2-1>.et_pb_column:nth-child(even) {width:30%!important; margin-right:0!important;}
		.phone-2cols-2-1.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:63.625%!important; margin-right:9.125%!important;}
		.phone-2cols-2-1.et_pb_gutters4>.et_pb_column:nth-child(even) {width:27.25%!important; margin-right:0!important;}
		.phone-2cols-2-1.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:65.625%!important; margin-right:3.125%!important;}
		.phone-2cols-2-1.et_pb_gutters2>.et_pb_column:nth-child(even) {width:31.25%!important; margin-right:0!important;}
		.phone-2cols-2-1.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:66.666%!important; margin-right:0!important;}
		.phone-2cols-2-1.et_pb_gutters1>.et_pb_column:nth-child(even) {width:33.333%!important; margin-right:0!important;}
		.phone-2cols-2-1>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		.phone-2cols-1-3>.et_pb_column:nth-child(odd) {width:22.75%!important; margin-right:3%!important;}
		.phone-2cols-1-3>.et_pb_column:nth-child(even) {width:74.25%!important; margin-right:0!important;}
		.phone-2cols-1-3.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:21.25%!important; margin-right:5%!important;}
		.phone-2cols-1-3.et_pb_gutters4>.et_pb_column:nth-child(even) {width:73.75%!important; margin-right:0!important;}
		.phone-2cols-1-3.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:23.5%!important; margin-right:2%!important;}
		.phone-2cols-1-3.et_pb_gutters2>.et_pb_column:nth-child(even) {width:74.5%!important; margin-right:0!important;}
		.phone-2cols-1-3.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:25%!important; margin-right:0!important;}
		.phone-2cols-1-3.et_pb_gutters1>.et_pb_column:nth-child(even) {width:75%!important; margin-right:0!important;}
		.phone-2cols-1-3>.et_pb_column:nth-child(2n+3) {clear:both;}
		
		.tablet-2cols-3-1>.et_pb_column:nth-child(odd) {width:74.25%!important; margin-right:3%!important;}
		.tablet-2cols-3-1>.et_pb_column:nth-child(even) {width:22.75%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters4>.et_pb_column:nth-child(odd) {width:73.75%!important; margin-right:5%!important;}
		.tablet-2cols-3-1.et_pb_gutters4>.et_pb_column:nth-child(even) {width:21.25%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters2>.et_pb_column:nth-child(odd) {width:74.5%!important; margin-right:2%!important;}
		.tablet-2cols-3-1.et_pb_gutters2>.et_pb_column:nth-child(even) {width:23.5%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters1>.et_pb_column:nth-child(odd) {width:75%!important; margin-right:0!important;}
		.tablet-2cols-3-1.et_pb_gutters1>.et_pb_column:nth-child(even) {width:25%!important; margin-right:0!important;}
		.phone-2cols-3-1>.et_pb_column:nth-child(2n+3) {clear:both;}
	
	<?php } ?>
	
}
<?php }