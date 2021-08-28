

function enviar3() 
{

	let novoCheckList = document.querySelector('#listaCep');

	//para criar novos itens de check list
	let string3 = document.getElementById('text_checkList').value;
	let li = document.createElement('textarea');
	let btn = document.getElementById('btn_adicionar_checklist');
	li.setAttribute("required", true);
	btn.removeAttribute("disabled")

	li.value = string3;
	//gerar numero aleatorio para o name do novo item de checklist
	var nr_arelatorio = Math.random();
	li.name = nr_arelatorio;
	novoCheckList.appendChild(li);
}
//==================================================================
function testeteste()
{
	
	testeyx= document.getElementById('projeto1').autofocus;
	
}


function enviar(id)
 {
	 
	// criado variavel conectando  no UL listaCep
	let listaCep = document.querySelector('#listaCep');

	//criando variavel conectado com a tabela de servicos
	let string1 = document.getElementById('servicos' + id).value;
	let string2 = document.getElementById('servicos' + id)
	let numero_id = 'servico' + id;

	//se checkbox estiver true mostra o servico
	if (string2.checked == true) {
		// criado variavel que cria o elemento LI
		let li = document.createElement('textarea');
		li.value = string1;
		li.id = 'servico' + id;
		li.name = 'servico' + id;
		li.setAttribute("required", true);
		let servico3 = 'servico';
		listaCep.appendChild(li);
		//se checkbox estiver false esconde o servico
	} else {
		var ttt = 'servico' + id
		var item = document.getElementById(ttt);
		item.parentNode.removeChild(item);
	}
}
//==================================================================
function enviar_item_novo()
{
	let listaCep = document.querySelector('#listaCep');
	let text_checkList = document.getElementById('text_checkList').value;
	let novo_input = document.createElement('textarea');
	novo_input.value = text_checkList;
	//gerar numero aleatorio para o name do novo item de checklist
	var nr_arelatorio = Math.random();
	novo_input.name = nr_arelatorio;
	novo_input.setAttribute("required", true);
	listaCep.appendChild(novo_input);
}
//codigo para selecionar todos os servicos 
var title = document.getElementsByClassName("tudoxx");
//==================================================================
function check() 
{
	var ttudo = document.getElementsByClassName("tudoxx")
	for (var i = 0; i < ttudo.length; i++) {
		title[i].click();
	}
	var teste1 = document.getElementById("check_tudo");
	if (teste1.checked == true) {
		var ttudo = document.getElementsByClassName("tudoxx")
		for (var i = 0; i < ttudo.length; i++) {
			ttudo[i].checked = true;
		}
	} else {
		var ttudo = document.getElementsByClassName("tudoxx")
		for (var i = 0; i < ttudo.length; i++) {
			ttudo[i].checked = false;
		}

	}
}
