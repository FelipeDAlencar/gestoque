<div class="container mt-3">
    <div class="row">
        <div class="col col-md-12  mb-3">
            <h3>Listar Produtos</h3>
        </div>
        <div class="col col-md-12">
            <table class="table table-striped" id="tabela">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produtos as $produto):?>
                        <tr id = "<?=$produto->idProduto;?>">
                            <th scope="row"><?=$produto->idProduto;?></th>
                            <td id="nome"><?=$produto->nome;?></td>
                            <td id="preco">R$<?=number_format($produto->preco, 2, ",", ".");?></td>
                            <td id="quantidade"><?=$produto->quantidade;?></td>
                            <td>
                                <a class='btn btn-secondary' onclick = "editar(this,'<?=site_url('painel/produto/editar/'.$produto->idProduto);?>')">Editar</a>
                                <a class='btn btn-secondary' href="<?=site_url('painel/produto/excluir/'.$produto->idProduto);?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>
</div>
<script type="text/javascript">
    function tornarTabelaEditavel(tabela)
    {
                // Obtém todas as tds da tabela fornecida.
                var tdlist = tabela.getElementsByTagName("td");

                for(var i = 0; tdlist[i]; i++) {
                    // Adiciona o evento double click em cada td da tabela.
                    tdlist[i].ondblclick = function() {
                        // Se for texto, muda para input.
                        if(this.firstChild.nodeType == 3) {
                            // Cria um campo de texto editável e insere o valor da td nesse campo.
                            var campo = document.createElement("input");
                            campo.value = this.firstChild.nodeValue;

                            // Substitui o texto da td pelo campo.
                            this.replaceChild(campo, this.firstChild);

                            campo.select();

                            // Faz o processo inverso ao perder o foco.
                            campo.onblur = function() {
                                this.parentNode.replaceChild(document.createTextNode(this.value), this);


                            }
                        }
                    }
                }
            }

            window.onload = function() {

                tornarTabelaEditavel(document.getElementById('tabela'));
            }
            function editar(colunaEditar,caminho){
                let linha = colunaEditar.parentNode.parentNode;
                let nome = linha.querySelector("#nome").innerText;
                let preco = linha.querySelector("#preco").innerText.replace("R$","").replace(",",".");
                let quantidade = linha.querySelector("#quantidade").innerText;
               
                window.location = caminho + "/" + nome + "/"+ preco + "/"+ quantidade;
            }

            
        </script>
