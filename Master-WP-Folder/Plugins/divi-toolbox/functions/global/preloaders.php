<?php
function dtb_preloader_enable() {
    global $dtb_preloader_val,$dtb_preloader_home_val, $dtb_preloader_type_val, $dtb_preloader_type_val;
	$dtb_preloader_type_val = dtb_get_option('dtb_preloader_type', 'preloader1');
	$dtb_custom_preloader_image_val = dtb_get_option('dtb_custom_preloader_image');
	$dtb_custom_preloader_image_url_val = dtb_get_option('dtb_custom_preloader_image_url');
	$dtb_custom_preloader_image_alt_val = dtb_get_option('dtb_custom_preloader_image_alt');
?>
	<div class="preloader">
		<div class="status">
			<?php
				if($dtb_custom_preloader_image_val){
			?>
					<img class="dtb_custom_preloader_img" src=<?php echo esc_url($dtb_custom_preloader_image_url_val) ?> alt="<?php echo esc_attr($dtb_custom_preloader_image_alt_val) ?>">
			<?php
				}else{

				if ($dtb_preloader_type_val == 'preloader1') { ?>
					<style>@keyframes dtb-infinite-spinning{from{transform:rotate(0)}to{transform:rotate(360deg)}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><path style='animation:dtb-infinite-spinning 1.5s infinite linear;transform-origin:40px 40px;' d="M10 40v-1.1-1.3-.8c0-.3.1-.6.1-.9.1-.6.1-1.4.2-2.1.2-.8.3-1.6.5-2.5.2-.9.6-1.8.8-2.8.3-1 .8-1.9 1.2-3 .5-1 1.1-2 1.7-3.1.7-1 1.4-2.1 2.2-3.1 1.6-2.1 3.7-3.9 6-5.6 2.3-1.7 5-3 7.9-4.1.7-.2 1.5-.4 2.2-.7.7-.3 1.5-.3 2.3-.5.8-.2 1.5-.3 2.3-.4l1.2-.1.6-.1h.6c1.5 0 2.9-.1 4.5.2.8.1 1.6.1 2.4.3.8.2 1.5.3 2.3.5 3 .8 5.9 2 8.5 3.6 2.6 1.6 4.9 3.4 6.8 5.4 1 1 1.8 2.1 2.7 3.1.8 1.1 1.5 2.1 2.1 3.2.6 1.1 1.2 2.1 1.6 3.1.4 1 .9 2 1.2 3 .3 1 .6 1.9.8 2.7.2.9.3 1.6.5 2.4.1.4.1.7.2 1 0 .3.1.6.1.9.1.6.1 1 .1 1.4.4 1 .4 1.4.4 1.4.2 2.2-1.5 4.1-3.7 4.3s-4.1-1.5-4.3-3.7v-.7-.9-1.1-.7c0-.2-.1-.5-.1-.8-.1-.6-.1-1.2-.2-1.9s-.3-1.4-.4-2.2c-.2-.8-.5-1.6-.7-2.4-.3-.8-.7-1.7-1.1-2.6-.5-.9-.9-1.8-1.5-2.7-.6-.9-1.2-1.8-1.9-2.7-1.4-1.8-3.2-3.4-5.2-4.9-2-1.5-4.4-2.7-6.9-3.6-.6-.2-1.3-.4-1.9-.6-.7-.2-1.3-.3-1.9-.4-1.2-.3-2.8-.4-4.2-.5h-2c-.7 0-1.4.1-2.1.1-.7.1-1.4.1-2 .3-.7.1-1.3.3-2 .4-2.6.7-5.2 1.7-7.5 3.1-2.2 1.4-4.3 2.9-6 4.7-.9.8-1.6 1.8-2.4 2.7-.7.9-1.3 1.9-1.9 2.8-.5 1-1 1.9-1.4 2.8-.4.9-.8 1.8-1 2.6-.3.9-.5 1.6-.7 2.4-.2.7-.3 1.4-.4 2.1-.1.3-.1.6-.2.9 0 .3-.1.6-.1.8 0 .5-.1.9-.1 1.3-.2.7-.2 1.1-.2 1.1z"></path></svg>
				<?php	} 
				
				elseif ($dtb_preloader_type_val == 'preloader2') { ?>
					<style>@keyframes dtb-reverse-spinning{from{transform:rotate(360deg)}to{transform:rotate(0)}}@keyframes dtb-infinite-spinning{from{transform:rotate(0)}to{transform:rotate(360deg)}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><path style='animation:dtb-infinite-spinning .8s infinite linear;transform-origin:40px 40px;' d="M10 40v-1.1-1.3-.8c0-.3.1-.6.1-.9.1-.6.1-1.4.2-2.1.2-.8.3-1.6.5-2.5.2-.9.6-1.8.8-2.8.3-1 .8-1.9 1.2-3 .5-1 1.1-2 1.7-3.1.7-1 1.4-2.1 2.2-3.1 1.6-2.1 3.7-3.9 6-5.6 2.3-1.7 5-3 7.9-4.1.7-.2 1.5-.4 2.2-.7.7-.3 1.5-.3 2.3-.5.8-.2 1.5-.3 2.3-.4l1.2-.1.6-.1h.6c1.5 0 2.9-.1 4.5.2.8.1 1.6.1 2.4.3.8.2 1.5.3 2.3.5 3 .8 5.9 2 8.5 3.6 2.6 1.6 4.9 3.4 6.8 5.4 1 1 1.8 2.1 2.7 3.1.8 1.1 1.5 2.1 2.1 3.2.6 1.1 1.2 2.1 1.6 3.1.4 1 .9 2 1.2 3 .3 1 .6 1.9.8 2.7.2.9.3 1.6.5 2.4.1.4.1.7.2 1 0 .3.1.6.1.9.1.6.1 1 .1 1.4.4 1 .4 1.4.4 1.4.2 2.2-1.5 4.1-3.7 4.3s-4.1-1.5-4.3-3.7v-.7-.9-1.1-.7c0-.2-.1-.5-.1-.8-.1-.6-.1-1.2-.2-1.9s-.3-1.4-.4-2.2c-.2-.8-.5-1.6-.7-2.4-.3-.8-.7-1.7-1.1-2.6-.5-.9-.9-1.8-1.5-2.7-.6-.9-1.2-1.8-1.9-2.7-1.4-1.8-3.2-3.4-5.2-4.9-2-1.5-4.4-2.7-6.9-3.6-.6-.2-1.3-.4-1.9-.6-.7-.2-1.3-.3-1.9-.4-1.2-.3-2.8-.4-4.2-.5h-2c-.7 0-1.4.1-2.1.1-.7.1-1.4.1-2 .3-.7.1-1.3.3-2 .4-2.6.7-5.2 1.7-7.5 3.1-2.2 1.4-4.3 2.9-6 4.7-.9.8-1.6 1.8-2.4 2.7-.7.9-1.3 1.9-1.9 2.8-.5 1-1 1.9-1.4 2.8-.4.9-.8 1.8-1 2.6-.3.9-.5 1.6-.7 2.4-.2.7-.3 1.4-.4 2.1-.1.3-.1.6-.2.9 0 .3-.1.6-.1.8 0 .5-.1.9-.1 1.3-.2.7-.2 1.1-.2 1.1z"></path><path style='animation:dtb-reverse-spinning .6s infinite linear;transform-origin:40px 40px;' d="M62 40.1s0 .2-.1.7c0 .2 0 .5-.1.8v.5c0 .2-.1.4-.1.7-.1.5-.2 1-.3 1.6-.2.5-.3 1.1-.5 1.8-.2.6-.5 1.3-.7 1.9-.3.7-.7 1.3-1 2.1-.4.7-.9 1.4-1.4 2.1-.5.7-1.1 1.4-1.7 2-1.2 1.3-2.7 2.5-4.4 3.6-1.7 1-3.6 1.8-5.5 2.4-2 .5-4 .7-6.2.7-1.9-.1-4.1-.4-6-1.1-1.9-.7-3.7-1.5-5.2-2.6s-2.9-2.3-4-3.7c-.6-.6-1-1.4-1.5-2-.4-.7-.8-1.4-1.2-2-.3-.7-.6-1.3-.8-2l-.6-1.8c-.1-.6-.3-1.1-.4-1.6-.1-.5-.1-1-.2-1.4-.1-.9-.1-1.5-.1-2v-.7s0 .2.1.7c.1.5 0 1.1.2 2 .1.4.2.9.3 1.4.1.5.3 1 .5 1.6.2.6.4 1.1.7 1.8.3.6.6 1.2.9 1.9.4.6.8 1.3 1.2 1.9.5.6 1 1.3 1.6 1.8 1.1 1.2 2.5 2.3 4 3.2 1.5.9 3.2 1.6 5 2.1 1.8.5 3.6.6 5.6.6 1.8-.1 3.7-.4 5.4-1 1.7-.6 3.3-1.4 4.7-2.4 1.4-1 2.6-2.1 3.6-3.3.5-.6.9-1.2 1.3-1.8.4-.6.7-1.2 1-1.8.3-.6.6-1.2.8-1.8.2-.6.4-1.1.5-1.7l.3-1.5c.1-.4.1-.8.1-1.2 0-.2 0-.4.1-.5v-.5-.8-.7c0-1.1.9-2 2-2s2 .9 2 2c.1-.1.1 0 .1 0z"></path></svg>
				<?php	} 
				
				elseif ($dtb_preloader_type_val == 'preloader3') { ?>
					<style>@keyframes dtb-infinite-spinning{from{transform:rotate(0)}to{transform:rotate(360deg)}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="2 2 35 35"><path opacity=".3" d="M20.201 5.169c-8.254 0-14.946 6.692-14.946 14.946 0 8.255 6.692 14.946 14.946 14.946s14.946-6.691 14.946-14.946c-.001-8.254-6.692-14.946-14.946-14.946zm0 26.58c-6.425 0-11.634-5.208-11.634-11.634 0-6.425 5.209-11.634 11.634-11.634 6.425 0 11.633 5.209 11.633 11.634 0 6.426-5.208 11.634-11.633 11.634z"/><path style='animation:dtb-infinite-spinning 1s infinite linear;transform-origin:20px 20px;' d="M26.013 10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012v3.312c2.119 0 4.1.576 5.812 1.566z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite"/></path></svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader4') { ?>
				
				<style>@keyframes dtb-opacity{0%,100%{opacity:0}50%{opacity:1}}</style>
				
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 15 56 70">
						<circle cx="8" cy="50" r="6" style="animation: dtb-opacity 1s infinite linear; animation-delay: .1s" />
						<circle cx="28" cy="50" r="6" style="animation: dtb-opacity 1s infinite linear; animation-delay: .2s"/>
						<circle cx="48" cy="50" r="6" style="animation: dtb-opacity 1s infinite linear; animation-delay: .3s" />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader5') { ?>
				<style>@keyframes dtb-rotate-5{0%,70%{transform:rotate(0)}100%{transform:rotate(180deg)}}@keyframes dtb-height-5{0%{height:50px}100%,70%{height:0}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
						<rect class="none" fill="none"  stroke-width="4" x="25" y="25" width="50" height="50" style="animation: dtb-rotate-5 1.8s infinite linear; transform-origin: 50px 50px;" />
						<rect x="27" y="27" width="46" height="50" style="animation: dtb-height-5 1.8s infinite linear; animation-fill-mode: forwards; " />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader6') { ?>
				<style>@keyframes dtb-translate-6{0%,100%{transform:translateY(0)}50%{transform:translateY(20px)}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="-15 25 100 100">
					<rect x="16" y="50" width="8" height="20" style="animation: dtb-translate-6 .8s infinite linear;" />
					<rect x="30" y="50" width="8" height="20"  style="animation: dtb-translate-6 .8s infinite linear; animation-delay: .2s;" />
					<rect x="44" y="50" width="8" height="20" style="animation: dtb-translate-6 .8s infinite linear; animation-delay: .4s;" />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader7') { ?>
				<style>@keyframes dtb-scale-7{from{transform:scale(0)}to{transform:scale(1)}}@keyframes dtb-opacity-7{from{opacity:1}to{opacity:0}}</style>
					<svg class="preloader preloader7" width="70" height="70" xmlns="http://www.w3.org/2000/svg">
						<g class="none" fill-rule="evenodd" stroke-width="2">
							<circle cx="35" cy="35" r="26" style="animation: dtb-scale-7 1.8s infinite cubic-bezier(0.165, 0.84, 0.44, 1), dtb-opacity-7 1.8s infinite cubic-bezier(0.3, 0.61, 0.355, 1);animation-delay: -0.9s;transform-origin: 35px 35px;" />
							<circle cx="35" cy="35" r="26" style="animation: dtb-scale-7 1.8s infinite cubic-bezier(0.165, 0.84, 0.44, 1), dtb-opacity-7 1.8s infinite cubic-bezier(0.3, 0.61, 0.355, 1); transform-origin: 35px 35px;">
						</g>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader8') { ?>
				<style>@keyframes dtb-height-8{0%,100%{height:5px}50%{height:21px}}@keyframes dtb-translateY-8{0%,100%{transform:translateY(13px)}50%{transform:translateY(5px)}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 24 30">
					<rect y="0" width="4" style="animation: dtb-height-8 .6s infinite linear, dtb-translateY-8 .6s infinite linear;" />
					<rect x="10" y="0" width="4" style="animation: dtb-height-8 .6s infinite linear, dtb-translateY-8 .6s infinite linear; animation-delay: .15s;" />
					<rect x="20" y="0" width="4" style="animation: dtb-height-8 .6s infinite linear, dtb-translateY-8 .6s infinite linear; animation-delay: .3s;" />
					</svg>				
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader9') { ?>
				<style>@keyframes dtb-opacity-9{0%,100%{opacity:1}50%{opacity:.2}}</style>
					<svg class="preloader" xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 40 30">
						<rect width="4" height="20" style="animation: dtb-opacity-9 .6s infinite linear;" />
						<rect x="11" width="4" height="20" style="animation: dtb-opacity-9 .6s infinite linear; animation-delay: .2s;" />
						<rect x="22" width="4" height="20" style="animation: dtb-opacity-9 .6s infinite linear; animation-delay: .4s;" />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader10') { ?>
				<style>@keyframes dtb-scale-10{0%,100%{transform:scale(.1)}25%,50%,75%{transform:scale(1)}}</style>
					<svg class="preloader" width="60" viewBox="0 -10 80 60">
						<rect width="20" height="20" rx="3" ry="3" style="animation: dtb-scale-10 1s infinite linear; transform-origin: 10px 10px;" />
						<rect width="20" height="20" x="25" rx="3" ry="3" style="animation: dtb-scale-10 1s infinite linear; transform-origin: 35px 10px; animation-delay: .2s;" />
						<rect width="20" height="20" x="50" rx="3" ry="3" style="animation: dtb-scale-10 1s infinite linear; transform-origin: 60px 10px; animation-delay: .4s;" />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader11') { ?>
				<style>@keyframes dtb-dashoffset-11{from{stroke-dashoffset:0}to{stroke-dashoffset:256.58892822265625}}</style>
					<svg class="preloader none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"style="background:0 0">
						<path class="none" fill="none" d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40C88.6 30 95 43.3 95 50s-6.4 20-19.3 20c-19.3 0-32.1-40-51.4-40z" stroke-width="4" stroke-dasharray="159.085 97.504" style="animation:dtb-dashoffset-11 1s infinite linear;" />
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader12') { ?>
					<style>@keyframes dtb-scale-12{from{transform:scale(1.8)}to{transform:scale(1)}}@keyframes dtb-opacity-12{from{opacity:1}to{opacity:0}}</style>
					<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
						<g transform="translate(80 50)">
							<circle r="6" transform="scale(1.21152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.525s" />
						</g>
						<g transform="rotate(45 -50.355 121.569)">
							<circle r="6" fill-opacity=".875" transform="scale(1.31152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.450s" />
						</g>
						<g transform="rotate(90 -15 65)">
							<circle r="6" fill-opacity=".75" transform="scale(1.41152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.375s" />
						</g>
						<g transform="rotate(135 -.355 41.569)">
							<circle r="6" fill-opacity=".625" transform="scale(1.51152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.3s" />
						</g>
						<g transform="rotate(180 10 25)">
							<circle r="6" fill-opacity=".5" transform="scale(1.61152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.225s">
						</g>
						<g transform="rotate(-135 20.355 8.431)">
							<circle r="6" fill-opacity=".375" transform="scale(1.71152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.15.s" />
						</g>
						<g transform="rotate(-90 35 -15)">
							<circle r="6" fill-opacity=".25" transform="scale(1.01152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear; animation-delay: -.075s" />
						</g>
						<g transform="rotate(-45 70.355 -71.569)">
							<circle r="6" fill-opacity=".125" transform="scale(1.11152)" style="animation: dtb-scale-12 .6s infinite linear, dtb-opacity-12 .6s infinite linear;" />
						</g>
					</svg>
										
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader13') { ?>
					<style>@keyframes dtb-height-13-1 {0%{height: 20%;}5%{height: 45%;}10%{height: 57%;}15%{height: 80%;}20%{height:64%;}25%{height:32%;}30%{height: 66%;}35%{height:45%;}40%{height:64%;}45%{height:23%;}50%{height:66%;}55%{height:13%;}60%{height:64%;}65%{height:56%;}70%{height:34%;}75%{height:34%;}80%{height:2%;}85%{height:23%;}90%{height:76%;}95%{height:79%;}100%{height:20%;}}@keyframes dtb-height-13-2 {0%{height: 80%;}9%{height: 55%;}18%{height: 33%;}27%{height: 5%;}36%{height:75%;}45%{height:23%;}56%{height: 73%;}64%{height:33%;}73%{height:12%;}82%{height:14%;}91%{height:60%;}100%{height:80%;}}@keyframes dtb-height-13-3 {0%{height: 50%;}9%{height: 34%;}18%{height: 78%;}27%{height: 23%;}36%{height:56%;}45%{height:23%;}56%{height: 34%;}64%{height:76%;}73%{height:80%;}82%{height:54%;}91%{height:21%;}100%{height:50%;}}
					@keyframes dtb-height-13-4 {0%{height: 30%;}9%{height:45%;}18%{height:13%;}27%{height:80%;}36%{height:56%;}45%{height:72%;}56%{height: 45%;}64%{height:76%;}73%{height:34%;}82%{height:23%;}91%{height:67%;}100%{height:30%;}}
					</style>
					<svg viewBox="-10 -10 75 100" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke">
						<g transform="matrix(1 0 0 -1 0 80)">
							<rect width="10" height="20" rx="3" style="animation: dtb-height-13-1 4.3s infinite linear"></rect>
							<rect x="15" width="10" height="80" rx="3" style="animation: dtb-height-13-2 2s infinite linear"></rect>
							<rect x="30" width="10" height="50" rx="3" style="animation: dtb-height-13-3 1.4s infinite linear"></rect>
							<rect x="45" width="10" height="30" rx="3" style="animation: dtb-height-13-4 2s infinite linear"></rect>
						</g>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader14') { ?>
					<style>@keyframes dtb-move-14-1 {0%{transform: translate(5px,50px);}33.3%{transform: translate(27px,5px);}66%{transform: translate(49px, 50px);}100%{transform: translate(5px,50px);}}@keyframes dtb-move-14-2 {0%{transform: translate(27px,5px);}33.3%{transform: translate(49px,50px);}66%{transform: translate(5px, 50px);}100%{transform: translate(27px,5px);}}@keyframes dtb-move-14-3 {0%{transform: translate(49px,50px);}33.3%{transform: translate(5px,50px);}66%{transform: translate(27px, 5px);}100%{transform: translate(49px,50px);}}
					</style>
					<svg viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg" class="preloader">
						<g fill="none" fill-rule="evenodd">
						<g transform="translate(1 1)" stroke-width="2">
							<circle r="5" style="transform: translate(5px,50px); animation:dtb-move-14-1 2.2s infinite linear;"></circle>
							<circle r="5" style="transform: translate(27px,5px); animation:dtb-move-14-2 2.2s infinite linear;"></circle>
							<circle r="5" style="transform: translate(27px,5px); animation:dtb-move-14-3 2.2s infinite linear;"></circle>
						</g></g>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader15') { ?>
					<style>@keyframes dtb-height-15{0%,100%{height:120px}10%{height:110px}20%{height:100px}30%{height:90px}40%{height:80px}50%{height:70px}60%{height:60px}70%{height:50px}80%{height:40px}90%{height:140px}}@keyframes dtb-translateY-15{0%,100%{transform:translateY(10px)}10%{transform:translateY(15px)}20%{transform:translateY(20px)}30%{transform:translateY(25px)}40%{transform:translateY(30px)}50%{transform:translateY(35px)}60%{transform:translateY(40px)}70%{transform:translateY(45px)}80%{transform:translateY(50px)}90%{transform:translateY(0)}}</style>
					<svg viewBox="-20 -20 185 210" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke">
						<rect y="10" width="15" height="120" rx="6" style="animation: dtb-height-15 1s infinite linear, dtb-translateY-15 1s infinite linear; animation-delay:.5s;"></rect>
						<rect x="30" y="10" width="15" height="120" rx="6" style="animation: dtb-height-15 1s infinite linear, dtb-translateY-15 1s infinite linear; animation-delay: .25s;"></rect>
						<rect x="60" width="15" height="140" rx="6" style="animation: dtb-height-15 1s infinite linear, dtb-translateY-15 1s infinite linear;"></rect>
						<rect x="90" y="10" width="15" height="120" rx="6" style="animation: dtb-height-15 1s infinite linear, dtb-translateY-15 1s infinite linear; animation-delay: .25s;"></rect>
						<rect x="120" y="10" width="15" height="120" rx="6" style="animation: dtb-height-15 1s infinite linear, dtb-translateY-15 1s infinite linear; animation-delay: .5s;"></rect>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader16') { ?>
					<style>@keyframes dtb-rotate-16-1{0%{transform:rotate(0)}100%{transform:rotate(-360deg)}}@keyframes dtb-rotate-16-2{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}</style>
					<svg viewBox="-10 -10 160 160" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke">
						<path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z" style="transform-box:fill-box; transform-origin: center; animation: dtb-rotate-16-1 1.875s linear infinite;"></path>
						<path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z" style="transform-box:fill-box; transform-origin: center; animation: dtb-rotate-16-2 6s linear infinite;"></path>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader17') { ?>
					<style>@keyframes dtb-opacity-17{0%,100%{opacity:1}50%{opacity:.2}}</style>
					<svg viewBox="-20 -20 150 150" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke">
						<circle cx="12.5" cy="12.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite;"></circle>
						<circle cx="12.5" cy="52.5" r="12.5" fill-opacity=".5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.1s;"></circle>
						<circle cx="52.5" cy="12.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.3s;"></circle>
						<circle cx="52.5" cy="52.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.6s;"></circle>
						<circle cx="92.5" cy="12.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.8s;"></circle>
						<circle cx="92.5" cy="52.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.4s;"></circle>
						<circle cx="12.5" cy="92.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.7s;"></circle>
						<circle cx="52.5" cy="92.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.5s;"></circle>
						<circle cx="92.5" cy="92.5" r="12.5" style="animation: dtb-opacity-17 1s linear infinite; animation-delay:.2s;"></circle>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader18') { ?>
					<style>@keyframes dtb-stroke-18{0%{stroke-width:2px;}100%{stroke-width:0;}}@keyframes dtb-opacity-18{0%{stroke-opacity: 1;}100%{stroke-opacity:0;}}@keyframes dtb-scale-18-1{0%{transform: scale(1);}100%{transform: scale(3.66)}}@keyframes dtb-scale-18-2{0%,100%{transform:scale(0.75)}16.67%{transform:scale(0.125)}33.3%{transform:scale(0.2)}50%{transform:scale(0.375)}66.66%{transform:scale(.5)}83.33%{transform:scale(.625)}}</style>
					<svg viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" class="preloader">
						<g class="none" fill="none" fill-rule="evenodd" transform="translate(1 1)"  >
						<circle cx="22" cy="22" r="6" stroke-opacity="0" style="animation: dtb-scale-18-1 3s linear infinite, dtb-opacity-18 3s linear infinite, dtb-stroke-18 3s linear infinite; animation-delay:1.5s;transform-box:fill-box; transform-origin: center;"></circle>
						<circle cx="22" cy="22" r="6" stroke-opacity="0" style="animation: dtb-scale-18-1 3s linear infinite, dtb-opacity-18 3s linear infinite, dtb-stroke-18 3s linear infinite;transform-box:fill-box; transform-origin: center;"></circle>
						<circle cx="22" cy="22" r="8" style="stroke-width:3.75; animation: dtb-scale-18-2 1.5s linear infinite;transform-box:fill-box; transform-origin: center;"></circle>
						</g>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader19') { ?>
					<style>@keyframes dtb-rotate-19{0%{transform:rotate(0);}100%{transform:rotate(360deg)}}</style>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="preloader">
						<circle class="none" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/>
						<circle stroke-width="3" cx="8" cy="54" r="6" style="animation: dtb-rotate-19 2s linear infinite; transform-origin: 50%;">
							<!--<animateTransform attributeName="transform" dur="2s" type="rotate" from="0 50 48" to="360 50 52" repeatCount="indefinite" />-->
						</circle>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader20') { ?>
					<style>@keyframes dtb-opacity-20{0%,100%{opacity:1}50%{opacity:.5}}@keyframes dtb-opacity-20-2{0%,100%{opacity:.5}50%{opacity:1}}@keyframes dtb-scale-20-1{0%,100%{transform:scale(1)}50%{transform:scale(.6)}}@keyframes dtb-scale-20-2{0%,100%{transform:scale(1)}50%{transform:scale(1.666)}}</style>
					<svg viewBox="0 -50 130 150" xmlns="http://www.w3.org/2000/svg" class="preloader nostroke">
						<circle cx="15" cy="15" r="15" style="animation:dtb-opacity-20 .8s linear infinite, dtb-scale-20-1 .8s linear infinite;transform-box:fill-box; transform-origin: center;"></circle>
						<circle cx="60" cy="15" r="9" fill-opacity="0.3" style="animation:dtb-opacity-20-2 .8s linear infinite, dtb-scale-20-2 .8s linear infinite;transform-box:fill-box; transform-origin: center;"></circle>
						<circle cx="105" cy="15" r="15" style="animation:dtb-opacity-20 .8s linear infinite, dtb-scale-20-1 .8s linear infinite;transform-box:fill-box; transform-origin: center;">
							<animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
						</circle>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader21') { ?>
					<style>@keyframes dtb-ball-jump {0%, 100% {animation-timing-function: cubic-bezier(0.45,0,0.9,0.55)}0%{transform: translate(0,-10px)}50%{transform: translate(0,50px);animation-timing-function: cubic-bezier(0,0.45,0.55,0.9);}100% {transform: translate(0,-10px);}}</style>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="preloader">
						<circle cx="50" cy="30.2246" r="15" style="animation: dtb-ball-jump 1s linear infinite;transform-origin: 0 0;"></circle>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader22') { ?>
					<style>@keyframes dtb-ripple-22{0%{transform:scale(0); opacity:1}100%{transform:scale(1); opacity:0}}
					@keyframes dtb-ripple-22-2{0%{transform:scale(0); opacity:1}100%{transform:scale(1.8); opacity:0}}</style>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="20 20 60 60" preserveAspectRatio="xMidYMid" class="preloader">
						<circle cx="50" cy="50" r="17.8511" class="none" stroke-width="11" style="animation: dtb-ripple-22 1s cubic-bezier(0,0.2,0.8,1) infinite; transform-box:fill-box; transform-origin: center; animation-delay:-.5s;">
						<!--<animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;18" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s"></animate>
						<animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s"></animate>-->
						</circle>
						
						<circle cx="50" cy="50" r="10.9377" class="none" stroke-width="11" style="animation: dtb-ripple-22-2 1s cubic-bezier(0,0.2,0.8,1) infinite;transform-box:fill-box; transform-origin: center; "> 
						</circle></svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader23') { ?>
					<style>@keyframes dtb-opacity-23{0%{opacity:1}100%{opacity:.0}}</style>
					<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="25 25 50 50" preserveAspectRatio="xMidYMid"> 
						<g transform="rotate(0 50 50)"> 
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.9163s;"></rect>
						</g>
						<g transform="rotate(30 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.8333s;"></rect>
						</g>
						<g transform="rotate(60 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.7497s;"></rect>
						</g>
						<g transform="rotate(90 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.6664s;"></rect>
						</g>
						<g transform="rotate(120 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.5831s;"></rect>
						</g>
						<g transform="rotate(150 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.4998s;"></rect>
						</g>
						<g transform="rotate(180 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.4165s;"></rect>
						</g>
						<g transform="rotate(210 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.3332s;"></rect>
						</g>
						<g transform="rotate(240 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.2499s;"></rect>
						</g>
						<g transform="rotate(270 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.1666s;"></rect>
						</g>
						<g transform="rotate(300 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear; animation-delay: -0.0833s;"></rect>
						</g>
						<g transform="rotate(330 50 50)">
							<rect x="49.5" y="31.5" rx="0.49" ry="0.49" width="1" height="7" style="animation: dtb-opacity-23 1s infinite linear;"></rect>
						</g>
					</svg>
				
				<?php }
				
				elseif ($dtb_preloader_type_val == 'preloader24') { ?>
					<style>@keyframes dtb-rotate24{0%{transform:rotate(0)}100%{transform:rotate(45deg)}}</style>
					<svg class="preloader nostroke" xmlns="http://www.w3.org/2000/svg" viewBox="10 10 80 80" preserveAspectRatio="xMidYMid">
						<g transform="translate(50 50)">
						<g transform="rotate(42.4967)">
							<path d="M24.387496796514398 -5.5 L31.387496796514398 -5.5 L31.387496796514398 5.5 L24.387496796514398 5.5 A25 25 0 0 1 21.133651657506547 13.355477064454524 L21.133651657506547 13.355477064454524 L26.08339912581238 18.305224532760356 L18.305224532760356 26.083399125812377 L13.355477064454524 21.133651657506544 A25 25 0 0 1 5.500000000000001 24.387496796514398 L5.500000000000001 24.387496796514398 L5.500000000000002 31.387496796514398 L-5.4999999999999964 31.387496796514398 L-5.499999999999997 24.387496796514398 A25 25 0 0 1 -13.355477064454519 21.13365165750655 L-13.355477064454519 21.13365165750655 L-18.30522453276035 26.083399125812385 L-26.083399125812377 18.305224532760352 L-21.133651657506547 13.35547706445452 A25 25 0 0 1 -24.387496796514398 5.500000000000008 L-24.387496796514398 5.500000000000008 L-31.387496796514398 5.500000000000009 L-31.387496796514398 -5.500000000000001 L-24.387496796514398 -5.500000000000002 A25 25 0 0 1 -21.13365165750655 -13.355477064454515 L-21.13365165750655 -13.355477064454515 L-26.083399125812385 -18.30522453276035 L-18.305224532760356 -26.083399125812377 L-13.355477064454524 -21.133651657506547 A25 25 0 0 1 -5.500000000000009 -24.387496796514398 L-5.500000000000009 -24.387496796514398 L-5.50000000000001 -31.387496796514398 L5.499999999999999 -31.387496796514398 L5.5 -24.387496796514398 A25 25 0 0 1 13.355477064454515 -21.13365165750655 L13.355477064454515 -21.13365165750655 L18.30522453276035 -26.083399125812385 L26.083399125812377 -18.305224532760356 L21.133651657506547 -13.355477064454524 A25 25 0 0 1 24.387496796514398 -5.500000000000011 M0 -18A18 18 0 1 0 0 18 A18 18 0 1 0 0 -18" style="animation: dtb-rotate24 0.5586592178770949s infinite linear;"></path>
						</g>
						</g>
					</svg>
				
				<?php }
					
					
					elseif ($dtb_preloader_type_val == 'preloader25') { ?>
					<style>@keyframes dtb-fade25{0%,10%{opacity:1}12.5%,97%{opacity:0.3}}</style>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="preloader nostroke">
						<rect x="15" y="15" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; "></rect>
						<rect x="41" y="15" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.125s; opacity:0.3"></rect>
						<rect x="67" y="15" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.25s; opacity:0.3"></rect>
						<rect x="15" y="41" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.875s; opacity:0.3"></rect>
						<rect x="67" y="41" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.375s; opacity:0.3"></rect>
						<rect x="15" y="67" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.75s; opacity:0.3"></rect>
						<rect x="41" y="67" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.625s; opacity:0.3"></rect>
						<rect x="67" y="67" width="18" height="18" style="animation:dtb-fade25 1s infinite linear; animation-delay:0.5s; opacity:0.3"></rect>
					</svg>
				
				<?php }
				
				?>
			<?php }
				
				?>
		</div>
	</div>

    <?php
    
}