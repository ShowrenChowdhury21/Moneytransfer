$('.digit-group').find('input').each(function() {
	$(this).attr('maxlength', 1);
	$(this).on('keyup', function(e) {
		var parent = $($(this).parent());
		
		if(e.keyCode === 8 || e.keyCode === 37) {
			var prev = parent.find('input#' + $(this).data('previous'));
			
			if(prev.length) {
				$(prev).select();
			}
		} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
			var next = parent.find('input#' + $(this).data('next'));
			
			if(next.length) {
				$(next).select();
			} else {
				if(parent.data('autosubmit')) {
					parent.submit();
				}
			}
		}
	});
});

function result() {
    var val1 = document.getElementById('digit-1');
    var val2 = document.getElementById('digit-2');
    var val3 = document.getElementById('digit-3');
    var val4 = document.getElementById('digit-4');
    var val5 = document.getElementById('digit-5');
    var val6 = document.getElementById('digit-6');
    var result = ''+ val1.value + '' + val2.value +''+ val3.value + '' + val4.value +''+ val5.value + '' + val6.value;
    document.getElementById('result').innerHTML = result;
};