
let rua2 = document.querySelector('#rua2');
let cidade2 = document.querySelector('#cidade2');
let uf2 = document.querySelector('#estado2');
let btnCep = document.querySelector('#btnBuscarCep');
let listaCep = document.querySelector('#listaCep');
let elemento = document.getElementById("cep_certo");
let escolha = document.getElementById("escolha_endereco");

rua2.value = "";
cidade2.value = "";
uf2.value = "";

btnCep.addEventListener('click', function(e){
    e.preventDefault();
    let urlBase = "https://viacep.com.br/ws/";
    let parametros = uf2.value + '/'+cidade2.value+'/'+rua2.value+'/json/';
    let callback ='?callback=popularNaoSeiMeuCep';
    let script = document.createElement('script');
    script.src = urlBase + parametros + callback;
    document.body.appendChild(script);
   
    escolha.style.display = "block";
    
    


});
function popularNaoSeiMeuCep(resposta2){
    if(!Array.isArray(resposta2)){
        alert('o retorno nao é uma lista de cep');
        return;
    }

    resposta2.forEach(function(i){
        let li = document.createElement('li');
        let endereco = i.logradouro +' | '+i.bairro + ' | ' +i.localidade + ' | '+ i.uf + ' | ' + ' | '+ i.cep;
        li.innerHTML = endereco;
        listaCep.appendChild(li);
        li.setAttribute('onclick','exibirCep('+parseInt(i.cep.replace('-',''))+')');
    });
    }

function exibirCep(cep){
    // converter cep em string
    var cep_string = cep.toString();
    var tamanho = cep_string.length;

    // verificar se o cep é de tamanho de 7 caracteres(se for incluir um zero)
    if (tamanho==7){
        cep = "0"+cep;
    }
    elemento.value = cep;
}





