(function( window, $, undefined ) {
	jQuery.fn.touchwipe 				= function(settings) {
		var config = {
			min_move_x: 20,
			min_move_y: 20,
			wipeLeft: function() { },
			wipeRight: function() { },
			wipeUp: function() { },
			wipeDown: function() { },
			preventDefaultEvents: true
		};
		if (settings) jQuery.extend(config, settings);
		this.each(function() {
			var startX;
			var startY;
			var isMoving = false;
			function cancelTouch() {
				this.removeEventListener('touchmove', onTouchMove);
				startX = null;
				isMoving = false;
			}	
			function onTouchMove(e) {
				if(config.preventDefaultEvents) {
					e.preventDefault();
				}
				if(isMoving) {
					var x = e.touches[0].pageX;
					var y = e.touches[0].pageY;
					var dx = startX - x;
					var dy = startY - y;
					if(Math.abs(dx) >= config.min_move_x) {
						cancelTouch();
						if(dx > 0) {
							config.wipeLeft();
						}
						else {
							config.wipeRight();
						}
					}
					else if(Math.abs(dy) >= config.min_move_y) {
						cancelTouch();
						if(dy > 0) {
							config.wipeDown();
						}
						else {
							config.wipeUp();
						}
					}
				}
			}
			function onTouchStart(e)
			{
				if (e.touches.length == 1) {
					startX = e.touches[0].pageX;
					startY = e.touches[0].pageY;
					isMoving = true;
					this.addEventListener('touchmove', onTouchMove, false);
				}
			}    	 
			if ('ontouchstart' in document.documentElement) {
				this.addEventListener('touchstart', onTouchStart, false);
			}
		});
		return this;
	};
	jQuery.elastislide 				= function( options, element ) {
		this.$el	= jQuery( element );
		this._init( options );
	};
	jQuery.elastislide.defaults 		= {
		speed		: 450,	// animation speed
		easing		: '',	// animation easing effect
		imageW		: 190,	// the images width
		margin		: 3,	// image margin right
		border		: 2,	// image border
		minItems	: 1,	// the minimum number of items to show. 
							// when we resize the window, this will make sure minItems are always shown 
							// (unless of course minItems is higher than the total number of elements)
		current		: 0,	// index of the current item
							// when we resize the window, the carousel will make sure this item is visible 
		onClick		: function() { return false; } // click item callback
    };
	jQuery.elastislide.prototype 	= {
		_init 				: function( options ) {
			this.options 		= jQuery.extend( true, {}, jQuery.elastislide.defaults, options );
			this.$slider		= this.$el.find('ul');
			this.$items			= this.$slider.children('li');
			this.itemsCount		= this.$items.length;
			this.$esCarousel	= this.$slider.parent();
			this._validateOptions();
			this._configure();
			this._addControls();
			this._initEvents();
			this.$slider.show();
			this._slideToCurrent( false );
		},
		_validateOptions	: function() {
			if( this.options.speed < 0 )
				this.options.speed = 450;
			if( this.options.margin < 0 )
				this.options.margin = 4;
			if( this.options.border < 0 )
				this.options.border = 1;
			if( this.options.minItems < 1 || this.options.minItems > this.itemsCount )
				this.options.minItems = 1;
			if( this.options.current > this.itemsCount - 1 )
				this.options.current = 0;
		},
		_configure			: function() {
			this.current		= this.options.current;
			this.visibleWidth	= this.$esCarousel.width();
			if( this.visibleWidth < this.options.minItems * ( this.options.imageW + 2 * this.options.border ) + ( this.options.minItems - 1 ) * this.options.margin ) {
				this._setDim( ( this.visibleWidth - ( this.options.minItems - 1 ) * this.options.margin ) / this.options.minItems );
				this._setCurrentValues();
				this.fitCount	= this.options.minItems;
			}
			else {
				this._setDim();
				this._setCurrentValues();
			}
			this.$slider.css({
				width	: this.sliderW
			});
		},
		_setDim				: function( elW ) {
			this.$items.css({
				marginRight	: this.options.margin,
				width		: ( elW ) ? elW : this.options.imageW + 2 * this.options.border
			}).children('a').css({ // <a> style
				borderWidth		: this.options.border
			});
		},
		_setCurrentValues	: function() {
			this.itemW			= this.$items.outerWidth(true);
			this.sliderW		= this.itemW * this.itemsCount;
			this.visibleWidth	= this.$esCarousel.width();
			this.fitCount		= Math.floor( this.visibleWidth / this.itemW );
		},
		_addControls		: function() {
			this.$navNext	= jQuery('<span class="es-nav-next">Next</span>');
			this.$navPrev	= jQuery('<span class="es-nav-prev">Prev</span>');
			jQuery('<div class="es-nav"/>')
			.append( this.$navPrev )
			.append( this.$navNext )
			.appendTo( this.$el );
		},
		_toggleControls		: function( dir, status ) {
			if( dir && status ) {
				if( status === 1 )
					( dir === 'right' ) ? this.$navNext.show() : this.$navPrev.show();
				else
					( dir === 'right' ) ? this.$navNext.hide() : this.$navPrev.hide();
			}
			else if( this.current === this.itemsCount - 1 || this.fitCount >= this.itemsCount )
					this.$navNext.hide();
		},
		_initEvents			: function() {
			var instance	= this;
			jQuery(window).on('resize.elastislide', function( event ) {
				instance._reload();
				clearTimeout( instance.resetTimeout );
				instance.resetTimeout	= setTimeout(function() {
					instance._slideToCurrent();
				}, 200);
			});
			this.$navNext.on('click.elastislide', function( event ) {
				instance._slide('right');
			});
			this.$navPrev.on('click.elastislide', function( event ) {
				instance._slide('left');
			});
			this.$slider.on('click.elastislide', 'li', function( event ) {
				instance.options.onClick( jQuery(this) );
				return false;
			});
			instance.$slider.touchwipe({
				wipeLeft			: function() {
					instance._slide('right');
				},
				wipeRight			: function() {
					instance._slide('left');
				}
			});
		},
		reload				: function( callback ) {
			this._reload();
			if ( callback ) callback.call();
		},
		_reload				: function() {
			var instance	= this;
			instance._setCurrentValues();
			if( instance.visibleWidth < instance.options.minItems * ( instance.options.imageW + 2 * instance.options.border ) + ( instance.options.minItems - 1 ) * instance.options.margin ) {
				instance._setDim( ( instance.visibleWidth - ( instance.options.minItems - 1 ) * instance.options.margin ) / instance.options.minItems );
				instance._setCurrentValues();
				instance.fitCount	= instance.options.minItems;
			}	
			else{
				instance._setDim();
				instance._setCurrentValues();
			}
			instance.$slider.css({
				width	: instance.sliderW + 10 // TODO: +10px seems to solve a firefox "bug" :S
			});
		},
		_slide				: function( dir, val, anim, callback ) {
			var ml		= parseFloat( this.$slider.css('margin-left') );
			if( val === undefined ) {
				var amount	= this.fitCount * this.itemW, val;
				if( amount < 0 ) return false;
				if( dir === 'right' && this.sliderW - ( Math.abs( ml ) + amount ) < this.visibleWidth ) {
					amount	= this.sliderW - ( Math.abs( ml ) + this.visibleWidth ) - this.options.margin; // decrease the margin left
					this._toggleControls( 'right', -1 );
					this._toggleControls( 'left', 1 );
				}
				else if( dir === 'left' && Math.abs( ml ) - amount < 0 ) {				
					amount	= Math.abs( ml );
					this._toggleControls( 'left', -1 );
					this._toggleControls( 'right', 1 );
				}
				else {
					var fml; // future margin left
					( dir === 'right' ) 
						? fml = Math.abs( ml ) + this.options.margin + Math.abs( amount ) 
						: fml = Math.abs( ml ) - this.options.margin - Math.abs( amount );
					if( fml > 0 )
						this._toggleControls( 'left', 1 );
					else	
						this._toggleControls( 'left', -1 );
					if( fml < this.sliderW - this.visibleWidth )
						this._toggleControls( 'right', 1 );
					else	
						this._toggleControls( 'right', -1 );
				}
				( dir === 'right' ) ? val = '-=' + amount : val = '+=' + amount
			}
			else {
				var fml		= Math.abs( val ); // future margin left
				if( Math.max( this.sliderW, this.visibleWidth ) - fml < this.visibleWidth ) {
					val	= - ( Math.max( this.sliderW, this.visibleWidth ) - this.visibleWidth );
					if( val !== 0 )
						val += this.options.margin;	// decrease the margin left if not on the first position
					this._toggleControls( 'right', -1 );
					fml	= Math.abs( val );
				}
				if( fml > 0 )
					this._toggleControls( 'left', 1 );
				else
					this._toggleControls( 'left', -1 );
				if( Math.max( this.sliderW, this.visibleWidth ) - this.visibleWidth > fml + this.options.margin )	
					this._toggleControls( 'right', 1 );
				else
					this._toggleControls( 'right', -1 );
			}
			
			jQuery.fn.applyStyle = ( anim === undefined ) ? jQuery.fn.animate : jQuery.fn.css;
			var sliderCSS	= { marginLeft : val };
			var instance	= this;
			this.$slider.stop().applyStyle( sliderCSS, jQuery.extend( true, [], { duration : this.options.speed, easing : this.options.easing, complete : function() {
				if( callback ) callback.call();
			} } ) );
		},
		_slideToCurrent		: function( anim ) {
			var amount	= this.current * this.itemW;
			this._slide('', -amount, anim );
		},
		add					: function( $newelems, callback ) {
			this.$items 		= this.$items.add( $newelems );
			this.itemsCount		= this.$items.length;
			this._setDim();
			this._setCurrentValues();
			this.$slider.css({
				width	: this.sliderW
			});
			this._slideToCurrent();
			if ( callback ) callback.call( $newelems );
		},
		setCurrent			: function( idx, callback ) {
			this.current = idx;
			var ml		= Math.abs( parseFloat( this.$slider.css('margin-left') ) ),
				posR	= ml + this.visibleWidth,
				fml		= Math.abs( this.current * this.itemW );
			if( fml + this.itemW > posR || fml < ml ) {
				this._slideToCurrent();
			}
			if ( callback ) callback.call();
		},
		destroy				: function( callback ) {
			this._destroy( callback );
		},
		_destroy 			: function( callback ) {
			this.$el.off('.elastislide').removeData('elastislide');
			jQuery(window).off('.elastislide');
			if ( callback ) callback.call();
		}
	};
	var logError 				= function( message ) {
		if ( this.console ) {
			console.error( message );
		}
	};
	jQuery.fn.elastislide 				= function( options ) {
		if ( typeof options === 'string' ) {
			var args = Array.prototype.slice.call( arguments, 1 );
			this.each(function() {
				var instance = $.data( this, 'elastislide' );
				if ( !instance ) {
					logError( "cannot call methods on elastislide prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				}
				if ( !jQuery.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
					logError( "no such method '" + options + "' for elastislide instance" );
					return;
				}
				instance[ options ].apply( instance, args );
			});
		} 
		else {
			this.each(function() {
				var instance = jQuery.data( this, 'elastislide' );
				if ( !instance ) {
					jQuery.data( this, 'elastislide', new jQuery.elastislide( options, this ) );
				}
			});
		}
		return this;
	};
})( window, jQuery );