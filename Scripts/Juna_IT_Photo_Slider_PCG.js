jQuery(function() {
	jQuery.fn.imagesLoaded 		= function( callback ) {
	var $images = this.find('img'),
		len 	= $images.length,
		_this 	= this,
		blank 	= 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';
	function triggerCallback() {
		callback.call( _this, $images );
	}
	function imgLoaded() {
		if ( --len <= 0 && this.src !== blank ){
			setTimeout( triggerCallback );
			$images.off( 'load error', imgLoaded );
		}
	}
	if ( !len ) {
		triggerCallback();
	}
	$images.on( 'load error',  imgLoaded ).each( function() {
		if (this.complete || this.complete === undefined){
			var src = this.src;
			this.src = blank;
			this.src = src;
		}
	});
	return this;
	};
	var $rgGallery			= jQuery('#rg-gallery'),
	$esCarousel			= $rgGallery.find('div.es-carousel-wrapper'),
	$items				= $esCarousel.find('ul > li'),
	itemsCount			= $items.length;
	Gallery				= (function() {
		var current			= 0, 
			mode 			= 'carousel',
			anim			= false,
			init			= function() {
				$items.add('<img src="../wp-content/plugins/Juna-IT-Photo-Slider-free/Images/loading_1.gif"/>').imagesLoaded( function() {
					_addViewModes();
					_addImageWrapper();
					_showImage( $items.eq( current ) );
				});
				if( mode === 'carousel' )
					_initCarousel();
			},
			_initCarousel	= function() {
				$esCarousel.show().elastislide({
					imageW 	: 65,
					onClick	: function( $item ) {
						if( anim ) return false;
						anim	= true;
						_showImage($item);
						current	= $item.index();
					}
				});
				$esCarousel.elastislide( 'setCurrent', current );
			},
			_addViewModes	= function() {
				var $viewfull	= jQuery('<a href="#" class="rg-view-full"></a>'),
					$viewthumbs	= jQuery('<a href="#" class="rg-view-thumbs rg-view-selected"></a>');
				$rgGallery.prepend( jQuery('<div class="rg-view"/>').append( $viewfull ).append( $viewthumbs ) );
				$viewfull.on('click.rgGallery', function( event ) {
						if( mode === 'carousel' )
							$esCarousel.elastislide( 'destroy' );
						$esCarousel.hide();
					$viewfull.addClass('rg-view-selected');
					$viewthumbs.removeClass('rg-view-selected');
					mode	= 'fullview';
					return false;
				});
				$viewthumbs.on('click.rgGallery', function( event ) {
					_initCarousel();
					$viewthumbs.addClass('rg-view-selected');
					$viewfull.removeClass('rg-view-selected');
					mode	= 'carousel';
					return false;
				});
				if( mode === 'fullview' )
					$viewfull.trigger('click');
			},
			_addImageWrapper= function() {
				jQuery('#img-wrapper-tmpl').tmpl( {itemsCount : itemsCount} ).appendTo( $rgGallery );
				if( itemsCount > 1 ) {
					var $navPrev		= $rgGallery.find('a.rg-image-nav-prev'),
						$navNext		= $rgGallery.find('a.rg-image-nav-next'),
						$imgWrapper		= $rgGallery.find('div.rg-image');
					$navPrev.on('click.rgGallery', function( event ) {
						_navigate( 'left' );
						return false;
					});	
					$navNext.on('click.rgGallery', function( event ) {
						_navigate( 'right' );
						return false;
					});
					$imgWrapper.touchwipe({
						wipeLeft			: function() {
							_navigate( 'right' );
						},
						wipeRight			: function() {
							_navigate( 'left' );
						},
						preventDefaultEvents: false
					});
					jQuery(document).on('keyup.rgGallery', function( event ) {
						if (event.keyCode == 39)
							_navigate( 'right' );
						else if (event.keyCode == 37)
							_navigate( 'left' );	
					});
				}
			},
			_navigate		= function( dir ) {
				if( anim ) return false;
				anim	= true;
				
				if( dir === 'right' ) {
					if( current + 1 >= itemsCount )
						current = 0;
					else
						++current;
				}
				else if( dir === 'left' ) {
					if( current - 1 < 0 )
						current = itemsCount - 1;
					else
						--current;
				}
				_showImage( $items.eq( current ) );
			},
			_showImage		= function( $item ) {
				// shows the large image that is associated to the $item
				var $loader	= $rgGallery.find('div.rg-loading').show();
				$items.removeClass('selected');
				$item.addClass('selected');
				var $thumb		= $item.find('img'),
					largesrc	= $thumb.data('large'),
					title		= $thumb.data('description');
				jQuery('<img/>').load( function() {
					$rgGallery.find('div.rg-image').empty().append('<img src="' + largesrc + '"/>');
					if( title )
						$rgGallery.find('div.rg-caption').show().children('p').empty().text( title );
					$loader.hide();
					if( mode === 'carousel' ) {
						$esCarousel.elastislide( 'reload' );
						$esCarousel.elastislide( 'setCurrent', current );
					}
					anim	= false;
				}).attr( 'src', largesrc );
			},
			addItems		= function( $new ) {
				$esCarousel.find('ul').append($new);
				$items 		= $items.add( $($new) );
				itemsCount	= $items.length; 
				$esCarousel.elastislide( 'add', $new );
			};
		return { 
			init 		: init,
			addItems	: addItems
		};
	})();
	Gallery.init();
});