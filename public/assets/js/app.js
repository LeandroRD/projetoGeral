/* desaparecer a mensagem de erro ligado ao ID*/
$('#error-message').delay(2000).fadeOut('slow');
//===============================================================
// geracao de password aleatorio javascript
$('#btn-password').click(
    function(){
        console.log('teste');
        
            let chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            let pass ='';
            let num_chars = 12;

            for(let i=0; i < num_chars; i++){
                // codigo para criacao de password aleatorio
                pass += chars.charAt(Math.floor(Math.random() * chars.length));   
            }
    
            $('input[name=text_password]').val(pass);
            $('input[name=text_password_repetir]').val(pass);
    
        }
    
);
//===============================================================
// para limpar os inputs
$('#btn-limpar').click(
    function(){
        $('input[name=text_password]').val('');
        $('input[name=text_password_repetir]').val('');

    }

);

//===============================================================
//mascaras de inputs
$(document).ready(function(){
	//Telefone
	$("#telefone").mask("(99) 9999-9999");

    //Telefone
	$("#celular").mask("(99) 99999-9999");

	//CEP
	$("#cep").mask("99999-999");

	//CPF
	$("#cpf").mask("999.999.999-99");

	//CNPJ
	$("#cnpj").mask("99.999.999/9999-99");

	//Data
	$("#data").mask("99/99/9999");

	//Dinheiro
	$('#dinheiro1').mask('000.000.000.000.000,00' , { reverse : true});

	$('#dinheiro2').mask("#.##0,00" , { reverse:true});
});
//===============================================================
// metodo para buscar cep
let cep = document.querySelector('#cep');
let rua = document.querySelector('#rua');
let bairro = document.querySelector('#bairro');
let cidade = document.querySelector('#cidade');
let estado = document.querySelector('#estado');


// blur, evento quando é clicado no caso o tab na variavel CEP
cep.addEventListener('blur', function(e){
    let cep = e.target.value;
    let script = document.createElement('script');
    script.src = 'https://viacep.com.br/ws/'+cep+'/json/?callback=popularform';
    document.body.appendChild(script);  
});
function popularform(resposta){
    if('erro' in resposta){
        alert('Cep nao localizado');
        return;
    }

    //converter o nome do estado recebido para o numero do indice do CEP
    switch (resposta.uf) {
        case 'AC':
            resposta.uf = "1";
        break; 
        case 'AL':
            resposta.uf = "2";
        break;
        case 'AP':
            resposta.uf = "3";
        break; 
        case 'AM':
            resposta.uf = "4";
        break; 
        case 'BA':
            resposta.uf = "5";
        break; 
        case 'CE':
            resposta.uf = "6";
        break; 
        case 'DF':
            resposta.uf = "7";
        break; 
        case 'ES':
            resposta.uf = "8";
        break; 
        case 'GO':
            resposta.uf = "9";
        break; 
        case 'MA':
            resposta.uf = "10";
        break; 
        case 'MT':
            resposta.uf = "11";
        break; 
        case 'MS':
            resposta.uf = "12";
        break; 
        case 'MG':
            resposta.uf = "13";
        break; 
        case 'PA':
            resposta.uf = "14";
        break; 
        case 'PB':
            resposta.uf = "15";
        break; 
        case 'PR':
            resposta.uf = "16";
        break; 
        case 'PE':
            resposta.uf = "17";
        break; 
        case 'PI':
            resposta.uf = "18";
        break; 
        case 'RJ':
            resposta.uf = "19";
        break;  
        case 'RN':
            resposta.uf = "20";
        break; 
        case 'RS':
            resposta.uf = "21";
        break; 
        case 'RO':
            resposta.uf = "22";
        break; 
        case 'RR':
            resposta.uf = "23";
        break; 
        case 'SC':
            resposta.uf = "24";
        break; 
        case 'SP':
            resposta.uf = "25";
        break; 
        case 'SE':
            resposta.uf = "26";
        break;
        case 'TO':
            resposta.uf = "27";
        break;
        default:
            resposta.uf = "0";
        break;   
    }

    rua.value = resposta.logradouro;
    bairro.value = resposta.bairro;
    cidade.value = resposta.localidade;
    estado.value = resposta.uf;

}


//===============================================================
