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

