export default function () {

    if (!wp.media) {
        return
    }

    // Global vars
    var old_media_frame_select = wp.media.view.MediaFrame.Select;
    var types = [];


    // Create JumpStory Tabs

    wp.media.view.MediaFrame.Select = old_media_frame_select.extend({

        // Tab / Router
        // https://atimmer.github.io/wordpress-jsdoc/media_views_frame_select.js.html#sunlight-1-line-113
        browseRouter: function browseRouter(routerView) {
            old_media_frame_select.prototype.browseRouter.apply(this, arguments);

            // Bit dirty, but elementor dont set the types allowed in the popup
            if (document.querySelector('.elementor-control-image')) {
                types = ['image'];
            } else {
                types = this.options.library.type;
            }


            routerView.set({
                jumpstory: {
                    text: 'JumpStory',
                    priority: 45
                }
            });
        },


        // Handlers
        bindHandlers: function bindHandlers() {
            old_media_frame_select.prototype.bindHandlers.apply( this, arguments );
            this.on( 'content:create:jumpstory', this.frameContent, this );
        },


        /**
         * Render callback for the content region in the `browse` mode.
         *
         * @param {wp.media.controller.Region} contentRegion
         */
        frameContent: function frameContent(contentRegion) {
            var state = this.state();
            setTimeout(function() {
                jumpStoryMediaTab(state);
            }, 200)
        },

        getFrame: function getFrame(id) {
            return this.states.findWhere({ id: id });
        }
    });


    // Render JumpStory
    var jumpStoryMediaTab = function(state) {

        var html = document.createElement('div');
        html.setAttribute('id', 'jumpstory-media-router-' + state.id);

        var modal = state.frame.el.querySelector('.media-frame-content'); // Get all media modals
        // Exit if not modal
        if (!modal) {
            return false;
        }
        modal.innerHTML = ''; // Clear Modal
        modal.appendChild(html); // Append JumpStory


        var element = modal.querySelector('#jumpstory-media-router-' + state.id);
        if (!element) {
            return false;
        }

        element.innerHTML = '<div class="loading"><div class="lds-grid"><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div><div class="lds-grid__item"></div></div></div>';

        jQuery.post(
            JIS_APP.ajaxurl,
            {
                'action': 				'lmp_media_frame_view',
                'ajax_classname':		'jis-content--media-modal',
                'ajax_insert_btn':		true
            },
            function(html) {
                element.innerHTML = html;
                lmpInitSearchFunctionality(types, element);
            }
        );

        // Add listener for download event
        element.addEventListener('jis_download_success', function(event) {
            if (state.frame.el) {
                var mediaModal = state.frame.el;
                var mediaTab = mediaModal.querySelector('#menu-item-browse');
                if (mediaTab) {
                    // Open the 'Media Library' tab
                    mediaTab.click();
                }

                // Delay to allow for tab switching
                setTimeout(function () {
                    if (state.frame.content.get() !== null) {
                        //this forces a refresh of the content
                        state.frame.content.get().collection._requery(true);
                    }

                    // Select the attached that was just uploaded.
                    var selection = state.frame.state().get('selection');
                    var selected = parseInt(event.detail.id);
                    selection.reset(selected ? [wp.media.attachment(selected)] : []);
                }, 150);
            }
        });
    };
}