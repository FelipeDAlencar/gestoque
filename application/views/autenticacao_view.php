        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <h3>Autenticação</h3>
                    <form action="<?=site_url('autenticacao/verificar');?>" method="POST">
                        <div class="form-group">
                            <label for="usuario">Usuário</label>
                            <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="usuarioAjuda" placeholder="Digite o seu email">
                            <small id="usuarioAjuda" class="form-text text-muted">Seu nome de usuário é o que identifica você =).</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite a sua senha">
                        </div>
                        <!--<div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>-->
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>