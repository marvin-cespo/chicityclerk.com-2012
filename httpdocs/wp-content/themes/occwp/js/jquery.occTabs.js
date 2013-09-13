$(document).ready(function() {
	$('.occ-tab-int').hide();
	var tab = $('ul.occ-tabs li a.current').attr('id').replace('occ-tab-toggle-','');
	$('#occ-tab-content-' + tab).show();
	$('.occ-tab-link').click(function() {
		$('.occ-tab-int').hide();
		$(this).addClass('current');
		$(this).parent().siblings().find('a').removeClass('current');
		var tabClick = $(this).attr('id').replace('occ-tab-toggle-', '');
		$('#occ-tab-content-' + tabClick).show();
	});
});