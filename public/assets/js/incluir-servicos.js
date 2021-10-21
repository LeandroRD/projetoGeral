

function enviar3() {

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
function enviar(id) {
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
function add_data() 
{
	inserir_inicio = document.querySelectorAll("input.nao_repetir");
	inserir_inicio2 = inserir_inicio.length;
	//---------------conjunto de elementos input DATA-------------------
	// variavel ligado ao OL
	let lista_data = document.querySelector('#lista_data');
	//variavel ligado ao input_data
	let string_data = document.getElementById('input_Data').value;
	//variavel criando input para text
	let nova_data = document.createElement('input');
	//variavel criando input para hidden
	let nova_data2 = document.createElement('input');
	//variaveis criadas text e hidden sao iguais a varival input_data
	nova_data.value = string_data;
	nova_data2.value = string_data;
	//variavel do tipo data
	nova_data.type = "date";
	//variavel da classe transparente
	nova_data.setAttribute("class", "bordaTransparente nao_repetir_data");
	//variavel desabilitada
	nova_data.setAttribute("disabled", true);
	//variavel do tipo data
	nova_data2.type = "hidden";

	//---------------conjunto de elementos input HORA-------------------
	// variavel ligado ao DIV
	let lista_hora = document.querySelector('#lista_data');
	//variavel ligado ao input_data
	let string_hora = document.getElementById('input_Hora').value;
	//variavel criando input
	let nova_hora = document.createElement('input');
	//variavel criando input
	let nova_hora2 = document.createElement('input');
	//variavel recebendo o valor
	nova_hora.value = string_hora;
	nova_hora2.value = string_hora;
	//do tipo hora
	nova_hora.type = "time";
	//do tipo hora
	nova_hora2.type = "hidden";
	//variavel da classe transparente
	nova_hora.setAttribute("class", "bordaTransparente nao_repetir");
	//variavel desabilitada
	nova_hora.setAttribute("disabled", true);

	//gerar numero aleatorio para o name do novo item de checklist
	var nr_arelatorio = Math.random();
	nova_data2.name = nr_arelatorio;

	//gerar numero aleatorio para o name do novo item de checklist
	var nr_arelatorio2 = Math.random();
	nova_hora2.name = nr_arelatorio2;
	
	//inserir a primeira data------------------------------------
	if (inserir_inicio2 == 0) {
		if (nova_data2.value && nova_hora2.value) {
			lista_data.appendChild(nova_data);
			lista_data.appendChild(nova_data2);
			lista_data.appendChild(nova_hora);
			lista_data.appendChild(nova_hora2);	
		}
	}
	//--------------codigo para nao repetir_data----começo----------------------
	var soma = 0;
	nao_repetir_data = document.querySelectorAll("input.nao_repetir_data");
	for (var i = 0; i < nao_repetir_data.length; i++) {
		var nao_repetir_data1 = nao_repetir_data[i].value;
		var datax = nova_data.value;

		if (datax == nao_repetir_data1) {
			soma = soma + 1;
		}
	}
	//--------------codigo para nao repetir_data----fim----------------------
	//só inserir nao nao houver data repetida (soma de busca vazia)
	if (soma == 0) {
		if (nova_data2.value && nova_hora2.value) {
			lista_data.appendChild(nova_data);
			lista_data.appendChild(nova_data2);
			lista_data.appendChild(nova_hora);
			lista_data.appendChild(nova_hora2);
		}
	}
}
//==================================================================
function novas_datas(){

	let btn1 = document.getElementById('btn1');
	
	
	var input_Data  = document.getElementById('input_Data').value;
	var input_Hora  = document.getElementById('input_Hora').value; 

	if(input_Data == "" || input_Hora =="" ){
		btn2.click();
	}else{
		btn1.click();
	}
	
}
//==================================================================
function proposta_vazia(){
	var proposta_fornecedor = document.getElementById('proposta_fornecedor');
	if(proposta_fornecedor.innerHTML == ""){
		btn2.click();
	}
		else{
			btn1.click();
		}
	}

//==================================================================
function add_hora() {
	// variavel ligado ao OL
	let lista_data = document.querySelector('#lista_data');
	//variavel ligado ao input_data
	let string_data = document.getElementById('input_Data').value;
	//variavel criando input para text
	let nova_data = document.createElement('input');
	//variavel criando input para hidden
	let nova_data2 = document.createElement('input');
	//variaveis criadas text e hidden sao iguais a varival input_data
	nova_data.value = string_data;
	nova_data2.value = string_data;
	//variavel do tipo data
	nova_data.type = "date";
	//variavel da classe transparente
	nova_data.setAttribute("class", "bordaTransparente");
	//variavel desabilitada
	nova_data.setAttribute("disabled", true);
	//variavel do tipo data
	nova_data2.type = "hidden";

	// variavel ligado ao DIV
	let lista_hora = document.querySelector('#lista_data');
	//variavel ligado ao input_data
	let string_hora = document.getElementById('input_Hora').value;
	//variavel criando input
	let nova_hora = document.createElement('input');
	//variavel criando input
	let nova_hora2 = document.createElement('input');
	//variavel recebendo o valor
	nova_hora.value = string_hora;
	nova_hora2.value = string_hora;
	//do tipo hora
	nova_hora.type = "time";
	//do tipo hora
	nova_hora2.type = "hidden";
	//variavel da classe transparente
	nova_hora.setAttribute("class", "bordaTransparente");
	//variavel desabilitada
	nova_hora.setAttribute("disabled", true);

	//gerar numero aleatorio para o name do novo item de checklist
	var nr_arelatorio = Math.random();
	nova_hora2.name = nr_arelatorio;

	//incluir hora
	if (nova_data2.value && nova_hora2.value) {
		lista_data.appendChild(nova_hora);
		lista_data.appendChild(nova_hora2);
	}
}
//==================================================================
function enviar_item_novo() {
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
function check() {
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

//===========funcao alerta data vazia===================
function data_vazia() {
	let btn1 = document.getElementById('btn1');
	let btn2 = document.getElementById('btn2');
	let data = document.getElementById('input_Data');
	let hora = document.getElementById('input_Hora');

	var confirmar_vazio = document.querySelectorAll("div.lista_data");

	// alert(confirmar_vazio[0].innerHTML);



	if (confirmar_vazio[0].innerHTML != "") {
		btn1.click();
	} else {
		btn2.click();
	}
}
//===========funcao alerta data vazia===================

function data_vazia_cotacao() {

	let btn1 = document.getElementById('btn1');
	let btn2 = document.getElementById('btn2');
	let data = document.getElementById('select_data');


	if (data.value != "0") {
		btn1.click();
	} else {
		btn2.click();
	}
}
//========================================================

var data1 = document.getElementById('xxyy');


var date1 = new Date();


function testedata() {


	data1.innerHTML = date.toLocaleDateString();
}

//========================================================
function mudar_data() {

	tudo3 = document.querySelectorAll("option.xxyy");

	for (var i = 0; i < tudo3.length; i++) {
		var mudar_data = tudo3[i].innerHTML;
		var mudar_data2 = mudar_data.split('-').reverse().join('/');
		tudo3[i].innerHTML = mudar_data2;
	}

}
//========================================================
