(function() {
  'use strict';

  $(function(){
      $('.flash_message').fadeOut(3000);
  });

})();

$('.custom-file-input').on('change',function(){
  $(this).next('.custom-file-label').html($(this)[0].files[0].name);
})
$('.reset').click(function(){
  $(this).parent().prev().children('.custom-file-label').html('Choose file');
  $('.custom-file-input').val('');
})