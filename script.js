let itens = [];

function limparCampos() {
    document.getElementById('descricao').value = ''; 
    document.getElementById('comprimento').value = ''; 
    document.getElementById('largura').value = ''; 
    document.getElementById('altura').value = ''; 
    document.getElementById('peso').value = ''; 
    document.getElementById('quantidade').value = ''; 
}

function incluirItens() {
    let descricao = document.getElementById('descricao').value;
    let comprimento = docoument.getElementById('comprimento').value;
    let largura = document.getElementById('largura').value;
    let altura = document.getElementById('altura').value;
    let peso = document.getElementById('peso').value;
    let quantidade = document.getElementById('quantidade').value;

    if(descricao.length <= 0 || comprimento.length <= 0 || largura.length <= 0 ||
        altura.length <= 0 || peso.length <= 0 || quantidade.length <= 0) {
            alert('Preencha todos os dados!');

        }
        else {
            limparCampos();
        }
}