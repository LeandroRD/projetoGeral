
function enviar(id){
	// criado variavel conectando  no UL listaCep
	let listaCep = document.querySelector('#listaCep');
	
	//criando variavel conectado com a tabela de servicos
	let string1 = document.getElementById('servico_'+id).innerHTML;
	

	// criado variavel que cria o elemento LI
	let li = document.createElement('li');
	
	
	li.innerHTML = string1;
	
	listaCep.appendChild(li);
}

// declarado uma array
var meuarray = new Array();


// push - incluir novo valor no final da array
function incluir(){
meuarray.push('nova inclusao');
apresentar_incluir_array();    
}


function apresentar_incluir_array()
{   
// ligacao nas id's do paragrafo e input_hidden
var input_hidden = document.getElementById("input_hidden");
var paragrafo = document.getElementById("paragrafo");

//var nomes = array meuarray
var nomes = meuarray;


//apresenta o array no paragrafo
paragrafo.innerHTML = nomes.join(' <br> ');



// incluir o array nomes no atributo value da variavel input_hidden
input_hidden.setAttribute("value",nomes);


}




