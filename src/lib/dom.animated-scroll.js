jQuery(function($){

	let body_element_base = $('main.site-app');
	let header_element_height = 40 + 15;
	let is_scrolling = false;

	$.animate_header_categories = element_handle => {
		
		let element_parent = element_handle.parents().eq(1);
		
		element_parent
			.find('a')
			.removeClass('active');

		element_handle
			.addClass('active');
		
		element_parent.animate({
			scrollLeft: element_handle.position().left + element_parent.scrollLeft() - $('.filter-space').innerWidth()
		}, 0, () => {
			if (!is_loading) {
				$('div[path-url]').removeClass('current-page');
				$(`div[path-url="${element_handle.attr('href')}"]`).addClass('current-page');
			}
			is_loading = false;
		});
			
	}

	$(document).on('click', '[menu-categories]', function(event){
		event.preventDefault();

		let element_handle = $(this);
		let element_target = $(`[path-url="${element_handle.attr('href')}"]`);
		$.animate_header_categories(element_handle);
		is_scrolling = true;
		
		body_element_base.animate({
			scrollTop: (body_element_base.scrollTop() + element_target.position().top) - header_element_height
		}, 400, () => {
			is_scrolling = false;
			$('div[path-url]').removeClass('current-page');
			$(`div[path-url="${element_handle.attr('href')}"]`).addClass('current-page');
		});

	});

	var categories_section_position = new Array;
	
	$.get_sections_position_top_and_save_into_var = () => {
		categories_section_position = [];

		$('.cat-item').each(function(index_is_not_used, element_handle){
			element_position_top = parseInt($(this).position().top - header_element_height);
			categories_section_position[element_position_top] = element_handle.id;
		});

	}

	$.get_sections_position_top_and_save_into_var();
	
	$(window).on('resize', function(){
		$.get_sections_position_top_and_save_into_var();
	});

	$(body_element_base).on('scroll', function() {

		if (!is_scrolling && !is_search) {

			let page_y = $(body_element_base).scrollTop();

			categories_section_position.forEach( (element_id, element_min_pos) => {
				var element_max_pos = eval($(`#${element_id}`).innerHeight() + element_min_pos);

				if (page_y >= element_min_pos && page_y <= element_max_pos) {
					let element_handle = $(`a[href="/${cardapio_url}/${element_id}"]`);
					$.animate_header_categories(element_handle);
				}

			});

		}

	});

});