// Receber os seletores
const itemArrastavel = document.querySelectorAll(".itemArrastavel");
const containerItem = document.querySelectorAll(".containerItem");
const msg = document.getElementById("msg");
// Percorrer a lista de elementos disponíveis
itemArrastavel.forEach(item => {
    // Doisparar o evento quando o usuário iniciar o arraste do elemento
    item.addEventListener('dragstart', iniciarArrastar);
    // Doisparar o evento quando o usuário terminar o arraste do elemento
    item.addEventListener('dragend', fimArrastar);
})
// Variável criada para receber qual elemento está sendo arrastado
let itemArrastado = null;
// Chamar a fução quando o elemento está sendo arrastado
function iniciarArrastar() {
    // Fazer referência ao elemento atual que está sendo arrastado
    itemArrastado = this;
    // Atrasar 0 milissegundos para definir o estilo display do elemento atual como 'none'.
    setTimeout(() => (this.style.display = "none"), 0);
}
// Chamar a fução para finalizar o arrasto do elemento
function fimArrastar() {
    // Atrasar 0 milissegundos antes de executar o código dentro da função setTimeout
    setTimeout(() => (this.style.display = "block"), 0);
    // Definir a variável itemArrastado como null, não há mais nenhum elemento sendo arrastado
    itemArrastado = null;
}
containerItem.forEach(container => {
    // Disparar o evento quando um elemento arrastado é movido sobre a área do contêiner
    container.addEventListener("dragover", arrastarSobre);
    // Disparar o evento qunado um elemneto arrastado entra na área do contêiner
    container.addEventListener("dragenter", itemEntrarContainer);
    // didparar o evento quando arrastado deixa a área do contêiner
    container.addEventListener("dragleave", itemSairContainer);
    // Disparar o evento quando um elemento arrastado é solto dentro da área do contêiner
    container.addEventListener("drop", soltarItemContainer);
})
function arrastarSobre(e) {
    // Prevenir o comportamento padrão do navegador, evitar que o elmento seja solto em áreas não permitidas, como a barra de endereços ou fora do navegador
    e.preventDefault();
}
function itemEntrarContainer(e) {
    e.preventDefault();
    // Aterar a cor de fundo quando passa o cursor do mouse por cima do contêiner onde pode soltar o elemento arrastado
    // this para referenciar o elemento que está sendo arrastado
    this.style.backgroundColor = "rgba(0, 0, 0, 0.2)";
}
function itemSairContainer() {
    // Alterar a cor de fundo quando elemento arrastado deixa a área de destino
    this.style.backgroundColor = "rgba(0, 0, 0, 0)";
}
async function soltarItemContainer() {
    // Atribuir fundo transparente para o elemento referenciado
    this.style.backgroundColor = "rgba(0, 0, 0, 0)";
    // Anexar o elemento que estava sendo arrastado
    this.appendChild(itemArrastado);
    // Acessar o atributo data-acessorio-id
    const acessorio = itemArrastado.getAttribute("data-acessorio-id");
    const carroId = document.getElementById('carroId').getAttribute('data-carro-id');
    // Criar o objeto e atribuir os valores
    const formData = new FormData();
    formData.append('acessorio_id', acessorio);
    formData.append('carro_id', carroId);
    // Enviar os dados para o servidor PHP utilizando o método POST
    var dados = await fetch('salvar_acessorio.php', {
        method: 'POST',
        body: formData
    });
    var resposta = await dados.json();
    console.log(resposta);
    // Acessa o IF qunado o arquivo PHP retornar status TRUE
    if (resposta['status']) {
        // Enviar a mensagem paar o HTML
        msg.innerHTML = `<p style='color: green;'>${resposta['mensagem']}</p>`;
        // Chamar a função para remover a mensagem após 3 segundos
        removerMsg();
    } else {
        // Enviar a mensagem paar o HTML
        msg.innerHTML = `<p style='color: #f00;'>${resposta['mensagem']}</p>`;
        // Chamar a função para remover a mensagem após 3 segundos
        removerMsg();
    }
}
// Função para remover a mensagem após 3 segundos
function removerMsg() {
    setTimeout(() => {
        document.getElementById('msg').innerHTML = "";
    }, 3000);
}