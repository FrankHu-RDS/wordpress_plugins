export default function (types, container) {

	const Masonry = require('masonry-layout');
	const imagesLoaded = require('imagesloaded');

	let searchRequest;
	let viewRequest;
	let verifyKeyRequest;
	let removeKeyRequest;
	let keyValueRequest;
	let downloadRequest = new Array();
	let searchForm		= container.querySelector('#jumpstory-imagesearch-form');
	let searchbar		= container.querySelector('.searchbar__input');
	let filtersItem		= container.querySelectorAll('.filters__item');
	let resultsList		= container.querySelector('.results__list');


	if( searchForm !== null ) {
		searchForm.addEventListener(
			'submit',
			function(e){
				e.preventDefault();

				let searchTerm	= container.querySelector('#jumpstory-imagesearch-term').value;

				if( searchTerm && searchTerm !== '' ) {
					this.querySelector('.results__loading').classList.add('results__loading--active');
					resetCurrentPageNumber(); // When a search term is changed it's considered a new search and the pagination should be reset. Otherwise check if new and old search term is equal.
					return 	search( searchTerm );
				}
			},
			false
		);
	}


	if( filtersItem !== null  ){

		filtersItem.forEach( function(item){

			item.addEventListener('click', setRadioBtn, false);
			item.addEventListener('click', resetCurrentPageNumber, false);
			item.addEventListener('click', setFilter, false);
			item.addEventListener('click', searchByFilter, false);

			if( item.classList.contains('filters__item--dropdown') ) {
				item.addEventListener('click', changeCurrentFilterTitle, false);
			}

			if( item.classList.contains('type__item') ) {
				item.addEventListener('click', changeTypeFilterClassname, false);
			}
		});
	}


	if( resultsList !== null ) {
		createMasonry( resultsList );
	}


	initMediaControls();
	initPaginationBtns();
	initModalControls();
	initTypes(types);

	/* --- Functions --- */
	function setRadioBtn() {
		let radioID		= this.dataset.radioId;
		let parameter	= this.dataset.parameter;
		let value		= this.dataset.value;

		let radioInput		= container.querySelector('#' + radioID);
		radioInput.checked	= true;
	}

	function setTotalCount( total ) {

		Object.keys(total).forEach( function(key){
			let countElement = container.querySelectorAll('.type__count--' + key);

			countElement.forEach( function(e) {
				e.innerHTML = new Intl.NumberFormat().format(total[key]);
			});

		} );
	}

	function setCurrentPageNumber(pageNumber) {
		let paginationElement		= container.querySelector('#jumpstory-imagesearch-current-page');
 		paginationElement.innerHTML	= pageNumber;
	}

	function resetCurrentPageNumber() {
		let paginationElement		= container.querySelector('#jumpstory-imagesearch-current-page');
		paginationElement.innerHTML	= 1;
	}

	function setFilter() {

		let appliedFiltersElement	= container.querySelector('#jumpstory-imagesearch-filters');
		let appliedFilters			= getFilters();
		let parameter				= this.dataset.parameter;
		let value					= this.dataset.value;

		appliedFilters[parameter]		= value;
		appliedFiltersElement.innerHTML	= JSON.stringify(appliedFilters);

		return appliedFilters;
	}

	function getFilters() {

		let appliedFiltersElement	= container.querySelector('#jumpstory-imagesearch-filters');
		let appliedFilters			= ( appliedFiltersElement.innerHTML !== 'false' ) ? JSON.parse(appliedFiltersElement.innerHTML) : {};

		return appliedFilters;
	}

	function changeTypeFilterClassname() {

		let previousSelected = container.querySelector('.type__item--selected');

		if( previousSelected ) {
			previousSelected.classList.remove('type__item--selected');
		}

		this.classList.add('type__item--selected');
	}

	function changeCurrentFilterTitle() {

		let parameter	= this.dataset.parameter;
		let label		= this.dataset.label;

		let parentFilterItem	= container.querySelector('#filter-' + parameter);
		let currentOptionTitle	= parentFilterItem.querySelector('.filters__current_option');
		let previousSelected	= parentFilterItem.querySelector('.filters__item--selected');

		if( previousSelected ) {
			previousSelected.classList.remove('filters__item--selected');
		}

		this.classList.add('filters__item--selected');

		currentOptionTitle.classList.add('filters__current_option--active');
		currentOptionTitle.innerText = label;
	}

	function searchByFilter() {

		let searchTerm	= container.querySelector('#jumpstory-imagesearch-term').value;
		if(!searchTerm) {
			searchTerm = JIS_APP.default_search_term;
		}

		return search( searchTerm );
	}

	function search(searchTerm) {
		if( searchRequest ){
			searchRequest.abort();
		}

		if( searchTerm === 'undefined' || searchTerm === '' ) {
			return false;
		}

		let appliedFilters	= getFilters();
		let currentPage		= parseInt( container.querySelector('#jumpstory-imagesearch-current-page').innerHTML );

		container.querySelector('.results__loading').classList.add('results__loading--active');

		searchRequest = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action':				'lmp_search',
				'ajax_search_term':		searchTerm,
				'ajax_current_page':	currentPage,
				'ajax_filters':			appliedFilters
			},
			function(response){
				response	= JSON.parse(response);
				let total	= response.total;
				let tags	= response.related_tags;
				let images	= response.images;

				if( total ) {
					setTotalCount(total);
					renderPagination(currentPage, appliedFilters, total);
				}

				if( images ) {
					renderResults(images);
				}

				return;
			}
		);
	}

	function renderResults( images ) {

		let resultElement	= container.querySelector('#jumpstory-imagesearch-results');

		jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action':		'lmp_results_view',
				'ajax_images':	images
			},function(response){
				resultElement.innerHTML = response;
				container.querySelector('.results__loading').classList.remove('results__loading--active');

				createMasonry( container.querySelector('#jumpstory-imagesearch-results') );

				initMediaControls();
			}
		);
	}

	function renderPagination(currentPage, appliedFilters, total) {
		jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action': 'lmp_pagination_view',
				'ajax_current_page':	currentPage,
				'ajax_filters':			appliedFilters,
				'ajax_total':			total
			},function(response){
				let paginationElement = container.querySelectorAll('.pagination');

				paginationElement.forEach(function(element) {
					element.innerHTML = response;
				});

				initPaginationBtns();
			}
		);
	}

	function initMediaControls() {
		let downloadMediaElements	= container.querySelectorAll('.media__download_btn--active');
		let insertMediaElements		= container.querySelectorAll('.media__insert_btn--active');
		let previewBTNs				= container.querySelectorAll('.media__video_preview_btn');

		if( downloadMediaElements !== null ) {
			downloadMediaElements.forEach(function(btn){
				btn.addEventListener('click', downloadMediaToLibrary);
			});
		}

		if( insertMediaElements !== null ) {
			insertMediaElements.forEach(function(btn){
				btn.addEventListener('click', insertMediaToContent);
			});
		}

		if( previewBTNs !== null ) {
			previewBTNs.forEach(function(btn){
				btn.addEventListener('click', previewMedia);
			});
		}

	}

	function initModalControls() {
		let verifyKeyBtn		= container.querySelectorAll('.jis_key_modal__btn');
		let connectAccountBtn	= container.querySelectorAll('.jis_account__connect_btn');
		let logoutBtn			= container.querySelectorAll('.jis_account__logout_btn');
		let closeModalBtn		= container.querySelectorAll('.jis_close_btn');
		let overlayElement		= container.querySelectorAll('.jis_modal__background');

		if( verifyKeyBtn !== null ) {
			verifyKeyBtn.forEach(function(btn){
				btn.addEventListener('click', verifyKey);
			});
		}

		if( connectAccountBtn !== null ) {
			connectAccountBtn.forEach(function(btn){
				btn.addEventListener('click', openConnectModal);
			});
		}

		if( logoutBtn !== null ) {
			logoutBtn.forEach(function(btn){
				btn.addEventListener('click', removeKey);
			});
		}

		if( closeModalBtn !== null ) {
			closeModalBtn.forEach(function(btn){
				btn.addEventListener('click', closeModal);
			});
		}

		if( overlayElement !== null ) {
			overlayElement.forEach(function(btn){
				btn.addEventListener('click', closeModal);
			});
		}
	}

	function initPaginationBtns() {

		let paginationBtn	= container.querySelectorAll('.pagination__btn');

		if( paginationBtn !== null ) {
			paginationBtn.forEach( function(item){
				item.addEventListener(
					'click',
					function(e) {
						e.preventDefault();

						setCurrentPageNumber(this.value);

						let searchTerm	= container.querySelector('#jumpstory-imagesearch-term').value;

						if( searchTerm ) {
							return 	search( searchTerm );
						}
					},
					false
				);
			});
		}
	}

	function initTypes(types) {
		if (!types) {
			return
		}

		if (types.length === 1 && types[0] === 'video') {
			const typeButtons = container.querySelectorAll('.type__item');
			if(typeButtons) {
				for (let i = 0; i < typeButtons.length; i++) {
					const typeButton = typeButtons[i];
					if (!typeButton.dataset.value.match(/videos/)) {
						typeButton.style.display = 'none';
					} else {
						typeButton.click();
					}
				}
			}
		}

		if (!types.includes('video') && !types.includes('all')) {
			const videoTab = container.querySelector('.type__item--videos');
			if(videoTab) {
				videoTab.style.display = 'none';
			}
		}
	}

	function previewMedia() {

		if( viewRequest ) {
			viewRequest.abort();
		}

		let url		= this.dataset.previewUrl;
		let type	= this.dataset.mediaType;
		let title	= this.dataset.mediaTitle;

		viewRequest = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action': 			'lmp_media_preview_view',
				'ajax_preview_url':	url,
				'ajax_media_type':	type,
				'ajax_media_title':	title
			},
			function(response){

				let modal = container.createElement('div');

				modal.classList.add('preview_modal');

				modal.innerHTML	= response;

				container.body.append(modal);

				let overlay		= modal.querySelector('.preview_modal__overlay');
				let closeBNT	= modal.querySelector('.preview_modal__close');

				overlay.addEventListener('click', function(){
					modal.remove('removed');
				});

				closeBNT.addEventListener('click', function(e){
					e.preventDefault();
					modal.remove();
				});
			}
		);
	}

	function downloadMediaToLibrary(e) {

		e.preventDefault();

		if (JIS_APP.logged_in !== '1') {
			openConnectModal();
			initModalControls();
			return;
		}

		let mediaId			= this.dataset.mediaId;

		if( downloadRequest[mediaId] ) {
			downloadRequest[mediaId].abort();
		}

		let mediaType		= this.dataset.mediaType;
		let searchTerm		= container.querySelector('#jumpstory-imagesearch-term').value;

		let parentEl		= findParentWithClass(this, 'media');
		let btnEl			= parentEl.querySelector('.media__download_btn');
		let loadingEl		= parentEl.querySelector('.media__downloading');
		let msgEl			= parentEl.querySelector('.download__text');
		let btnOrigTxt		= msgEl.innerText;

		let noticeTemplate	= wp.template('jis-admin-notice');
		let noticeElement	= parentEl.querySelector('.media__notice');

		noticeElement.innerHTML = '';


		parentEl.classList.add('media--active');
		btnEl.classList.add('media__download_btn--deactive');
		btnEl.classList.remove('media__download_btn--active');
		loadingEl.classList.add('media__downloading--active');
		msgEl.innerText	= 'Downloading ...';


		downloadRequest[mediaId] = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action': 				'lmp_download_media',
				'ajax_search_term':		searchTerm,
				'ajax_media_type':		mediaType,
				'ajax_media_id':		mediaId,
				'ajax_download_action':	'media-library'
			},
			function(response){
				loadingEl.classList.remove('media__downloading--active');

				if( response.success === true ) {

					btnEl.classList.add('media__download_btn--downloaded');
					btnEl.removeEventListener('click', downloadMediaToLibrary);
					msgEl.innerText		= response.msg_user;
					response.div_class	= 'notice-success';
					response.p_class	= 'jis_notice__paragraph-success';

					setTimeout(function(){
						noticeElement.innerHTML = '';
						parentEl.classList.remove('media--active');
					}, 5000);

					const event = new CustomEvent('jis_download_success', { detail: response});
					container.dispatchEvent(event);
				}
				else if( response.code === 'token_invalid' || response.code === 'token_expired' || response.code === 'token_verified' || response.code === 'failed_group_401' ) {

					removeKey(true).then(function() {
						openConnectModal(response);
						initModalControls();

						parentEl.classList.remove('media--active');
						btnEl.classList.remove('media__download_btn--deactive');
						btnEl.classList.add('media__download_btn--active');
						msgEl.innerText	= btnOrigTxt;

						response.div_class	= 'notice-success';
						response.p_class	= 'jis_notice__paragraph-success';
					});
				}
				else {
					btnEl.classList.remove('media__download_btn--deactive');
					btnEl.classList.add('media__download_btn--active');
					msgEl.innerText	= btnOrigTxt;

					response.div_class	= 'notice-error';
					response.p_class	= 'jis_notice__paragraph-error';

					setTimeout(function(){
						parentEl.classList.remove('media--active');
					}, 8000);
				}

				noticeElement.innerHTML = noticeTemplate( response );
			},
			'json'
		).fail( function(response, status, error) {
			response.div_class	= 'notice-error';
			response.p_class	= 'jis_notice__paragraph-error';
			noticeElement.innerHTML = noticeTemplate( response );
		});
	}

	function verifyKey() {

		if( verifyKeyRequest ) {
			verifyKeyRequest.abort();
		}

		let verifyKeyInput		= container.querySelector('.jis_key_modal__input');
		let feedbackMsgElement	= container.querySelector('.jis_key_modal__paragraph--notice');
		let accountInfoElement	= container.querySelector('.jis_account');
		let jisStrings 			= wp.media.view.l10n;

		feedbackMsgElement.innerText	= jisStrings.jisValidationInProgress;

		verifyKeyRequest = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action': 				'lmp_verify_key',
				'ajax_key_token':		verifyKeyInput.value
			},
			function(response){

				if( response.success === true && response.code == 'token_valid') {
					feedbackMsgElement.innerText	= jisStrings.jisValidateSuccess;

					let accountTemplate	= wp.template('jis-account-info');
					if( accountInfoElement !== null ) {
						accountInfoElement.innerHTML = accountTemplate( response );
						initModalControls();
						closeModal();
					}
				}
				else{
					feedbackMsgElement.innerText	= jisStrings.jisKeyIsInvalid;

					let modalElement	= container.querySelector('#jis_modal');
					let connectTemplate	= wp.template('jis-connect-btn');
					let verifyTemplate	= wp.template('jumpstory-verify-key');

					if( accountInfoElement !== null ) {
						accountInfoElement.innerHTML = connectTemplate();
						initModalControls();
					}

					if( modalElement !== null ) {
						modalElement.innerHTML = verifyTemplate(response);
						modalElement.classList.remove('jis_modal__background--hidden');
						modalElement.classList.add('jis_modal__background--active');
						initModalControls();
					}
				}
			},
			'json'
		);
	}

	function removeKey() {

		if( removeKeyRequest ) {
			removeKeyRequest.abort();
		}

		let accountInfoElement	= container.querySelector('.jis_account');

		removeKeyRequest = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action': 			'lmp_remove_key',
				'ajax_remove_key':	true
			},
			function(response){
				if( response.success === true && response.code == 'token_removed') {
					let connectTemplate	= wp.template('jis-connect-btn');
					if( accountInfoElement !== null ) {
						accountInfoElement.innerHTML = connectTemplate();
						initModalControls();
					}
				}
			},
			'json'
		);
		return removeKeyRequest;
	}

	function keyValues() {

		if( keyValueRequest ) {
			keyValueRequest.abort();
		}

		keyValueRequest = jQuery.post(
			JIS_APP.ajaxurl,
			{
				'action':				'lmp_key_values',
				'ajax_return_values':	true
			},
			function(response) {
				//
			},
			'json'
		);
		return keyValueRequest;
	}

	function createMasonry( gridElement ) {

		let msnry = new Masonry( gridElement, {
		  itemSelector: '.media',
		  columnWidth: '.media_sizer',
		  percentPosition: true,
		  gutter: 16,
		  initLayout: false,
		});

		imagesLoaded( gridElement ).on( 'progress', function() {
		  msnry.layout();
		  let paginationElements = container.querySelectorAll('.pagination--hide_while_loading');
		  paginationElements.forEach(function(e){
			  e.classList.remove('pagination--hide_while_loading');
		  });
		});
	}

	function findParentWithClass(el, classname) {

		let i = true;

		while(i) {

			if( el.classList.contains(classname) ) {
				i = false;
				return el;
			}else {
				el = el.parentNode;
			}

			if (!el || !i) {
				i = false;
				return false;
			}
		}
	}

	function openConnectModal(data) {
		if( !data || typeof data.code !== 'undefined' || typeof data.success !== 'undefined' ) {
			data = {
				success: true
			}
		}

		keyValues().then(function(response){

			if( typeof response.code !== 'undefined' && response.code === 'token_local_retrived' ){
				data.key_value		= response.key_value;
				data.key_verified	= response.key_verified;
			}

			let modalElement	= container.querySelector('#jis_modal');
			let verifyTemplate	= wp.template('jumpstory-verify-key');

			if( modalElement !== null ) {
				modalElement.innerHTML = verifyTemplate(data);
				modalElement.classList.remove('jis_modal__background--hidden');
				modalElement.classList.add('jis_modal__background--active');
				initModalControls();
			}
		});
	}

	function closeModal(e) {
		// Note; e === undefined is used for non-click events.
		if( typeof e == 'undefined' || this == e.target ) {
			let modalElement	= container.querySelector('#jis_modal');
			modalElement.classList.add('jis_modal__background--hidden');
			modalElement.classList.remove('jis_modal__background--active');
		}
	}
}