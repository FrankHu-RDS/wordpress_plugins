<?php

	$hamburger_layer_width = get_option('dtb_customize_hamburger_layer_width', '20');
	$hamburger_layer_height = get_option('dtb_customize_hamburger_layer_height', '2');
	$hamburger_layer_spacing = get_option('dtb_customize_hamburger_layer_spacing', '4');
	$hamburger_border_radius = get_option('dtb_customize_hamburger_border_radius', '2');

$y_offset = $hamburger_layer_spacing + $hamburger_layer_height;


if ($dtb_enable_hamburger_icon != '') { ?>

.et_toggle_slide_menu:after {display:none;}
.mobile_menu_bar {
	width: <?php echo esc_html($hamburger_layer_width+10);?>px;
	height: <?php echo esc_html($hamburger_layer_height * 3 + $hamburger_layer_spacing * 2);?>px;
	box-sizing: content-box;
	min-height:<?php echo esc_html(($hamburger_layer_height * 3 + $hamburger_layer_spacing * 2) + 10);?>px;
}
.mobile_menu_bar:before {display:none;}
.dtb-hamburger {
	padding: 5px;
	display: inline-block;
	cursor: pointer;
	position:absolute;
	top:0;
	right:0;
	transition-property: opacity, filter;
	transition-duration: 0.15s;
	transition-timing-function: linear;
}
.dtb-hamburger:hover {opacity: 1;}

.dtb-hamburger {
	font: inherit;
	color: inherit;
	text-transform: none;
	background-color: transparent;
	border: 0;
	margin: 0;
	overflow: visible;
}
.dtb-hamburger-box {
	width: <?php echo esc_html($hamburger_layer_width);?>px;
	height: <?php echo esc_html($hamburger_layer_height * 3 + $hamburger_layer_spacing * 2);?>px;
	display: inline-block;
	position: relative;
}
.dtb-hamburger-inner {
	display: block;
	top: 50%;
	margin-top: <?php echo esc_html($hamburger_layer_height / -2);?>px ;
}
.dtb-hamburger-inner,
.dtb-hamburger-inner::before,
.dtb-hamburger-inner::after {
	width: <?php echo esc_html($hamburger_layer_width);?>px;
	height: <?php echo esc_html($hamburger_layer_height);?>px;
	background-color: <?php echo esc_html($dtb_hamburger_color);?>;
	border-radius: <?php echo esc_html($hamburger_border_radius);?>px;
	position: absolute;
	transition-property: transform;
	transition-duration: 0.15s;
	transition-timing-function: ease;
	}

.mobile_menu_bar:hover .dtb-hamburger-inner,
.mobile_menu_bar:hover .dtb-hamburger-inner::before,
.mobile_menu_bar:hover .dtb-hamburger-inner::after{
	background-color: <?php echo esc_html($dtb_hamburger_color_hover);?>;
}
.hamburger_menu_icon-toggled .dtb-hamburger-inner,
.hamburger_menu_icon-toggled .dtb-hamburger-inner::before,
.hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
	background-color: <?php echo esc_html($dtb_hamburger_color_open);?>;
}

.hamburger_menu_icon-toggled:hover .dtb-hamburger-inner,
.hamburger_menu_icon-toggled:hover .dtb-hamburger-inner::before,
.hamburger_menu_icon-toggled:hover .dtb-hamburger-inner::after {
	background-color: <?php echo esc_html($dtb_hamburger_color_open_hover);?>;
}

.dtb-hamburger-inner::before,
.dtb-hamburger-inner::after {
	content: "";
	display: block;
	}

.dtb-hamburger-inner::before {
	top: <?php echo esc_html(($hamburger_layer_spacing + $hamburger_layer_height) * -1);?>px;
	}

