jQuery(function($){
    jQuery.fn.putCursorAtEnd = function() {
        
        return this.each(function() {
            var $el = $(this),
            el = this;
            if (!$el.is(":focus")) {
                $el.focus();
            }
            if (el.setSelectionRange) {
                var len = $el.val().length * 2;
                setTimeout(function() { el.setSelectionRange(len, len); }, 1);
            }
            else {
                $el.val($el.val());
            }
            this.scrollTop = 999999;
        });
    };

    //Máscara de campos
    $(document).on('keyup', 'input[mask*="cpf"]', function(e){

        tecla = e.keyCode || e.which;
        valor = $(this).val();
        tam = valor.length;

        if((tecla >= 96 && tecla <= 105) || (tecla >= 48 && tecla <= 57 ) || e.which == 229){
            if(tam == 4){
                $(this).val(valor.substr(0, 3) + '.' + valor.substr(3, 2));
            }
            if(tam == 8){
                $(this).val(valor.substr(0, 3) + '.' + valor.substr(4, 3) + '.' + valor.substr(7, 1));
            }
            if(tam == 12){
                $(this).val(valor.substr(0, 3) + '.' + valor.substr(4, 3) + '.' + valor.substr(8, 3) + '-' + valor.substr(11, 1));
            }
        }
        if(tam > 3){
            $(this).putCursorAtEnd();
        }
    });
    
    $(document).on('keyup', 'input[mask*="cel"]', function(e){
        
        tecla = e.keyCode || e.which;
        valor = $(this).val();
        tam = valor.length;

        if((tecla >= 96 && tecla <= 105) || (tecla >= 48 && tecla <= 57 ) || e.which == 229){
            
            if (tam < 15) {
                if(tam == 3){
                    $(this).val( '(' + valor.substr(0, 2) + ') ' + valor.substr(2, 1)  );
                    setTimeout(function(){ $(this).focus() }, 50);
                }
                
                if(tam == 11){
                    $(this).val( '(' + valor.substr(1, 2) + ') ' + valor.substr(5, 4) + '-' + valor.substr(9, 2) );
                }
                if(tam == 14){
                    $(this).val( '(' + valor.substr(1, 2) + ') ' + valor.substr(5, 4) + valor.substr(10, 1) + '-' + valor.substr(11, 3) );
                }
            }
            
        }
        
        $(this).focus();
        valor = $(this).val();
        $(this).val('');
        $(this).val(valor);
        if(tam > 3){
            $(this).putCursorAtEnd();
        }
    });
    
    $(document).on('keyup', 'input[mask*="date"]', function(e){
        tecla = e.keyCode || e.which;
        valor = $(this).val();
        tam = valor.length;
        if((tecla >= 96 && tecla <= 105) || (tecla >= 48 && tecla <= 57 ) || e.which == 229){
            if(tam == 3){
                $(this).val(valor.substr(0, 2) + '/' + valor.substr(2, 1))
            }
            if(tam == 6){
                $(this).val(valor.substr(0, 2) + '/' + valor.substr(3, 2) + '/' + valor.substr(5, 1));
            }
        }
        
        $(this).focus();
        valor = $(this).val();
        $(this).val('');
        $(this).val(valor);
        if(tam > 3){
            $(this).putCursorAtEnd();
        }
    });

    $(document).on('keyup', '[mask*="cep"]', function(e){
        tecla = e.keyCode || e.which;
        valor = $(this).val();
        tam = valor.length;
        if((tecla >= 96 && tecla <= 105) || (tecla >= 48 && tecla <= 57 ) || e.which == 229){
            if(tam == 6){
                $(this).val(valor.substr(0, 5) + '-' + valor.substr(5, 1))
            }
        }
        
        $(this).focus();
        valor = $(this).val();
        $(this).val('');
        $(this).val(valor);
        if(tam > 3){
            $(this).putCursorAtEnd();
        }
    });
    
}); 