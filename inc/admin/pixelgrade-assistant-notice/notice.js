(function ($) {
	$(document).ready(function () {
		let temp_url = wp.ajax.settings.url,
			$noticeContainer = $( '.pixassist-notice' ),
			$button = $noticeContainer.find( '.js-handle-pixassist' ),
			$dismissButton = $noticeContainer.find( '.button.dismiss' ),
			$buttonText = $noticeContainer.find( '.pixassist-notice-button__text' ),
			$status = $noticeContainer.find( '.js-plugin-message' );

		$button.on('click', function() {
			// Hide the dismiss button
			$dismissButton.fadeOut(500);

			/*
			 * We need to determine what to do first, install or activate.
			 */
			if ( pixassistNotice.status === 'missing' ) {
				doPluginInstall();
			} else if ( pixassistNotice.status === 'installed' ) {
				doPluginActivate();
			}
		})

		function doPluginInstall() {
			$button.addClass('state--plugin-installing updating-message').prop('disabled', true);
			$buttonText.html(pixassistNotice.i18n.btnInstalling);
			wp.a11y.speak(pixassistNotice.i18n.btnInstalling);

			wp.updates.installPlugin(
				{
					slug: pixassistNotice.slug,
					success: function ( response ) {
						$button.removeClass( 'state--plugin-installing updating-message' );
						wp.a11y.speak(pixassistNotice.i18n.installedSuccessfully);

						if ( response.activateUrl ) {
							doPluginActivate();
						} else {
							// The plugin is already active.
							doPluginReady();
						}
					},
					error: function ( error ) {
						doPluginError();
					}
				}
			);
		}

		function doPluginActivate() {
			$button.addClass( 'state--plugin-activating updating-message' ).prop('disabled', true);
			$buttonText.html(pixassistNotice.i18n.btnActivating);
			wp.a11y.speak(pixassistNotice.i18n.btnActivating);

			wp.ajax.settings.url = pixassistNotice.activateUrl;

			wp.ajax.send({type: 'GET'}).always(function (response) {

				if ( response.indexOf('<div id="message" class="updated"><p>') > -1
					|| response.indexOf('<p>'+pixassistNotice.i18n.tgmpActivatedSuccessfully) > -1
					|| response.indexOf('<p>'+pixassistNotice.i18n.tgmpPluginActivated) > -1
					|| response.indexOf('<p>'+pixassistNotice.i18n.tgmpPluginAlreadyActive) > -1
					|| response.indexOf(pixassistNotice.i18n.tgmpNotAllowed) > -1 ) {
					doPluginReady();
				} else {
					doPluginError();
				}

				wp.ajax.settings.url = temp_url;
			});
		}

		function doPluginReady() {
			setTimeout( function() {
				wp.a11y.speak(pixassistNotice.i18n.activatedSuccessfully);

				$button.removeClass('state--plugin-activating state--plugin-installing updating-message').addClass('state--plugin-ready updated-message').prop('disabled', false);
				// We don't need to take any action. Just leave the normal click.
				$button.unbind('click');

				$button.attr('href', pixassistNotice.pixassistSetupUrl);
				$buttonText.html(pixassistNotice.i18n.btnGoToSetup);

				wp.a11y.speak(pixassistNotice.i18n.clickStartTheSiteSetup);
			}, 1000);
		}

		function doPluginError() {
			$button.removeClass('state--plugin-installing state--plugin-activating updating-message').addClass( 'state--plugin-invalidated state--error' );
			$buttonText.html(pixassistNotice.i18n.btnError);

			$status.html(pixassistNotice.i18n.error);

			wp.a11y.speak(pixassistNotice.i18n.error);
		}

		// Send ajax on click of dismiss icon or button
		$noticeContainer.on( 'click', '.button.dismiss, .notice-dismiss', function( event ) {
			event.preventDefault();
			ajaxDismiss(event);
		});

		// Send ajax
		function ajaxDismiss(event) {
			$(event.target).addClass('updating-message');
			$.ajax({
				url: pixassistNotice.ajaxurl,
				type: 'post',
				data: {
					action: 'pixassist_install_dismiss_admin_notice',
					nonce_dismiss: $noticeContainer.find('[name="nonce_dismiss"]').val()
				}
			})
			.always( function() {
				$noticeContainer.slideUp();
			})
		}
	});
})(jQuery);
