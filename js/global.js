// All SixReps Custom Plugin
// Copyright 2012 Sixreps, Inc.
// Author : Arman Adhitama P

$(document).ready(function() {
	
	$('*[data-image]').drawingImage();

});

// drawing image
(function($) {
	
	$.fn.drawingImage = function() {
		
		return this.each(function() {
			
			var $this = $(this);

			$padding = parseInt($this.css('padding').replace('px', '')) * 2;

			$size = parseInt($this.innerWidth()) - $padding + 'px';

			$this.html('<span style="background-image: url(' + $this.attr('data-image') + ');"></span>');

		});

		return this;

	}
	
	$.fn.showLoading = function(size, type) {
		
		return this.each(function() {
			
			var $this = $(this);

			if (!size) {
				size = 'small';
			}

			if (!type) {
				type = 'light';
			}

			$this.html('<div class="loading loading-' + size + '-' + type + '">&nbsp;</div>');

		});

		return this;

	}
	
	$.fn.hideLoading = function() {
		
		return this.each(function() {
			
			var $this = $(this);

			$this.find('.loading').remove();

		});

		return this;

	}

}) (jQuery);