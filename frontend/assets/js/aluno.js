
var codigo = document.getElementById('codigo').value;
var nome = document.getElementById('nome').value;
var phone = document.getElementById('phone').value;
var email = document.getElementById('email').value;

var xhr = new new XMLHttpRequest();


xhr.open('POST', 'registrar.aluno.php', true);

xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencode');

xhr.onload = function(){
	if(this.status == 200){
		console.log(this.responseText);
	}
};

var data = 'codigo=' + encodeURIComponent(codigo) + '&nome=' + encodeURIComponent(nome) + '&phone=' + encodeURIComponent(phone) + '&email=' + encodeURIComponent(email);

xhr.send(data);
