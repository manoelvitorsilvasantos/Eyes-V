 function mascaraTelefone(campo) {
    campo.value = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    campo.value = campo.value.replace(/^(\d{2})(\d)/g, '($1) $2'); // Formata (XX)
    campo.value = campo.value.replace(/(\d{5})(\d)/, '$1-$2'); // Formata XXXXX-XXXX
}

function toUpper(campo){
   campo.value = campo.value.toUpperCase();
}