.dtb-hamburger-inner::after {
	bottom: <?php echo esc_html(($hamburger_layer_spacing + $hamburger_layer_height) * -1);?>px;
	}

	<?php if ($dtb_hamburger_icon == 'none') { ?>
		/* none */
		.hamburger_none .dtb-hamburger-inner,
		.hamburger_none .dtb-hamburger-inner::before,
		.hamburger_none .dtb-hamburger-inner::after {
			transition-property: none;
		}
		.hamburger_none .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: rotate(45deg);
		}
		.hamburger_none .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			top: 0;
			opacity: 0;
		}
		.hamburger_none .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			bottom: 0;
			transform: rotate(-90deg);
		}
	<?php } ?>
	
	<?php if ($dtb_hamburger_icon == 'menu_icon1') { ?>
		/* slider */
		.hamburger_menu_icon1 .dtb-hamburger-inner {
			top: <?php echo esc_html($hamburger_layer_height / 2);?>px;
		}
		.hamburger_menu_icon1 .dtb-hamburger-inner::before {
			top: <?php echo esc_html($hamburger_layer_height + $hamburger_layer_spacing);?>px;
			transition-property: transform, opacity;
			transition-timing-function: ease;
			transition-duration: 0.15s;
		}
		.hamburger_menu_icon1 .dtb-hamburger-inner::after {
			top: <?php echo esc_html(($hamburger_layer_height * 2) + ($hamburger_layer_spacing * 2));?>px;
		}
		.hamburger_menu_icon1 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: translate3d(0, <?php echo esc_html($y_offset . 'px')?>, 0) rotate(45deg);
		}
		.hamburger_menu_icon1 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			transform: rotate(-45deg) translate3d(<?php echo esc_html($hamburger_layer_width / -7);?>px, <?php echo esc_html($hamburger_layer_spacing * -1);?>px, 0);
			opacity: 0;
		}
		.hamburger_menu_icon1 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			transform: translate3d(0, <?php echo esc_html($y_offset * -2)?>px, 0) rotate(-90deg);
		}
	<?php } ?>
	
	<?php if ($dtb_hamburger_icon == 'menu_icon2') { ?>
		/* collapse-r */
		.hamburger_menu_icon2 .dtb-hamburger-inner {
			top: auto;
			bottom: 0;
			transition-duration: 0.13s;
			transition-delay: 0.13s;
			transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon2 .dtb-hamburger-inner::after {
			top: <?php echo esc_html(($hamburger_layer_spacing * 2 + $hamburger_layer_height * 2) * -1);?>px;
			transition: top 0.2s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), opacity 0.1s linear;
		}
		.hamburger_menu_icon2 .dtb-hamburger-inner::before {
			transition: top 0.12s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), transform 0.13s cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon2 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: translate3d(0, <?php echo esc_html(($hamburger_layer_spacing + $hamburger_layer_spacing) * -1);?>px, 0) rotate(45deg);
			transition-delay: 0.22s;
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}
		.hamburger_menu_icon2 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			top: 0;
			opacity: 0;
			transition: top 0.2s cubic-bezier(0.33333, 0, 0.66667, 0.33333), opacity 0.1s 0.22s linear;
		}
		.hamburger_menu_icon2 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			top: 0;
			transform: rotate(90deg);
			transition: top 0.1s 0.16s cubic-bezier(0.33333, 0, 0.66667, 0.33333), transform 0.13s 0.25s cubic-bezier(0.215, 0.61, 0.355, 1);
		}
	<?php } ?>
	
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon3') { ?>
		/* elastic */
		.hamburger_menu_icon3 .dtb-hamburger-inner {
			top: <?php echo esc_html($hamburger_layer_height / 2);?>px;
			transition-duration: 0.275s;
			transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
		}
		.hamburger_menu_icon3 .dtb-hamburger-inner::before {
			top: <?php echo esc_html($hamburger_layer_spacing + $hamburger_layer_height);?>px;
			transition: opacity 0.125s 0.275s ease;
		}
		.hamburger_menu_icon3 .dtb-hamburger-inner::after {
			top: <?php echo esc_html(($hamburger_layer_height * 2) + ($hamburger_layer_spacing * 2));?>px;
			transition: transform 0.275s cubic-bezier(0.68, -0.55, 0.265, 1.55);
		}
		.hamburger_menu_icon3 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: translate3d(0, <?php echo esc_html($y_offset . 'px')?>, 0) rotate(135deg);
			transition-delay: 0.075s;
		}
		.hamburger_menu_icon3 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			transition-delay: 0s;
			opacity: 0;
		}
		.hamburger_menu_icon3 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			transform: translate3d(0, <?php echo esc_html(($y_offset * -2) . 'px')?>, 0) rotate(-270deg);
			transition-delay: 0.075s;
		}
	
	<?php } ?>
	
	<?php if ($dtb_hamburger_icon == 'menu_icon4') { ?>
		/* Emphatic	*/
		.hamburger_menu_icon4 .dtb-hamburger {
			overflow: hidden;
		}
		.hamburger_menu_icon4 .dtb-hamburger-inner {
			transition: background-color 0.125s 0.175s ease-in;
		}
		.hamburger_menu_icon4 .dtb-hamburger-inner::before {
			left: 0;
			transition: transform 0.125s cubic-bezier(0.6, 0.04, 0.98, 0.335), top 0.05s 0.125s linear;
		}
		.hamburger_menu_icon4 .dtb-hamburger-inner::after {
			top: <?php echo esc_html($y_offset)?>px;
			right: 0;
			transition: transform 0.125s cubic-bezier(0.6, 0.04, 0.98, 0.335), top 0.05s 0.125s linear, right 0.125s 0.175s ease-in;
		}
		.hamburger_menu_icon4 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transition-delay: 0s;
			transition-timing-function: ease-out;
			background-color: transparent !important;
		}
		.hamburger_menu_icon4 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			left: <?php echo esc_html($hamburger_layer_width * -2)?>px;
			top: <?php echo esc_html($hamburger_layer_width * -2)?>px;
			transform: translate3d(<?php echo esc_html($hamburger_layer_width * 2)?>px,	<?php echo esc_html($hamburger_layer_width * 2)?>px, 0) rotate(45deg);
			transition: left 0.125s ease-out, top 0.05s 0.125s linear, transform 0.125s 0.175s cubic-bezier(0.075, 0.82, 0.165, 1);
		}
		.hamburger_menu_icon4 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			right: <?php echo esc_html($hamburger_layer_width * -2)?>px;
			top: <?php echo esc_html($hamburger_layer_width * -2)?>px;
			transform: translate3d(<?php echo esc_html($hamburger_layer_width * -2)?>px,	<?php echo esc_html($hamburger_layer_width * 2)?>px, 0) rotate(-45deg);
			transition: right 0.125s ease-out, top 0.05s 0.125s linear, transform 0.125s 0.175s cubic-bezier(0.075, 0.82, 0.165, 1);
		}
	<?php } ?>
	
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon5') { ?>
		/* Spin */
		.hamburger_menu_icon5 .dtb-hamburger-inner {
			transition-duration: 0.22s;
			transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon5 .dtb-hamburger-inner::before {
			transition: top 0.1s 0.25s ease-in, opacity 0.1s ease-in;
		}
		.hamburger_menu_icon5 .dtb-hamburger-inner::after {
			transition: bottom 0.1s 0.25s ease-in, transform 0.22s cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon5 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: rotate(225deg);
			transition-delay: 0.12s;
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}
		.hamburger_menu_icon5 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			top: 0;
			opacity: 0;
			transition: top 0.1s ease-out, opacity 0.1s 0.12s ease-out;
		}
		.hamburger_menu_icon5 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			bottom: 0;
			transform: rotate(-90deg);
			transition: bottom 0.1s ease-out, transform 0.22s 0.12s cubic-bezier(0.215, 0.61, 0.355, 1);
		}
	<?php } ?>
	
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon6') { ?>
		/* Spring Reverse */
		.hamburger_menu_icon6 .dtb-hamburger-inner {
			top: auto;
			bottom: 0;
			transition-duration: 0.13s;
			transition-delay: 0s;
			transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon6 .dtb-hamburger-inner::after {
			top: <?php echo esc_html(($hamburger_layer_spacing * 2 + $hamburger_layer_height * 2) * -1);?>px;
			transition: top 0.2s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), opacity 0s linear;
		}
		.hamburger_menu_icon6 .dtb-hamburger-inner::before {
			transition: top 0.1s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), transform 0.13s cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon6 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: translate3d(0, <?php echo esc_html(($hamburger_layer_spacing + $hamburger_layer_height) * -1);?>px, 0) rotate(-45deg);
			transition-delay: 0.22s;
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}
		.hamburger_menu_icon6 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			top: 0;
			opacity: 0;
			transition: top 0.2s cubic-bezier(0.33333, 0, 0.66667, 0.33333), opacity 0s 0.22s linear;
		}
		.hamburger_menu_icon6 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			top: 0;
			transform: rotate(90deg);
			transition: top 0.1s 0.15s cubic-bezier(0.33333, 0, 0.66667, 0.33333), transform 0.13s 0.22s cubic-bezier(0.215, 0.61, 0.355, 1);
		}
		
	<?php } ?>
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon7') { ?>	
		/* Squeeze */
		.hamburger_menu_icon7 .dtb-hamburger-inner {
			transition-duration: 0.075s;
			transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon7 .dtb-hamburger-inner::before {
			transition: top 0.075s 0.12s ease, opacity 0.075s ease;
		}
		.hamburger_menu_icon7 .dtb-hamburger-inner::after {
			transition: bottom 0.075s 0.12s ease, transform 0.075s cubic-bezier(0.55, 0.055, 0.675, 0.19);
		}
		.hamburger_menu_icon7 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			transform: rotate(45deg);
			transition-delay: 0.12s;
			transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}
		.hamburger_menu_icon7 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			top: 0;
			opacity: 0;
			transition: top 0.075s ease, opacity 0.075s 0.12s ease;
		}
		.hamburger_menu_icon7 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			bottom: 0;
			transform: rotate(-90deg);
			transition: bottom 0.075s ease, transform 0.075s 0.12s cubic-bezier(0.215, 0.61, 0.355, 1);
		}
	
	<?php } ?>
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon8') { ?>
		/* 3DX */
		.hamburger_menu_icon8 .dtb-hamburger-box {
			perspective: <?php echo esc_html($hamburger_layer_width * 2);?>px;
		}
		.hamburger_menu_icon8 .dtb-hamburger-inner {
			transition: transform 0.15s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0s 0.1s cubic-bezier(0.645, 0.045, 0.355, 1);
		}
		.hamburger_menu_icon8 .dtb-hamburger-inner::before,
		.hamburger_menu_icon8 .dtb-hamburger-inner::after {
			transition: transform 0s 0.1s cubic-bezier(0.645, 0.045, 0.355, 1);
		}
		.hamburger_menu_icon8 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			background-color: transparent !important;
			transform: rotateY(180deg);
		}
		.hamburger_menu_icon8 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			transform: translate3d(0, <?php echo esc_html($y_offset . 'px')?>, 0) rotate(45deg);
		}
		.hamburger_menu_icon8 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			transform: translate3d(0, <?php echo esc_html(($y_offset * -1) . 'px')?>, 0) rotate(-45deg);
		}
	
	<?php } ?>
	
	
	<?php if ($dtb_hamburger_icon == 'menu_icon9') { ?>
		/* 3DY */
		.hamburger_menu_icon9 .dtb-hamburger-box {
			perspective: <?php echo esc_html($hamburger_layer_width * 2);?>px;
		}
		.hamburger_menu_icon9 .hamburger-inner {
			transition: transform 0.15s cubic-bezier(0.645, 0.045, 0.355, 1), background-color 0s 0.1s cubic-bezier(0.645, 0.045, 0.355, 1);
		}
		.hamburger_menu_icon9 .hamburger-inner::before,
		.hamburger_menu_icon9 .hamburger-inner::after {
			transition: transform 0s 0.1s cubic-bezier(0.645, 0.045, 0.355, 1);
		}
		.hamburger_menu_icon9 .hamburger_menu_icon-toggled .dtb-hamburger-inner {
			background-color: transparent !important;
			transform: rotateX(-180deg);
		}
		.hamburger_menu_icon9 .hamburger_menu_icon-toggled .dtb-hamburger-inner::before {
			transform: translate3d(0, <?php echo esc_html($y_offset . 'px')?>, 0) rotate(45deg);
		}
		.hamburger_menu_icon9 .hamburger_menu_icon-toggled .dtb-hamburger-inner::after {
			transform: translate3d(0, <?php echo esc_html(($y_offset * -1) . 'px')?>, 0) rotate(-45deg);
		}
	<?php } ?>

<?php }