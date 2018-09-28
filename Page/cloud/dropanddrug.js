$(function(){
  var progressBar = $('#progressbar');
  $('#musicForm').on('submit', function(e){
    e.preventDefault();
    var $that = $(this),
        formData = new FormData($that.get(0));
    $.ajax({
      url: "audio.php", 
	  type: "POST",
      contentType: false,
      processData: false,
      data: formData,
      dataType: 'json',
      xhr: function(){
        var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
        xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
          if(evt.lengthComputable) { // если известно количество байт
            // высчитываем процент загруженного
            var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
            // устанавливаем значение в атрибут value тега <progress>
            // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
            progressBar.val(percentComplete).text('Загружено ' + percentComplete + '%');
          }
        }, false);
        return xhr;
      },
      success: function(json){
        if(json){
          $that.after(json);
        }
      }
    });
  });
});
$('#my_file').change(function() {
	if ($('#my_file').val() != '') {
	var color = 'after';
	var color2 = 'after_inp';
	$('#my_file').fadeOut('fast');
	document.getElementById('inputCustom').innerHTML = "<span id='textIn' class='textIn'>Загрузить</span><input class='inputSub' name='submit' type='submit' id='submit' value='Отправить'>";
	} else {
		var color = '';
	}
	$('.poster_block').addClass(color);
	$('.add_poster').addClass(color2);
});