// Obtém o campo de telefone pelo ID
const telefoneInput = document.getElementById('celular');
        
// Adiciona um ouvinte de evento para o evento "input"
telefoneInput.addEventListener('input', function () {
    // Remove todos os caracteres que não sejam dígitos
    const numeroTelefone = this.value.replace(/\D/g, '');
            
    // Verifica se o número de telefone tem 10 dígitos
    if (numeroTelefone.length === 11) {
    // Formata o número como (XX) XXXX-XXXX
    this.value = '(' + numeroTelefone.substring(0, 2) + ') ' +
                             numeroTelefone.substring(2, 7) + '-' +
                             numeroTelefone.substring(7, 11);
            } else {
                // Se o número não tem 10 dígitos, mantenha o valor original
                this.value = numeroTelefone;
            }
d});