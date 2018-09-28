
							var countOfFields = 0;
							var curFieldNameId = 1;
							var countTaI = 0;
							var curTaI = 1;
							var countT = 0;
							var curT = 1;
							var maxFieldLimit = 5;
							function AddTaI(){
								if (countTaI >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countTaI++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_img');
								div.innerHTML = '<a href="" class="inp_file_text"><span>Загрузить файл</span><input id=\"block' + curFieldNameId + '\" name=\"block[' + curFieldNameId + ']\" class="inp_file_texto" type="file"></a><textarea name=\"block[' + curFieldNameId + ']\" placeholder="Текст сюда" class="text_img_artcl"></textarea>'; 
							}
							function AddT(){
								if (countT >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countT++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('text_temp');
								div.innerHTML = '<textarea name=\"block[' + curFieldNameId + ']\" placeholder="Текст сюда" class="text_temp_artcl"></textarea>'; 
							}
							function AddI(){
								if (countOfFields >= maxFieldLimit) {
									alert("Число полей достигло своего максимума " + maxFieldLimit);
									return false;
								}
								countOfFields++;
								curFieldNameId++;
								
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('img_temp');
								div.innerHTML = '<a href="" class="img_temp_add"><span>Загрузить файл</span><input name=\"block[' + curFieldNameId + ']\" class="img_temp_addo" type="file"></a>'; 
								return false;
							}
							function AddV(){  
								var parent = document.getElementById('content_artcl');  
								var div = document.createElement('DIV'); 
								div = parent.appendChild(div); 
								$(div).addClass('video_temp');
								$(div).attr('id', 'video_temp');
								div.innerHTML = '<input onkeyup="if(event.keyCode == 13){alert("gaag");}" id="video_inp" class="add_video" placeholder="Вставьте ссылку на YouTube">'; 
							}
							