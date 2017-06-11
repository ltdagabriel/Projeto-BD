/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function validaCampo()
{
if(document.cadastro.nome.value=="")
	{
	alert("O Campo nome ÃÂ© obrigatÃÂ³rio!");
	return false;
	}
else
	if(document.cadastro.email.value=="")
	{
	alert("O Campo email ÃÂ© obrigatÃÂ³rio!");
	return false;
	}
else
	if(document.cadastro.login.value=="")
	{
	alert("O Campo Login ÃÂ© obrigatÃÂ³rio!");
	return false;
	}
else	
if(document.cadastro.senha.value=="")
	{
	alert("Digite uma senha!");
	return false;
	}
else
return true;
}
function validarSenha(senha1, senha2, campo) {
    var resultado = document.getElementById(campo);

    senhaPrimaria = document.getElementById(senha1).value;
    senhaSecundaria = document.getElementById(senha2).value;

    if (senhaPrimaria == senhaSecundaria && senhaPrimaria.length > 3) {
        resultado.innerHTML = "Senhas iguais";
    } else {
        resultado.innerHTML = "Senhas Incorretas";
    }
}