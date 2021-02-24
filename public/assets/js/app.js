/* desaparecer a mensagem de erro ligado ao ID*/
$('#error-message').delay(2000).fadeOut('slow');

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
