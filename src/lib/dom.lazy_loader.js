jQuery(function(){

	window.setTimeout(function(){

		$('[data-src]').each(function(ind, elem){
			$elem = $(this);
			$elem.attr('src', $elem.attr('data-src'));
			$elem.removeAttr('data-src');
		});

		$('[data-background]').each(function(ind, elem){
			$elem = $(this);
			$elem.css('background-image', 'url("'+$elem.attr('data-background')+'")');
			$elem.removeAttr('data-background');
		});

		$('[data-images]').each(function(ind, elem){
			$elem = $(this);
			imagens = $elem.attr('data-images').split('|');

			$('body').append(`
				<style>
					${imagens[2]} { 
						background-image: url("${imagens[0]}"); 
					} 
					@media (min-width: 768px) { 
						${imagens[2]} { 
							background-image: url("${imagens[1]}"); 
						} 
					}
				</style>
			`);

			$elem.removeAttr('data-images');
			
		});

	}, 400);

});