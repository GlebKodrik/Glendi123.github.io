$(document).ready(function() {

	let message = new Object();
	message.success = "Спасибо за заявку! Скоро мы с вами свяжемся";
	message.loading = "Загрузка...";
	message.failure = "Упс.. Что-то пошло не так";

	let mainForm = document.getElementsByTagName('form')[0],
			btn_submit = mainForm.querySelector('button[type="submit"]'),
			input = mainForm.getElementsByTagName('input'),
			textarea = mainForm.getElementsByTagName('textarea'),
			messageStatus = document.createElement('div');

	messageStatus.classList.add('submition')

	$(mainForm).submit(function(event) {
		event.preventDefault();

		this.insertBefore(messageStatus, btn_submit);

		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function() {
				messageStatus.innerHTML = message.success;
			},
			error: function() {
				messageStatus.innerHTML = message.failure;
			},
			loading: function() {
				messageStatus.innerHTML = message.laoding;
			}
		});

		for(let i = 0; i < input.length; i++) {
			input[i].value = '';
		}

		for(let i = 0; i < textarea.length; i++) {
			textarea[i].value = '';
		}

	});

});